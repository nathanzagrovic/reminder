<?php

namespace App\Http\Controllers;

use App\Models\Board;
use Illuminate\Http\Request;

class BoardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Board $board)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Board $board)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Board $board)
    {
        $request->validate([
            'reminders' => 'required|array',
            'reminders.*.id' => 'required|exists:reminders,id',
            'reminders.*.sort' => 'required|integer|min:0',
        ]);

        foreach ($request->reminders as $reminderData) {
            $reminder = $board->reminders()->find($reminderData['id']);
            if ($reminder) {
                $reminder->update(['sort' => $reminderData['sort']]);
            }
        }

        return redirect()->back()->with('success', 'Board updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Board $board)
    {
        //
    }
}
