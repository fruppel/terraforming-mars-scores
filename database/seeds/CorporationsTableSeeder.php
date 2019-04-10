<?php

use Illuminate\Database\Seeder;

class CorporationsTableSeeder extends Seeder
{

    private const CORPORATIONS = [
        'Arkadien Gemeinschaft',
        'CrediCor',
        'Ecoline',
        'Helion',
        'Interplanetare Filmgesellschaft',
        'Inventrix',
        'Mining Guild',
        'Phoblog',
        'Recyclon',
        'Republik Tharsis',
        'Saturn Systems',
        'Splice',
        'Teractor',
        'Thorgate',
        'United Nations Mars Initiative',
    ];

    public function run()
    {
        \App\Corporation::query()->delete();

        foreach (self::CORPORATIONS as $corporation) {
            factory(App\Corporation::class)->create([
                'name' => $corporation
            ]);
        }
    }
}