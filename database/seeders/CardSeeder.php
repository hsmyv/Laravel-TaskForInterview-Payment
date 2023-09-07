<?php

namespace Database\Seeders;

use App\Models\Card;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CardSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Card::factory()->create([
            'number' => '7777888899991111',
            'full_name' => 'Hasan Musa',
            'expiration_date' => '15/25',
            'cvv' => '137',
            'amount' => 5000.00,
        ]);
    }
}
