@extends('Layouts.app')
@section('content')
    <div class="content-wrapper mt-2">
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header d-flex">
                                <div class="col-sm-6">
                                    <h3 class="card-title">Admin List (Total:{{ $allAdmin->total() }})</h3>
                                </div>
                                <div class="col-sm-6 ">
                                    <a href="{{ url('admin/add') }}" class="btn btn-primary btn-sm float-right">Add New
                                        Admin</a>
                                </div>
                            </div>
                            <form>
                                <div class="card-header">
                                    <div class="row">
                                        <div class="form-group col-md-3">
                                            <input type="text" class="form-control" id="exampleInputName"
                                                placeholder="Enter Name" name="name" value="{{ Request::get('name') }}">
                                        </div>
                                        <div class="form-group col-md-3">
                                            <input type="email" class="form-control" id="exampleInputName"
                                                placeholder="Enter Email" name="email"
                                                value="{{ Request::get('email') }}">
                                        </div>
                                        <div class="form-group
                                                col-md-3">
                                            <button type="submit" class="btn btn-primary btn-sm">Search</button>
                                            <a href="{{ url('admin/list') }}" class="btn btn-primary btn-sm">Clear</a>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>Sl</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Create Date</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($allAdmin as $data)
                                            <tr>
                                                <td> {{ $data->id }}</td>
                                                <td> {{ $data->name }}</td>
                                                <td> {{ $data->email }}</td>
                                                <td> {{ $data->created_at }}</td>
                                                <td>
                                                    <a href="{{ url('admin/edit/' . $data->id) }}"
                                                        class="btn btn-info btn-sm">Edit</a>
                                                    <a href="{{ url('admin/Delete/' . $data->id) }}"
                                                        class="btn btn-danger btn-sm">Delete</a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <div class="float-right">
                                    {!! $allAdmin->links() !!}
                                </div>

                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </section>
    </div>
@endsection
