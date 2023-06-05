@extends('layouts.admin_layout')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div class="card">
                    <div class="card-header">Polls</div>

                    <div class="card-body">
                        <a href="{{ route('polls.create') }}" class="btn btn-primary mb-3">Create Poll</a>

                        @if (count($polls) > 0)
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Title</th>
                                        <th>Description</th>
                                        <th>Start Date</th>
                                        <th>End Date</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($polls as $poll)
                                        <tr>
                                            <td>{{ $poll->title }}</td>
                                            <td>{{ $poll->description }}</td>
                                            <td>{{ $poll->start_date }}</td>
                                            <td>{{ $poll->end_date }}</td>
                                            <td>
                                                <a href="{{ route('polls.show', $poll->id) }}" class="btn btn-primary btn-sm">View</a>
                                                <a href="{{ route('polls.edit', $poll->id) }}" class="btn btn-secondary btn-sm">Edit</a>

                                                <a href="{{ route('positions.index', $poll->id) }}" class="btn btn-secondary btn-sm">Positions</a>



                                                <form action="{{ route('polls.destroy', $poll->id) }}" method="POST" class="d-inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this poll?')">Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        @else
                            <p>No polls available.</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
