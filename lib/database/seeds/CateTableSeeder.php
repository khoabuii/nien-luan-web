<?php

use Illuminate\Database\Seeder;

class CateTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('category')->insert([
            [
                'cate_name'=>'Thủ thuật',
                'cate_slug'=>str_slug('Thủ thuật')
            ],
            [
                'cate_name'=>'MMO',
                'cate_slug'=>str_slug('MMO')
            ]
        ]);
    }
}
