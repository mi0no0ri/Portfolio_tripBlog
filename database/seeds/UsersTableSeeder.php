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
        DB::table('users')->insert([
            [
                'username' => 'test1',
                'kana' => 'テスト1',
                'email' => 'test1@gmail.com',
                'password' => Hash::make('testtest'),
                'bio' => 'テストテストテストテストテストテストテストテストテストテストテストテストテストテストテストテストテストテストテストテストテストテストテストテストテストテストテスト',
                'image' => 'IMG_7295.jpg',
                'back_image' => 'IMG_7574.JPG',
                'created_at' => now(),
                'updated_at' => now(),
            ],[
                'username' => 'test2',
                'kana' => 'テスト2',
                'email' => 'test2@gmail.com',
                'password' => Hash::make('testtest'),
                'bio' => 'テストテストテストテストテストテストテストテストテストテストテストテストテストテストテストテストテストテストテストテストテストテストテストテストテストテストテスト',
                'image' => '',
                'back_image' => 'IMG_7574.JPG',
                'created_at' => now(),
                'updated_at' => now(),
            ],[
                'username' => 'test3',
                'kana' => 'テスト3',
                'email' => 'test3@gmail.com',
                'password' => Hash::make('testtest'),
                'bio' => 'テストテストテストテストテストテストテストテストテストテストテストテストテストテストテストテストテストテストテストテストテストテストテストテストテストテストテスト',
                'image' => '',
                'back_image' => 'IMG_7574.JPG',
                'created_at' => now(),
                'updated_at' => now(),
            ],[
                'username' => 'test4',
                'kana' => 'テスト4',
                'email' => 'test4@gmail.com',
                'password' => Hash::make('testtest'),
                'bio' => 'テストテストテストテストテストテストテストテストテストテストテストテストテストテストテストテストテストテストテストテストテストテストテストテストテストテストテスト',
                'image' => '',
                'back_image' => 'IMG_7574.JPG',
                'created_at' => now(),
                'updated_at' => now(),
            ],[
                'username' => 'test5',
                'kana' => 'テスト5',
                'email' => 'test5@gmail.com',
                'password' => Hash::make('testtest'),
                'bio' => 'テストテストテストテストテストテストテストテストテストテストテストテストテストテストテストテストテストテストテストテストテストテストテストテストテストテストテスト',
                'image' => '',
                'back_image' => 'IMG_7574.JPG',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
