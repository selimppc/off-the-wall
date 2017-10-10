<?php

use Illuminate\Database\Seeder;

class MenuTypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('menu_type')->delete();

        $values = array(
            array('Top', 'top', 'top', 'Main Menu', 1, 1),
            array('Footer', 'footer', 'footer', 'Footer Menu', 1, 1),

        );

        foreach($values as $v) {
            \App\MenuType::insert(array(
                'title' => $v[0],
                'slug' => $v[1],
                'type' => $v[2],
                'desc' => $v[3],
                'created_by' => $v[4],
                'updated_by' => $v[5],

                'created_at' => new DateTime,
                'updated_at' => new DateTime
            ));
        }
    }
}
