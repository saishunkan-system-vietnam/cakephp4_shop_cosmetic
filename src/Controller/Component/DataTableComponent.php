<?php

namespace App\Controller\Component;

use Cake\Controller\Component;
use Cake\Database\Expression\QueryExpression;
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

    public function renderListData(String $model, $config): Object
    {
        $this->draw = $config['params']['draw'];
        $search = $config['params']['search']['value'];
        $limit = $config['params']['length'];
        $start = $config['params']['start'];
        $column = $config['params']['order'][0]['column'];
        foreach ($config['selectColumns'] as $key => $col) {
            if($key == $column)
            {
                $column = $col;
            }
        }
        $sort = $config['params']['order'][0]['dir'];
        $page = ceil($start / $limit) + 1;
        $searchColumns = [];
        foreach ($config['searchColumns'] as $col) {
            $searchColumns[] = ["$col LIKE" => "%$search%"];
        }
        $dataTable = TableRegistry::getTableLocator()->get($model);
        $totalData = $dataTable->find()->count();
        $listData = $dataTable
            ->find()
            ->select($config['selectColumns'])
            ->where(function (QueryExpression $exp) use ($searchColumns) {
                return $exp->or($searchColumns);
            })
            ->limit($limit)
            ->page($page)
            ->order([$column => $sort]);
        $this->setTotalData($totalData);
        $this->setListData($listData);
        return $this;
    }

    public function exportListData(array $sampleArr)
    {
        $results = [];
        foreach ($this->listData as $data) {
            foreach ($sampleArr as $value) {
                if (gettype($value) == 'array') {
                    switch ($value['function']) {
                        case 'num_format':
                            $col = $value['col'];
                            $result[] = $this->convertIntToMoney($data->$col);
                            break;
                        case 'route':
                            $col = $value['col'];
                            $result[] = "<a href='" . Router::url($value['url'] . '/' . $data->$col, true) . "'>" . $value['text'] . "</a>";
                            break;
                    }
                } else {
                    $result[] = $data->$value;
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
