<?php

use Illuminate\Database\Seeder;

class PostsTableSeeder extends Seeder
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
                'username' => '西澤未乗',
                'kana' => 'nishizawa minori',
                'email' => 'test1@gamil.com',
                'password' => Hash::make('testtest'),
                'bio' => '2019年に某大学の観光学部を卒業後、某航空会社に入社しグランドスタッフとして3年間働いていました。その後WEBデザイナーに転職し、今回WEBサイト作成の練習も兼ねて趣味の旅行を記録するためブログを始めました！',
                'image' => 'IMG_7295.jpg',
                'back_image' => 'IMG_7574.JPG',
                'created_at' => '2022-06-23 13:35:51',
                'updated_at' => '2022-08-12 17:47:07',
            ],
        ]);
    }
}
