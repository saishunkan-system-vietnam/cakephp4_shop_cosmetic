<?php
declare(strict_types=1);

namespace App\Controller;

use Cake\Routing\Router;

/**
 * Category Controller
 *
 * @property \App\Model\Table\CategoryTable $Category
 * @method \App\Model\Entity\Category[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class CategoryController extends AppController
{
    public function initialize(): void
    {
        parent::initialize();
        $this->loadComponent('Curd');
    }

    public function index()
    {
        $this->render('list_categories');
    }

    public function renderListCategories()
    {
        $inputData     = $this->request->getQuery();
        $search        = !empty($inputData['search']['value']) ? $inputData['search']['value'] : '';
        $limit         = $inputData['length'];
        $start         = $inputData['start'];
        $page          = ceil($start / $limit) + 1;
        $categoryTable = $this->Category;
        $categories    = $categoryTable->find()
        ->where(['name LIKE'=>"%$search%"])
        ->limit($limit)
        ->page(intval($page));
        $data = [];
        $data["draw"]            = intval($inputData['draw']);
        $data["recordsTotal"]    = $categories->count();
        $data["recordsFiltered"] = $categories->count();
        foreach ($categories as $category) {
            $nameCategory =
            !empty($category->id_parent) ?
            $categoryTable->find()->where(['id'=>$category->id_parent])->first()->name : 'Không có danh mục cha';
            $data['data'][] = [
                $category->id,
                $category->name,
                $nameCategory,
                "<a href='".Router::url('/category/view/'.$category->id,true)."'>Chi tiết</a>",
                "<a href='".Router::url('/category/delete/'.$category->id,true)."'>Xóa</a>"
            ];
        }
        $this->set($data);
        $this->viewBuilder()->setOption('serialize', true);
        $this->RequestHandler->renderAs($this, 'json');
    }


    /**
     * View method
     *
     * @param string|null $id Category id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $category = $this->Category->get($id);
        $categories = $this->Category->find();
        $this->set(['category' => $category,'categories' => $categories]);
        $this->render('view_update');
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */

    public function add()
    {
        //post
        if ($this->request->is('post')) {
            $category = $this->Curd->add('Category',$this->request->getData());
            if ($this->Category->save($category)) {
                $this->Flash->success('Thêm sản phẩm thành công');
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The category could not be saved. Please, try again.'));
        }
        //get
        $categories = $this->Category->find();
        $this->set('categories', $categories);
        $this->render('view_create');
    }

    /**
     * Edit method
     *
     * @param string|null $id Category id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $category = $this->Category->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $category = $this->Category->patchEntity($category, $this->request->getData());
            if ($this->Category->save($category)) {
                $this->Flash->success(__('The category has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The category could not be saved. Please, try again.'));
        }
        $this->set(compact('category'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Category id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete','get']);
        $category = $this->Category->get($id);
        if ($this->Category->delete($category)) {
            $this->Flash->success(__('Xóa danh mục thành công'));
        } else {
            $this->Flash->error(__('Xóa danh mục thất bại'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
