<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LevelActivitiesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\LevelActivities::factory()->create([
            'label' => 'Débutant',
        ]);

        \App\Models\LevelActivities::factory()->create([
            'label' => 'Intermédiaire',
        ]);

        \App\Models\LevelActivities::factory()->create([
            'label' => 'Avancer',
        ]);
    }
}
