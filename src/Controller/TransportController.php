<?php
declare(strict_types=1);

namespace App\Controller;

use App\Controller\Api\ApiController;

class TransportController extends ApiController
{

    public function initialize(): void
    {
        parent::initialize();
        $this->loadComponent('Curd');
        $this->loadComponent('DataTable');
    }

    public function index()
    {
        $this->render('index');
    }

    public function renderListTransports()
    {
        $config = [
            'params'=> $this->request->getQuery(),
            'selectColumns'=>['id','name','price','description'],
            'searchColumns'=>['name','price','description'],
        ];
        $sampleArr = [
            'id',
            'name',
            ['function'=>'num_format','col'=>'price'],
            'description',
            [
                'function'=>'route',
                'url'=>'/admin/transport/view',
                'col'=>'id',
                'card' =>'a',
                'text'=>'Chi tiết'
            ],
            [
                'function'=>'route',
                'url'=>'/admin/transport/delete',
                'col'=>'id',
                'card' =>'a',
                'text'=>'Xóa'
            ]
        ];
        $data = $this->DataTable->renderListData('Transport', $config)->exportListData($sampleArr);
        $this->responseJson($data);
    }

    public function view($id = null)
    {
        $transport = $this->Transport->get($id);
        $this->set(['transport' => $transport]);
        $this->render('view');
    }

    public function add()
    {
        $this->request->allowMethod(['post','get']);
        if($this->request->is('post'))
        {
            if($this->Curd->add('Transport',$this->request->getData()))
            {
                $this->Flash->set('Thêm hình thức vận chuyển thành công');
                return $this->redirect(['action' => 'index']);
            }
            return $this->Flash->set('Thêm hình thức vận chuyển thất bại');
        }else{
            $this->render('add');
        }
    }

    public function edit($id = null)
    {
        if ($this->request->is(['patch', 'post', 'put'])) {
            if($this->Curd->update('Transport',$this->request->getData(),$id))
            {
                $this->Flash->set('Sửa hình thức vận chuyển thành công');
                return $this->redirect(['action' => 'index']);
            }
            return $this->Flash->set('Sửa hình thức vận chuyển thất bại');
        }
        $this->redirect('/admin');
    }

    public function delete($id = null)
    {
        if ($this->Curd->delete('Transport',$id)) {
            $this->Flash->set('Xóa hình thức vận chuyển thành công');
        } else {
            $this->Flash->set('Xóa hình thức vận chuyển thất bại');
        }
        return $this->redirect(['action' => 'index']);
    }
}
