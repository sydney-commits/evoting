@extends('layouts.admin_layout')

@section('content')
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            background-color: #f8f8f8;
        }

        .table {
            background-color: #fff;
            border-radius: 0.25rem;
            box-shadow: 0px 2px 6px rgba(0, 0, 0, 0.1);
        }

        .table thead th {
            background-color: #343a40;
            color: #fff;
            border-color: #343a40;
            font-weight: bold;
        }

        .table tbody td {
            border-color: #dee2e6;
        }

        .table-hover tbody tr:hover {
            background-color: #f2f2f2;
        }

        .fa-edit,
        .fa-trash-alt {
            cursor: pointer;
        }

        .center {
            display: flex;
            justify-content: center;
            align-items: center;

        }

        .text-center {
            display: flex;
            justify-content: center;
            align-items: center;
            font-weight: 600;
        }

        .custom-btn {
            padding: 10px 20px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 4px;
            font-size: 16px;
            cursor: pointer;
        }

        .custom-btn:hover {
            background-color: #0056b3;
        }

        .label-center {
            display: flex;
            align-items: center;
            justify-content: center;
            padding-top: 10px;
            font-weight: 300
        }
    </style>

    <div class="row mt-4">
        <div class="col-md-12 mb-4">
            <div class="card">
                <div class="text-center">
                    Poll Positions
                </div>

                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>UID</th>
                            <th>Name</th>
                            <th>Description</th>


                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($positions as $x)
                            <tr>

                                <td>{{ $x->id }}</td>
                                <td>{{ $x->title }}</td>
                                <td>{{ $x->description }}</td>



                                <td>
                                    <i class="fas fa-edit text-primary mr-2"></i>
                                    <i class="fas fa-trash-alt text-danger"></i>
                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>

        </div>



        <div class="text-center">



            <button type="button" class="btn btn-secondary" data-toggle="modal" data-target=".bd-example-modal-lg">

                <i class="fas fa-cogs mr-2"></i> Create New Position


            </button>

        </div>


        {{-- Modal For Modifying users Info --}}
        <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-sm">
                <div class="modal-content">

                    <div class="text-center">
                        Create New Positions
                    </div>
                  
                    <form method="POST" action="{{ route('positions.store' , $poll->id) }}">
                        @csrf

                        <div class="form-row p-2">
                            <div class="form-group col-md-12">
                                <label for="inputEmail4" class="label-center">Name</label>
                                <input type="text" class="form-control" id="inputEmail4" placeholder="Name"
                                    name="title">



                            </div>

                            <div class="form-group col-md-12">
                                <label for="inputEmail4" class="label-center">Description</label>
                                <input type="text" class="form-control" id="inputEmail4" placeholder="Name"
                                    name="description">



                            </div>




                        </div>


                        <div class="text-center pb-3">
                            <button type="submit" class="btn btn-secondary">Submit</button>


                        </div>



                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
