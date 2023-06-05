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
        <div class="col-md-6 mb-4">
            <div class="card">
                <div class="text-center">
                    Super Admins
                </div>

                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>UID</th>
                            <th>Name</th>

                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($super_admins as $x)
                            <tr>

                                <td>{{ $x->id }}</td>
                                <td>{{ $x->name }}</td>


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

        <div class="col-md-6 mb-4">
            <div class="card">

                <div class="text-center">
                     Admins
                </div>

                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>UID</th>
                            <th>Name</th>

                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($admins as $x)
                            <tr>

                                <td>{{ $x->id }}</td>
                                <td>{{ $x->name }}</td>


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

                    <i class="fas fa-cogs mr-2"></i> Manage Roles


                </button>

        </div>


        {{-- Modal For Modifying users Info --}}
        <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-sm">
                <div class="modal-content">

                    <div class="text-center">
                        Manage User Roles
                    </div>
                    <form method="POST" action="{{ route('roles.update') }}">
                        @csrf

                        <div class="form-row p-2">
                            {{-- <div class="form-group col-md-12">
                                <label for="inputEmail4" class="label-center">Name</label>
                                <input type="text" class="form-control" id="inputEmail4" placeholder="Name">



                            </div> --}}

                            <div class="form-group col-md-12">
                                <label for="inputState" class="label-center">User Name</label>
                                <select id="inputState" name="user_id" class="form-control">

                                    @foreach ($users as $user )
                                    <option value="{{$user->id}}">{{$user->name}} - <b>{{$user->role}}</b></option>
                                    @endforeach


                                </select>
                            </div>

                            <div class="form-group col-md-12">
                                <label for="inputState" class="label-center">Assign New Role</label>
                                <select id="inputState" class="form-control" name="role_assigned">

                                    @foreach ($roles as $x )
                                    <option value="{{$x}}">{{$x}}</option>
                                    @endforeach


                                </select>
                            </div>

                        </div>
                        {{-- <div style="display: flex; justify-content: center;">
                            <button class="btn">Center Aligned Button</button>
                          </div> --}}

                          <div class="text-center pb-3">
                        <button type="submit" class="btn btn-secondary">Submit</button>


                          </div>



                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection


