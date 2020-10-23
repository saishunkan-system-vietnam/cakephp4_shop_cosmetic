<?php

namespace App\Controller\Component;

use Cake\Controller\Component;
use Cake\ORM\TableRegistry;

class CurdComponent extends Component
{
    public function add(String $model, array $data): bool
    {
        $dataTable = TableRegistry::getTableLocator()->get($model);
        $newData = $dataTable->newEmptyEntity();
        $newData = $dataTable->patchEntity($newData, $data);
        if ($dataTable->save($newData)) {
            return true;
        }
        return false;
    }

    public function update(String $model, array $data, $primaryKey): bool
    {
        $dataTable = TableRegistry::getTableLocator()->get($model);
        $updateData = $dataTable->get($primaryKey);
        $updateData = $dataTable->patchEntity($updateData, $data);
        if ($dataTable->save($updateData))
            return true;
        return false;
    }

    public function delete(String $model, $primaryKey): bool
    {
        $dataTable = TableRegistry::getTableLocator()->get($model);
        $deleteData = $dataTable->get($primaryKey);
        if ($dataTable->delete($deleteData))
            return true;
        return false;
    }
}
