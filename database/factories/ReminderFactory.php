<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Board;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Reminder>
 */
class ReminderFactory extends Factory
{
    
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => 1,
            'title' => fake()->sentence(3),
            'notes' => fake()->sentence(8),
            'board_id' => Board::firstOrCreate(
                ['user_id' => 1],
                ['name' => 'Default Board', 'description' => 'Default board for reminders']
            )->id,
            'completed_at' => null,
        ];
    }
}
