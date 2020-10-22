<?php

namespace App\Controller\Component;
use Cake\ORM\TableRegistry;

class CommonComponent extends CommonComponent{

    public function loadModel(Array $models)
    {
        foreach ($models as $model) {
            $this->$model = TableRegistry::getTableLocator()->get($model);
        }
    }
}
