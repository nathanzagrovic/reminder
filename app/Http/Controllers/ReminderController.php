<?php

namespace App\Http\Controllers;

use App\Models\Reminder;
use App\Models\ReminderGroup;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class ReminderController extends Controller
{
    use AuthorizesRequests;

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Inertia::render('Reminders/Index', [
            'boards' => auth()->user()->boards()->with('reminders', 'reminders.groups')->get(),
            'groups' => ReminderGroup::select('id', 'name')->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return Inertia::render('Reminders/Create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'notes' => 'nullable|string',
            'completed_at' => 'nullable|date'
        ]);

        auth()->user()->reminders()->create($validated);

        return redirect()->route('reminders.index')
            ->with('success', 'Reminder created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Reminder $reminder)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Reminder $reminder)
    {
        $this->authorize('update', $reminder);

        return Inertia::render('Reminders/Edit', [
            'reminder' => $reminder
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Reminder $reminder)
    {
        $this->authorize('update', $reminder);

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'notes' => 'nullable|string',
            'completed_at' => 'nullable|date'
        ]);

        $reminder->update($validated);

        return redirect()->back()->with('success', 'Reminder updated successfully.');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Reminder $reminder)
    {
        $this->authorize('delete', $reminder);

        $reminder->delete();

        return redirect()->route('reminders.index')
            ->with('success', 'Reminder deleted successfully.');
    }

    public function addToGroup(Request $request, Reminder $reminder)
    {
        $reminder->groups()->attach($request->group_id);
        return redirect()->back()->with('success', 'Reminder added to group successfully.');
    }
}
