<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Poll;

class PollController extends Controller
{
    public function index()
    {
        $polls = Poll::all();
        return view('polls.index', compact('polls'));
    }

    public function create()
    {
        return view('polls.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required',
            'description' => 'required',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after:start_date',
        ]);

        $poll = Poll::create([
            'title' => $validatedData['title'],
            'description' => $validatedData['description'],
            'start_date' => $validatedData['start_date'],
            'end_date' => $validatedData['end_date'],
            'is_active' => true,
            'admin_id' => auth()->id(),
        ]);

        return redirect()->route('polls.show', $poll->id)
            ->with('success', 'Poll created successfully!');
    }

    public function show($id)
    {
        $poll = Poll::findOrFail($id);
        return view('polls.show', compact('poll'));
    }

    public function edit($id)
    {
        $poll = Poll::findOrFail($id);
        return view('polls.edit', compact('poll'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'title' => 'required',
            'description' => 'required',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after:start_date',
        ]);

        $poll = Poll::findOrFail($id);
        $poll->update($validatedData);

        return redirect()->route('polls.show', $poll->id)
            ->with('success', 'Poll updated successfully!');
    }

    public function destroy($id)
    {
        $poll = Poll::findOrFail($id);
        $poll->delete();

        return redirect()->route('polls.index')
            ->with('success', 'Poll deleted successfully!');
    }
}
