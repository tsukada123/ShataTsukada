<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash; //Hash::makeを使用するための記述

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(){
        DB::table('users')->insert([
            [
                'username' => '塚田祥太',
                'mail' => 'xzhongtian198@gmail.com',
                'password' => Hash::make('st1313156'),
                'bio' => 'こんにちは！',
                'images' => '123',
                'created_at' => '2023-04-27 23:00',
                'updated_at' => '2023-04-27 23:00'
            ],
            [
                'username' => 'つかだしょうた',
                'mail' => 'xzhongtian198@gmail.com',
                'password' => Hash::make('alice.0125'),
                'bio' => 'こんにちは！',
                'images' => '123',
                'created_at' => '2023-04-27 23:00',
                'updated_at' => '2023-04-27 23:00'
            ],
            [
                'username' => 'ツカダショウタ',
                'mail' => 'xzhongtian198@gmail.com',
                'password' => Hash::make('white_snow2528'),
                'bio' => 'こんにちは！',
                'images' => '123',
                'created_at' => '2023-04-27 23:00',
                'updated_at' => '2023-04-27 23:00'
            ]
        ]);
    }
}
