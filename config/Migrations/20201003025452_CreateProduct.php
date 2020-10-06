<?php
declare(strict_types=1);

use Migrations\AbstractMigration;

class CreateProduct extends AbstractMigration
{
    /**
     * Change Method.
     *
     * More information on this method is available here:
     * https://book.cakephp.org/phinx/0/en/migrations.html#the-change-method
     * @return void
     */
    public function change()
    {
        $table = $this->table('product');
        $table->addColumn('name','string',[
            'default' => null,
            'limit'   => 100,
            'null'    => false,
        ])
        ->addColumn('image','string',[
            'default' => null,
            'limit'   => 100,
            'null'    => true
        ])
        ->addColumn('price','float',[
            'default' => null,
            'null'    => false
        ])
        ->addColumn('amount','integer',[
            'default' => null,
            'null'    => false
        ])
        ->addColumn('product_info','text',[
            'default' => null,
            'null'    => false
        ])
        ->addColumn('id_trademark','integer',[
            'default' => null,
            'null'    => false
        ])
        ->addColumn('id_type_product','integer',[
            'default' => null,
            'null'    => false
        ])
        ->addColumn('created_at', 'timestamp', ['default' => 'CURRENT_TIMESTAMP'])
        ->addColumn('updated_at','timestamp',['default' => 'CURRENT_TIMESTAMP'])
        ->addForeignKey('id_trademark','trademark','id')
        ->save();
    }
}
