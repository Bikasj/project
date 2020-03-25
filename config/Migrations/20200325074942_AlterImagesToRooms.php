<?php
declare(strict_types=1);

use Migrations\AbstractMigration;

class AlterImagesToRooms extends AbstractMigration
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
        
        $table = $this->table('rooms');
        $table->changeColumn('image', 'blob', [
               'default' => null,
                // 'limit' => 4294967295,
                'null' => true,
            ])
        
        ->update();
    }
}
