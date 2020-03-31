<?php
declare(strict_types=1);

use Migrations\AbstractMigration;

class RemoveRoomFromPgDetails extends AbstractMigration
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
        $table = $this->table('pg_details');
        $table->removeColumn('room');
        $table->update();
       
}
}
