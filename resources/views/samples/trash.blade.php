@extends('layouts.admin_layout')

@section('content')

<div class="row mt-4">
    <div class="col-md-6 mb-4">
      <div class="card">
        <img src="https://images.unsplash.com/photo-1499750310107-5fef28a66643?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8OXx8YWRtaW58ZW58MHx8MHx8fDA%3D&auto=format&fit=crop&w=500&q=60" alt="Image 1" class="card-img-top">
        <div class="card-body">
          <h5 class="card-title">Card 1</h5>
          <p class="card-text">Some example text for the card.</p>
          <a href="#" class="btn btn-custom"><i class="fas fa-eye"></i> Read More</a>
        </div>
      </div>
    </div>
    <div class="col-md-6 mb-4">
      <div class="card">
        <img src="https://images.unsplash.com/photo-1519389950473-47ba0277781c?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8Nnx8YWRtaW58ZW58MHx8MHx8fDA%3D&auto=format&fit=crop&w=500&q=60" alt="Image 2" class="card-img-top">
        <div class="card-body">
          <h5 class="card-title">Card 2</h5>
          <p class="card-text">Another example text for the card.</p>
          <a href="#" class="btn btn-custom"><i class="fas fa-eye"></i> Read More</a>
        </div>
      </div>
    </div>
  </div>

@endsection
