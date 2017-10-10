<?php

use Illuminate\Database\Seeder;

class CentralSettingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('central_settings')->delete();

        $values = array(
            array('login-notification', 'no', 'admin'),
            //array('max-google-email', '3', 'user'),
            //array('is-paused', 'yes', 'user'),
        );

        foreach($values as $v) {
            \App\CentralSettings::insert(array(
                'title' => $v[0],
                'status' => $v[1],
                'user_type' => $v[2],

                'created_at' => new DateTime,
                'updated_at' => new DateTime
            ));
        }
    }
}
