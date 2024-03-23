<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Mission;
use App\Models\Record;
use App\Models\Point;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
       Mission::create([
            'name' => 'Shopper',
            'description' => 'Buy a skin',
        ]);

        // Mission::create([
        //     'name' => 'Champion',
        //     'description' => 'Win all minigames',
        // ]);

        // Mission::create([
        //     'name' => 'Athlete',
        //     'description' => 'Make 1000 points',
        // ]);

        Record::insert([
            [
            'game_name' => 'Crazy Maze',
            'points' => 0,
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'game_name' => 'Feverish Run',
                'points' => 0,
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'game_name' => 'Mad Hunting',
                'points' => 0,
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ]
        ]);
        Point::insert([
            [
                'game' => 'Crazy Maze',
                'points' => 0,
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
                ],
                [
                    'game' => 'Feverish Run',
                    'points' => 0,
                    'created_at' => \Carbon\Carbon::now(),
                    'updated_at' => \Carbon\Carbon::now()
                ],
                [
                    'game' => 'Mad Hunting',
                    'points' => 0,
                    'created_at' => \Carbon\Carbon::now(),
                    'updated_at' => \Carbon\Carbon::now()
                ]
        ]);

    }
}
