<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * BillFixture
 */
class BillFixture extends TestFixture
{
    /**
     * Table name
     *
     * @var string
     */
    public $table = 'bill';
    /**
     * Fields
     *
     * @var array
     */
    // phpcs:disable
    public $fields = [
        'id' => ['type' => 'integer', 'length' => null, 'unsigned' => true, 'null' => false, 'default' => null, 'comment' => '', 'autoIncrement' => true, 'precision' => null],
        'id_user' => ['type' => 'integer', 'length' => null, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'id_transport' => ['type' => 'integer', 'length' => null, 'unsigned' => true, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'status' => ['type' => 'tinyinteger', 'length' => null, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '0:UNCONFIRMED, 1:processing,
2: shipping, 3: finish, 4:cancel
', 'precision' => null],
        '_indexes' => [
            'id_user' => ['type' => 'index', 'columns' => ['id_user'], 'length' => []],
            'id_transport' => ['type' => 'index', 'columns' => ['id_transport'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
            'bill_ibfk_2' => ['type' => 'foreign', 'columns' => ['id_transport'], 'references' => ['transport', 'id'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
            'bill_ibfk_1' => ['type' => 'foreign', 'columns' => ['id_user'], 'references' => ['user', 'id'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
        ],
        '_options' => [
            'engine' => 'InnoDB',
            'collation' => 'utf8mb4_general_ci'
        ],
    ];
    // phpcs:enable
    /**
     * Init method
     *
     * @return void
     */
    public function init(): void
    {
        $this->records = [
            [
                'id' => 1,
                'id_user' => 1,
                'id_transport' => 1,
                'status' => 1,
            ],
        ];
        parent::init();
    }
}
