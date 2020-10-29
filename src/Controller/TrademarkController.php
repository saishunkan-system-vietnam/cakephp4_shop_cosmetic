<?php

namespace App\Controller;

class TrademarkController extends CommonController{

    public function initialize(): void
    {
        parent::initialize();
        $this->loadComponent('Trademark');
        $this->loadComponent('DataTable');
    }

    public function show()
    {
        $trademark_id = $this->request->getParam('id');
        $trademark = $this->Trademark->show($trademark_id);
        $this->set('trademark',$trademark);
        $this->render('trademark_detail');
    }

    public function createTrademark()
    {
        if($this->request->getMethod() == "GET")
        {
            return $this->render('create_trademark');
        }
        elseif($this->request->getMethod() == "POST")
        {
            $trademarkName  = $this->request->getData()['name'];
            if($this->Trademark->addTrademark($trademarkName) != false){
                $this->Flash->set('Thêm thương hiệu thành công');
                return $this->redirect('/admin/list-trademark');
            }
        }
    }

    public function listTrademark()
    {
        return $this->render('list_trademark');
    }

    public function renderListTrademark()
    {
        $config = [
            'params'=> $this->request->getQuery(),
            'selectColumns'=>['id','name','created_at','updated_at'],
            'searchColumns'=>['name'],
        ];

        $sampleArr = [
            'id',
            'name',
            ['function'=>'date','col'=>'created_at'],
            ['function'=>'date','col'=>'updated_at'],
            ['function'=>'route','url'=>'/admin/trademark/:id','text'=>'Chi tiết','tag'=>'a'],
        ];
        $data = $this->DataTable->renderListData('Trademark',$config)->exportListData($sampleArr);
        return $this->responseJson($data);
    }

    public function updateTrademark()
    {
        $trademark_id = $this->request->getParam('id');
        $trademark_name = $this->request->getData('name');
        if($this->Trademark->update($trademark_name, $trademark_id) != false)
        {
            $this->Flash->set('Cập nhật thương hiệu thành công');
            return $this->redirect('/admin/list-trademark');
        }else{
            $this->Flash->set('Cập nhật thương hiệu thất bại');
            return $this->redirect('/admin/list-trademark');
        }
    }
}
