<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\ReminderGroup;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Reminder extends Model
{
    protected $fillable = [
        'title',
        'notes',
        'completed_at'
    ];

    /** @use HasFactory<\Database\Factories\ReminderFactory> */
    use HasFactory;

    protected function completedAt(): Attribute
    {
        return Attribute::get(fn ($value) =>
        $value ? Carbon::parse($value)->format('d/m/y') : null
        );
    }

    public function groups(): BelongsToMany
    {
        return $this->belongsToMany(ReminderGroup::class, 'group_reminder');
    }

}
