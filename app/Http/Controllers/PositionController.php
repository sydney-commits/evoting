<?php

namespace App\Http\Controllers;

use App\Models\Position;
use Illuminate\Http\Request;
use App\Models\Poll;

class PositionController extends Controller
{

    public function index($id)
    {


        $poll = Poll::findOrFail($id);
        $positions = Position::where('poll_id',$poll->id)->get();
        // dd($poll);

        return view('positions.index', compact('positions','poll'));
    }


    public function store(Request $request , $id)
    {
        $position = new Position();
        $poll = Poll::findOrFail($id);


        $position->title = $request->input('title');
        $position->description = $request->input('description');
        $position->poll_id = $id;

        // dd($position);

        $position->save();
        return redirect()->back();

    }

    /**
     * Display the specified resource.
     */
    public function show(Position $position)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Position $position)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Position $position)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Position $position)
    {
        //
    }
}
