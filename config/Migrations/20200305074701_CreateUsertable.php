<?php
declare(strict_types=1);

use Migrations\AbstractMigration;

class CreateUsertable extends AbstractMigration
{
    /**
     * Change Method.
     *
     * More information on this method is available here:
     * http://docs.phinx.org/en/latest/migrations.html#the-change-method
     * @return void
     */
    public function change()
    {
         $this->table('user_tables', ['id' => false, 'primary_key' => ['user_id']])
            ->addColumn('user_id', 'integer', [
                'autoIncrement' => true,
                'default' => null,
                'limit' => 11,
                'null' => false,
            ])
            ->addColumn('name', 'string', [
                'default' => 'null',
                'limit' => 20,
                'null' => false,
            ])
            ->addColumn('username', 'string', [
                'default' => null,
                'limit' => 20,
                'null' => false,
            ])
            ->addColumn('email', 'string', [
                'default' => null,
                'limit' => 30,
                'null' => false,
            ])
            ->addColumn('password', 'string', [
                'default' => null,
                'limit' => 20,
                'null' => false,
            ])
             ->addColumn('adharcard', 'integer', [
                'default' => null,
                'limit' => 20,
                'null' => false,
            ])
             ->addColumn('role', 'integer', [
                'default' => null,
                'limit' => 5,
                'null' => false,
            ])
             
            ->addColumn('status', 'string', [
                'comment' => '1:Active, 0:Inactive',
                'default' => '1',
                'limit' => null,
                'null' => false,
            ])
            ->addColumn('created', 'datetime', [
                'default' => null,
                'limit' => null,
                'null' => false,
            ])
             ->addColumn('updated', 'datetime', [
                'default' => null,
                'limit' => null,
                'null' => false,
            ])
	    ->addForeignKey('role','user_roles','id')
            ->create();
    }
}
