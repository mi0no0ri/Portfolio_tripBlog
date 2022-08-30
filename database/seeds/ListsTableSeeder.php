<?php

use Illuminate\Database\Seeder;

class ListsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('lists')->insert([
            [
                'user_id' => '1',
                'list' => '尾道行きたい',
                'created_at' => now(),
                'updated_at' => now(),
            ],[
                'user_id' => '1',
                'list' => 'みんなでバンクーバーに行く',
                'created_at' => now(),
                'updated_at' => now(),
            ],[
                'user_id' => '2',
                'list' => '長崎のちゃんぽん',
                'created_at' => now(),
                'updated_at' => now(),
            ],[
                'user_id' => '2',
                'list' => '仙台で牛タン食べる',
                'created_at' => now(),
                'updated_at' => now(),
            ],[
                'user_id' => '3',
                'list' => '友達に会いにスペインに行く',
                'created_at' => now(),
                'updated_at' => now(),
            ],[
                'user_id' => '3',
                'list' => 'お遍路したい',
                'created_at' => now(),
                'updated_at' => now(),
            ],[
                'user_id' => '4',
                'list' => '今年こそ海外行く！',
                'created_at' => now(),
                'updated_at' => now(),
            ],[
                'user_id' => '4',
                'list' => '秋の京都に行きたい',
                'created_at' => now(),
                'updated_at' => now(),
            ],[
                'user_id' => '5',
                'list' => '千葉でゆっくりドライブ',
                'created_at' => now(),
                'updated_at' => now(),
            ],[
                'user_id' => '5',
                'list' => '箱根のロマンスカー乗る！',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
