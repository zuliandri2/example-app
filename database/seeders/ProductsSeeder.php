<?php

namespace Database\Seeders;

use App\Models\Products;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Products::factory()->count(10)->create();

        Products::factory()->create([
            'name' => "Sepatu",
            'description' => 'Sepatu Mahal',
            'price' => 80000.00,
        ]);
    }
}
