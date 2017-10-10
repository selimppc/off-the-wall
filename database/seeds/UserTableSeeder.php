<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('user')->delete();

        $country_id = DB::table('country')->select('id')->where('title', 'Bangladesh ')->first()->id;
        $users = array(
            array('admin', 'admin', 'admin@admin.com', Hash::make('admin'), 'Dhaka', '01785987645', 'Dhaka',$country_id ,'admin','active','fioyugpuiesiorgjhprauehrigpi'),
            array('admin', 'admin', 'almasbd@gmail.com', Hash::make('admin'), 'Dhaka', '01785987645', 'Dhaka',$country_id ,'admin','active','fioyugpuiesiorgjhprauehrigpi'),
            array('admin', 'admin', 'tanintjt@gmail.com', Hash::make('admin'), 'Dhaka', '01785987645', 'Dhaka',$country_id ,'admin','active','fioyugpuiesiorgjhprauehrigpi'),
        );

        foreach($users as $user) {
            \App\User::insert(array(
                'first_name' => $user[0],
                'last_name' => $user[1],
                'email' => $user[2],
                'password' => $user[3],
                'address' => $user[4],
                'phone_number' => $user[5],
                'state' => $user[6],
                'country_id' => $user[7],
                'type' => $user[8],
                'status' => $user[9],
                'remember_token' => $user[10],
                'created_at' => new DateTime,
                'updated_at' => new DateTime
            ));
        }
    }
}
