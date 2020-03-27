<?php
declare(strict_types=1);

use Migrations\AbstractMigration;

class ChangeColumnnameToRooms extends AbstractMigration
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
        $table->renameColumn('ac_noac', 'ac_facility');
        $table->renameColumn('with_or_without_food', 'food_availability');
        $table->renameColumn('notic_period', 'notice_period');
        $table->renameColumn('seates_available', 'seats_available');
        $table->update();
    }
}
