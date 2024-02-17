<?php

namespace Database\Seeders;

use App\Models\ClientClass;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ClientClassSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        ClientClass::create(['name' => 'class a']);
    }
}
