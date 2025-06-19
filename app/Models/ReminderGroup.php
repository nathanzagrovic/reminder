<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ReminderGroup extends Model
{
    protected $fillable = ['name'];
    
    public function reminders()
    {
        return $this->belongsToMany(Reminder::class, 'group_reminder');
    }
}
