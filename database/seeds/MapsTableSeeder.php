<?php

use Illuminate\Database\Seeder;

class MapsTableSeeder extends Seeder
{

    public function run()
    {
        \App\Map::query()->delete();

        factory(App\Map::class)->create([
            'name' => 'Standard'
        ]);
        factory(App\Map::class)->create([
            'name' => 'Hellas'
        ]);
        factory(App\Map::class)->create([
            'name' => 'Elysium'
        ]);
    }
}