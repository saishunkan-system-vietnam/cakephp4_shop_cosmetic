<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * BillDetail Model
 *
 * @method \App\Model\Entity\BillDetail newEmptyEntity()
 * @method \App\Model\Entity\BillDetail newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\BillDetail[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\BillDetail get($primaryKey, $options = [])
 * @method \App\Model\Entity\BillDetail findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\BillDetail patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\BillDetail[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\BillDetail|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\BillDetail saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\BillDetail[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\BillDetail[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\BillDetail[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\BillDetail[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class BillDetailTable extends Table
{
    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('bill_detail');
        $this->setDisplayField('id_bill');
        $this->setPrimaryKey(['id_bill', 'id_product']);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator): Validator
    {
        $validator
            ->nonNegativeInteger('id_bill')
            ->allowEmptyString('id_bill', null, 'create');

        $validator
            ->nonNegativeInteger('id_product')
            ->allowEmptyString('id_product', null, 'create');

        $validator
            ->integer('amount')
            ->requirePresence('amount', 'create')
            ->notEmptyString('amount');

        $validator
            ->numeric('price')
            ->notEmptyString('price');

        $validator
            ->nonNegativeInteger('point')
            ->notEmptyString('point');

        return $validator;
    }
}
