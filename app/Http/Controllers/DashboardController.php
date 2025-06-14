<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;

class DashboardController extends Controller
{
    /**
     * Display the dashboard view.
     */
    public function index()
    {
        return Inertia::render('Dashboard', [
            'reminders' => auth()->user()->reminders,
            'totalReminders' => auth()->user()->reminders()->count(),
        ]);
    }
} 