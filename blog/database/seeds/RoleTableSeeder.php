<?php

use Illuminate\Database\Seeder;
use App\Role;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role_player = new Role();
        $role_player->name = 'player';
        $role_player->description = 'A Player of the PnP Group';
        $role_player->save();

        $role_master = new Role();
        $role_master->name = 'master';
        $role_master->description = 'The Master of the PnP Group';
        $role_master->save();
    }
}
