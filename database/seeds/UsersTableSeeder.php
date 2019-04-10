<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    public const ADMIN_ID = 1;
    public const ADMIN_EMAIL = 'ruppel.florian@gmail.com';

    public function run()
    {
        \App\User::query()->delete();

        factory(App\User::class)->create([
            'id' => self::ADMIN_ID,
            'name' => 'Florian Ruppel',
            'email' => self::ADMIN_EMAIL,
            'password' => bcrypt('asdasd'),
        ]);
    }
}