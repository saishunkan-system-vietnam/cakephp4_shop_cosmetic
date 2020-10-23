<?php

namespace App\Controller\Component;

use Cake\Controller\Component;
use Cake\Database\Expression\QueryExpression;
use Cake\ORM\Query;
use Cake\ORM\TableRegistry;
use Cake\Routing\Router;

class DataTableComponent extends Component
{
    private $listData;
    private $totalData;
    private $draw;

    public function setListData($listData)
    {
        $this->listData = $listData;
    }

    public function setTotalData($totalData)
    {
        $this->totalData = $totalData;
    }

    public function setDraw($draw)
    {
        $this->draw = $draw;
    }

    /*
        $config = [
            'params'=> $this->request->getQuery(),
            'selectColumns'=>['id','name','price','description'],
            'searchColumns'=>['name','price','description'],
        ];
    */
    public function renderListData(String $model, $config): Object
    {
        $this->draw = $config['params']['draw'];
        $search = $config['params']['search']['value'];
        $limit = $config['params']['length'];
        $start = $config['params']['start'];
        $column = $model.'.'.$config['params']['order'][0]['column'];
        $contains = !isset($config['contains']) ? [] : $config['contains'];
        $where = !isset($config['where']) ? [] : $config['where'];
        foreach ($config['selectColumns'] as $key => $col) {
            if($key == $column)
            {
                $column = $model.'.'.$col;
            }
        }
        $sort = $config['params']['order'][0]['dir'];
        $page = ceil($start / $limit) + 1;
        $searchColumns = [];
        foreach ($config['searchColumns'] as $col) {
            $searchColumns[] = ["$model.$col LIKE" => "%$search%"];
        }
        $dataTable = TableRegistry::getTableLocator()->get($model);
        $totalData = $dataTable->find()->count();
        $listData = $dataTable
            ->find()
            ->select($config['selectColumns']);
        if($where != [])
        {
            $listData = $listData->where($where);
        }
        $listData = $listData->where(function (QueryExpression $exp) use ($searchColumns) {
                return $exp->or($searchColumns);
            })
            ->limit($limit)
            ->page($page)
            ->order([$column => $sort]);
        foreach ($contains as $containName => $contain) {
            $listData->contain($containName,function(Query $q) use($contain){
                return $q->select($contain['selectColumns']);
            });
        }

        $this->setTotalData($totalData);
        $this->setListData($listData);
        $this->listData = $listData;
        return $this;
    }

    /*
        $sampleArr = [
            'id',
            'name',
            ['function'=>'num_format','col'=>'price'] after render 10.000 VNĐ,
            'description',
            [
                'function'=>'route',
                'url'=>'/admin/transport/view',
                'col'=>'id',
                'text'=>'Chi tiết'
            ],
            [
                'function'=>'route',
                'url'=>'/admin/transport/delete',
                'col'=>'id',
                'text'=>'Xóa'
            ] after render <a hrer='domain/admin/transport/delete/:id'>Xóa</a>,
            [

            ]
        ];
    */
    public function exportListData(array $sampleArr)
    {
        $results = [];
        foreach ($this->listData as $data) {
            foreach ($sampleArr as $value) {
                if (gettype($value) == 'array') {
                    $col = $value['col'];
                    switch ($value['function']) {
                        case 'num_format':
                            $result[] = $this->convertIntToMoney($data->$col);
                            break;
                        case 'point':
                            $result[] = !empty($data->$col) ? $data->$col." POINT" : '0';
                        break;
                        case 'date':
                            $time = strtotime($data->$col);
                            $result[] = date('Y-m-d H:i:s', $time);
                        break;
                        case 'route':
                            switch ($value['card']) {
                                case 'img':
                                    $result[] = "<img src='".Router::url('/'.$value['url'] . '/' . $data->$col, true)."' width='70px'>";
                                break;
                                case 'a':
                                    $result[] = "<a href='" .
                                    Router::url('/'.$value['url'] . '/' . $data->$col, true) . "'>" . $value['text'] . "</a>";
                                break;
                            }
                        break;
                    }
                } else {
                    if(strstr($value,'->') != false)
                    {
                        $tableAndCol = explode('->',$value);
                        $table = $tableAndCol[0];
                        $col = $tableAndCol[1];
                        $result[] = $data->$table->$col;
                    }
                    else{
                        $result[] = $data->$value;
                    }
                }
            }
            $results['data'][] = $result;
            unset($result);
        }
        $results["draw"]            = intval($this->draw);
        $results["recordsTotal"]    = $this->totalData;
        $results["recordsFiltered"] = $this->totalData;
        return $results;
    }

    //key num_format
    public function convertIntToMoney($number)
    {
        return number_format($number, 0, '.', '.') . " VNĐ";
    }
}
