@extends('layouts.admin_layout')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div class="card">
                    <div class="card-header">{{ $poll->title }}</div>

                    <div class="card-body">
                        <p><strong>Description:</strong> {{ $poll->description }}</p>
                        <p><strong>Start Date:</strong> {{ $poll->start_date }}</p>
                        <p><strong>End Date:</strong> {{ $poll->end_date }}</p>

                        <a href="{{ route('polls.edit', $poll->id) }}" class="btn btn-primary">Edit Poll</a>

                        <form action="{{ route('polls.destroy', $poll->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this poll?')">Delete Poll</button>
                        </form>

                        
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
