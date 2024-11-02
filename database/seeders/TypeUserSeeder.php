<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TypeUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\TypeUser::factory()->create([
            'label' => 'Demi-pensionnaire',
        ]);

        \App\Models\TypeUser::factory()->create([
            'label' => 'Propriétaire mixte',
        ]);

        \App\Models\TypeUser::factory()->create([
            'label' => 'Propriétaire pré',
        ]);

        \App\Models\TypeUser::factory()->create([
            'label' => 'Locataire carrière',
        ]);

        \App\Models\TypeUser::factory()->create([
            'label' => 'Invité',
        ]);
    }
}
