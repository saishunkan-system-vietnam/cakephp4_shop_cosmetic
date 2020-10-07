<?php
declare(strict_types=1);

use Migrations\AbstractMigration;

class Order extends AbstractMigration
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
        $table = $this->table('order');
        $table->addColumn('id_product', 'integer',[
            'default' => null,
            'null'    => false
        ])
        ->addColumn('amount','integer',[
            'default' => null,
            'null'    => false
        ])
        ->addColumn('price','integer',[
            'default' => null,
            'null' => false
        ])
        ->addColumn('name','string',[
            'default' => null,
            'limit'=>50,
            'null' => false
        ])
        ->addColumn('address','string',[
            'default'=> null,
            'limit'=>200,
            'null' => false
        ])
        ->addColumn('phone','char',[
            'default'=> null,
            'limit'=> 20,
            'null' => false
        ])
        ->addColumn('created_at','timestamp', [
            'default' => 'CURRENT_TIMESTAMP'
        ])
        ->addColumn('status','boolean',[
            'default'=>0,
            'null' => false
        ])
        ->addForeignKey('id_product','product','id');
        $table->save();
    }
}
