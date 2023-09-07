<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Card;
use App\Models\Invoice;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        Card::factory()->create([
            'user_id' => 1,
            'number' => '7777888899991111',
            'full_name' => 'Hasan Musa',
            'expiration_date' => '15/25',
            'cvv' => '137',
            'amount' => 5000.00,
        ]);
        for ($i = 0; $i < 20; $i++) {
            Invoice::factory()->create([
                'full_name' => $this->getRandomFullName(),
                'description' => $this->getRandomDescription(),
                'amount' => $this->getRandomAmount(),
            ]);
        }
    }
    private function getRandomFullName()
    {
        $names = [
            'John Smith',
            'Jane Johnson',
            'Michael Brown',
            'Emily Wilson',
            'David Jones',
            'Olivia Davis',
            'Daniel Martinez',
            'Sophia Anderson',
            'William White',
            'Emma Lee',
        ];

        return $names[array_rand($names)];
    }
    private function getRandomDescription()
    {
        $descriptions = [
            'Web Development Services',
            'Graphic Design Work',
            'Consultation Fee',
            'Monthly Subscription',
            'Product Purchase',
            'Freelance Writing',
            'Marketing Campaign',
            'Maintenance Service',
            'Training Workshop',
            'Event Planning',
            'Software License',
            'Advertising Campaign',
            'Photography Services',
            'Consulting Services',
            'E-commerce Sales',
            'Hosting Renewal',
            'Legal Services',
            'Video Production',
            'Social Media Management',
            'SEO Optimization',
        ];

        return $descriptions[array_rand($descriptions)];
    }

    private function getRandomAmount()
    {
        return rand(50, 1000);
    }
}
