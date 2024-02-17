<?php

namespace Database\Seeders;

use App\Models\Material;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MaterialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        // \App\Models\Material::factory()->count(100)->create();
        Material::create(['name' => 'بانر']);
    }
}
