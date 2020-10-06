<?php
declare(strict_types=1);

use Migrations\AbstractMigration;

class CreateTypeProduct extends AbstractMigration
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
        $table = $this->table('type_product')
        ->addColumn('name','string',[
            'default' => null,
            'limit'   => 50,
            'null'    => false,
        ]);
        $table->create();
    }
}
