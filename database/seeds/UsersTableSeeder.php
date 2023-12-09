<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;


class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        DB::table('users')->insert([
            [
                'username' => 'TasakaTomoki',
                'mail' => 'tigertomo228@ab.auone-net.jp',
                'password' => Hash::make('TomoAtlas228'),
                'images' => 'images/icon' . $faker->numberBetween(1, 7) . '.png',
            ]

        ]);
    }
}
