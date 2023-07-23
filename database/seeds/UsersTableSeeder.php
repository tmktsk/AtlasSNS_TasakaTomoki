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
                'username' => 'TasakaTomoki',
                'mail' => 'tigertomo228@ab.auone-net.jp',
                'password' => Hash::make('TomoAtlas228'),
            ]
            
        ]);
    }
}
