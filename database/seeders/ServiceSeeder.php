<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Service;


class ServiceSeeder extends Seeder
{
    public function run(): void
    {
        Service::create([
            'name' => 'General Pest Control',
            'description' => 'Comprehensive pest control service',
            'price' => 100.00,
        ]);

        Service::create([
            'name' => 'Termite Treatment',
            'description' => 'Specialized termite treatment',
            'price' => 200.00,
        ]);

        Service::create([
            'name' => 'Rodent Control',
            'description' => 'Rodent extermination service',
            'price' => 150.00,
        ]);
    }
}
