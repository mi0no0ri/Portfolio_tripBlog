<?php

use Illuminate\Database\Seeder;

class ContactsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('contacts')->insert([
            [
                'user_id' => '1',
                'title' => '1',
                'comment' => 'テストテストテスト',
                'name' => 'test2',
                'email' => 'test1@gmail.com',
                'created_at' => now(),
                'updated_at' => now(),
            ],[
                'user_id' => '1',
                'title' => '1',
                'comment' => 'テストテストテスト',
                'name' => 'test2',
                'email' => 'test1@gmail.com',
                'created_at' => now(),
                'updated_at' => now(),
            ],[
                'user_id' => '2',
                'title' => '1',
                'comment' => 'テストテストテスト',
                'name' => 'test3',
                'email' => 'test2@gmail.com',
                'created_at' => now(),
                'updated_at' => now(),
            ],[
                'user_id' => '2',
                'title' => '1',
                'comment' => 'テストテストテスト',
                'name' => 'test3',
                'email' => 'test2@gmail.com',
                'created_at' => now(),
                'updated_at' => now(),
            ],[
                'user_id' => '3',
                'title' => '1',
                'comment' => 'テストテストテスト',
                'name' => 'test4',
                'email' => 'test3@gmail.com',
                'created_at' => now(),
                'updated_at' => now(),
            ],[
                'user_id' => '3',
                'title' => '1',
                'comment' => 'テストテストテスト',
                'name' => 'test4',
                'email' => 'test3@gmail.com',
                'created_at' => now(),
                'updated_at' => now(),
            ],[
                'user_id' => '4',
                'title' => '1',
                'comment' => 'テストテストテスト',
                'name' => 'test5',
                'email' => 'test4@gmail.com',
                'created_at' => now(),
                'updated_at' => now(),
            ],[
                'user_id' => '4',
                'title' => '1',
                'comment' => 'テストテストテスト',
                'name' => 'test5',
                'email' => 'test4@gmail.com',
                'created_at' => now(),
                'updated_at' => now(),
            ],[
                'user_id' => '5',
                'title' => '1',
                'comment' => 'テストテストテスト',
                'name' => 'test1',
                'email' => 'test5@gmail.com',
                'created_at' => now(),
                'updated_at' => now(),
            ],[
                'user_id' => '5',
                'title' => '1',
                'comment' => 'テストテストテスト',
                'name' => 'test1',
                'email' => 'test5@gmail.com',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
