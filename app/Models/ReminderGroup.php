<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ReminderGroup extends Model
{
    protected $fillable = ['name', 'user_id'];

    use HasFactory;

    public function reminders()
    {
        return $this->belongsToMany(Reminder::class, 'group_reminder');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
