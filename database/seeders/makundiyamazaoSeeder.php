<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Makundiyamazao;

class makundiyamazaoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            'Mazao ya chakula',
            'Mazao ya Biashara',
            'Sunflowers',
            // Add more categories as needed
        ];

        foreach ($categories as $category) {
            Makundiyamazao::create([
                'jinalakundi' => $category,
            ]);
        }
    }
}
