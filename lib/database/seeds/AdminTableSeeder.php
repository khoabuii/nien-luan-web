<?php

use Illuminate\Database\Seeder;

class AdminTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('admin')->insert([
            [
                'email'=>'admin@admin.com',
                'password'=>bcrypt('12345'),
                'name'=>'admin'
            ]
        ]);
    }
}
