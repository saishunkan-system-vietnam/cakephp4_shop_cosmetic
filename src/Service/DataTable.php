<?php

namespace App\Service;

use App\Controller\AppController;
use Cake\Database\Expression\QueryExpression;
use Cake\ORM\Query;

class DataTable extends AppController{

    static function input($table,Array $columns, Array $paramUrl,Array $whereColumns)
    {
        $search    = $paramUrl['search']['value'];
        $limit     = $paramUrl['length'];
        $start     = $paramUrl['start'];
        $dataTable = new DataTable();
        $listData  = $dataTable->getTableLocator()->get($table);
        $page      = ceil($start / $limit) + 1;
        $draw      = $paramUrl['draw'];
        foreach ($columns as $key => $value) {
            if ($key == $paramUrl['order'][0]['column']) {
                $column = $value;
                $sort   = $paramUrl['order'][0]['dir'];
            }
        }

        return $dataTable->getData($listData,
            $limit,
            $search,
            $page,
            $column,
            $sort,
            $whereColumns,
            $draw
        );
    }

    public function getData($listData,$limit,$search,$page,$column,$sort,$whereColumns,$draw)
    {

        $arr_column = [];
        foreach ($whereColumns as $whereColumn) {
            $arr_column[]=["$whereColumn LIKE"=>"%$search%"];
        }
        $totalData = $listData->find()->count();
        $listData   = $listData
        ->find()
        ->select(['id','email','full_name','avatar','phone','address','gender','deleted'])
        ->where(function (QueryExpression $exp, Query $query) use ($arr_column) {
            return $exp->or($arr_column);
        })
        ->limit($limit)
        ->page($page)
        ->order([$column => $sort]);
        return ['listData'=>$listData,'totalData'=>$totalData];
    }
}
