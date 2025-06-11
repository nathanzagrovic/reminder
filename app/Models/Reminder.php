<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reminder extends Model
{
    /** @use HasFactory<\Database\Factories\ReminderFactory> */
    use HasFactory;

    protected function completedAt(): Attribute
    {
        return Attribute::get(fn ($value) =>
        $value ? Carbon::parse($value)->format('d/m/y') : null
        );
    }

}
