<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;
class PostTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
           'name'=>'Shakeel ahmed',
           'usertype'=>'admin',
           'email'=>'sha123@gmail.com',
           'password'=>'12345678'
        ]);
    }
}
