<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('group_reminder', function (Blueprint $table) {
            $table->id();
            $table->foreignId('reminder_group_id')->constrained('reminder_groups');
            $table->foreignId('reminder_id')->constrained('reminders');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('group_reminder');
    }
};
