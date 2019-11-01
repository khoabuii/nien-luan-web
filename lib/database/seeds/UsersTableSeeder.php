<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('users')->insert([
            [
                'email'=>'buidangkhoa29@gmail.com',
                'password'=>bcrypt('12345'),
                'name'=>'Khoa Bui',
                'level'=>1
            ],
            [
                'email'=>'khoab1606808@student.ctu.edu.vn',
                'password'=>bcrypt('12345'),
                'name'=>'B1606808',
                'level'=>1
            ],
            [
                'email'=>'user1@gmail.com',
                'password'=>bcrypt('12345'),
                'name'=>'user1',
                'level'=>0
            ],
        ]);
    }
}
