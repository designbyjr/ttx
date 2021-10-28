<?php

namespace Database\Seeders;

use App\Models\Customers;
use App\Models\Incomes;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Customers::factory()->count(100)
            ->has(Incomes::factory()->count(10))
            ->create();
    }
}
