<?php

namespace Database\Seeders;

use App\Models\Reminder;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory()->create([
            'name' => 'Bill Gates',
            'email' => 'bill@microsoft.com',
        ]);

        Reminder::factory(6)->create();

    }
}
