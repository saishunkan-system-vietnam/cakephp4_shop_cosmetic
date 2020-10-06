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
        foreach ($columns as $key => $value) {
            if ($key == $paramUrl['order'][0]['column']) {
                $column = $value;
                $sort   = $paramUrl['order'][0]['dir'];
            }
        }

        return $dataTable->getData($listData,
            $columns,
            $limit,
            $search,
            $page,
            $column,
            $sort,
            $whereColumns
        );
    }

    public function getData($listData,$select,$limit,$search,$page,$column,$sort,$whereColumns)
    {
        $arr_column = [];
        foreach ($whereColumns as $whereColumn) {
            $arr_column[]=["$whereColumn LIKE"=>"%$search%"];
        }
        $totalData = $listData->find()->count();
        $listData  = $listData
        ->find()
        ->select($select)
        ->where(function (QueryExpression $exp, Query $query) use ($arr_column) {
            return $exp->or($arr_column);
        })
        ->limit($limit)
        ->page($page)
        ->order([$column => $sort]);
        return ['listData'=>$listData,'totalData'=>$totalData];
    }
}
