<?php
declare(strict_types=1);

namespace App\Controller;

use App\Controller\CommonController;
use Cake\Http\Session;

class TransportController extends CommonController
{

    public function initialize(): void
    {
        parent::initialize();
        $this->loadComponent('Curd');
        $this->loadComponent('DataTable');
        $this->loadComponent('Transport');
        $this->loadComponent('Product');
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
                'url'=>'/admin/transport/view/:id',
                'tag' =>'a',
                'text'=>'Chi tiết'
            ],
            [
                'function'=>'route',
                'url'=>'/admin/transport/delete/:id',
                'tag' =>'a',
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

    public function changeTransport()
    {
        try {
            $transport_id = $this->request->getQuery('transport_id');
            $transport = $this->Transport->show($transport_id);
            $total_price_and_leftover_point = $this->Product->calculateTotalPriceAndLeftoverPointProduct($transport->price);
            $result = [
                'status' => 200,
                'transport_fee' => "Thêm ".number_format($transport->price,0,'.','.')."₫ phí vận chuyển",
                'total' => number_format($total_price_and_leftover_point['total_price'],0,'.','.')."₫",
                'leftover_point' => $total_price_and_leftover_point['leftover_point']
            ];
            return $this->responseJson($result);
        } catch (\Throwable $th) {
            $result = [
                'status' => 500,
                'message' => $th->getMessage()
            ];
            return $this->responseJson($result);
        }
    }
}
