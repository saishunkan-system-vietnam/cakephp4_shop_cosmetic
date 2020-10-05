<?php
declare(strict_types=1);

use Migrations\AbstractMigration;

class CreateManufacturer extends AbstractMigration
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
        $table = $this->table('manufacturer');
        $table->addColumn('name','string',[
            'default' => null,
            'limit'   => 50,
            'null'    => false,
        ])
        ->addColumn('created_at', 'timestamp', ['default' => 'CURRENT_TIMESTAMP'])
        ->addColumn('updated_at','timestamp',['default' => 'CURRENT_TIMESTAMP'])
        ->addIndex(['name'],['unique'=>true])
        ->save();
    }
}
