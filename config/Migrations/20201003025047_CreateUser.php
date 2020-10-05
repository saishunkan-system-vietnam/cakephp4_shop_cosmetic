<?php
declare(strict_types=1);

use Migrations\AbstractMigration;

class CreateUser extends AbstractMigration
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
        $table = $this->table('user');
        $table->addColumn('email','string',[
            'default' => null,
            'limit'   => 100,
            'null'    => false,
        ])
        ->addColumn('password','string',[
            'default' => null,
            'limit'   => 200,
            'null'    => false
        ])
        ->addColumn('avatar','string',[
            'default' => null,
            'limit'   => 100,
            'null'    => true
        ])
        ->addColumn('full_name','string',[
            'default' => null,
            'limit'   => 50,
            'null'    => false
        ])
        ->addColumn('phone','char',[
            'default' => null,
            'limit'   => 20,
            'null'    => false
        ])
        ->addColumn('address','string',[
            'default' => null,
            'limit'   => 200,
            'null'    => false
        ])
        ->addColumn('gender','boolean',[
            'default' => 1,
            'null'    => false
        ])
        ->addColumn('deleted','boolean',[
            'default' => 0,
            'null'    => false
        ])
        ->addIndex(['email'],['unique'=>true])
        ->addIndex(['phone'],['unique'=>true])
        ->addIndex(['avatar'],['unique'=>true])
        ->save();
    }
}
