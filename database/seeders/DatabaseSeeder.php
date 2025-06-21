<?php

namespace Database\Seeders;

use App\Models\Reminder;
use App\Models\User;
use App\Models\ReminderGroup;
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

        Reminder::factory(6)->create([
            'user_id' => 1,
        ]);
        
        ReminderGroup::factory(3)->create([
            'user_id' => 1,
        ]);

    }
}