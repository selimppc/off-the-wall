<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

//        $this->call(CountryTable::class);
//        $this->call(UserTableSeeder::class);
//        $this->call(CentralSettingsTableSeeder::class);
        $this->call(MenuTypeTableSeeder::class);
        Model::reguard();

    }
}
