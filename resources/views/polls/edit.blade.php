@extends('layouts.admin_layout')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div class="card">
                    <div class="card-header">Edit Poll</div>

                    <div class="card-body">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form action="{{ route('polls.update', $poll->id) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="form-group">
                                <label for="title">Title</label>
                                <input type="text" name="title" id="title" class="form-control" value="{{ $poll->title }}" required>
                            </div>

                            <div class="form-group">
                                <label for="description">Description</label>
                                <textarea name="description" id="description" class="form-control" required>{{ $poll->description }}</textarea>
                            </div>

                            <div class="form-group">
                                <label for="start_date">Start Date</label>
                                <input type="datetime-local" name="start_date" id="start_date" class="form-control" value="{{ $poll->start_date }}" required>
                            </div>

                            <div class="form-group">
                                <label for="end_date">End Date</label>
                                <input type="datetime-local" name="end_date" id="end_date" class="form-control" value="{{ $poll->end_date }}" required>
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Update Poll</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
