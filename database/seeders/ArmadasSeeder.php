<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ArmadasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('armadas')->insert([
            [
                'name' => 'Truck A',
                'max_weight' => 10000, // dalam kilogram
                'length' => 600, // dalam centimeter
                'width' => 250, // dalam centimeter
                'height' => 300, // dalam centimeter
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Van B',
                'max_weight' => 3000, // dalam kilogram
                'length' => 400, // dalam centimeter
                'width' => 200, // dalam centimeter
                'height' => 200, // dalam centimeter
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Lorry C',
                'max_weight' => 15000, // dalam kilogram
                'length' => 700, // dalam centimeter
                'width' => 300, // dalam centimeter
                'height' => 350, // dalam centimeter
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
