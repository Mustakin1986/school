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
                                    {{-- <h3 class="card-title">Clase List (Total:{{ $allParent->total() }})</h3> --}}
                                </div>
                                <div class="col-sm-6 ">
                                    <a href="{{ url('admin/teacher/add') }}" class="btn btn-primary btn-sm float-right">Add
                                        Teacher</a>
                                </div>
                            </div>
                            <form method="get" action="">
                                <div class="card-header">
                                    <div class="row">
                                        <div class="form-group col-md-2">
                                            <input type="text" class="form-control" id="exampleInputName"
                                                placeholder="Search by Teacher Id" name="id"
                                                value="{{ Request::get('id') }}">
                                        </div>
                                        <div class="form-group col-md-2">
                                            <input type="text" class="form-control" id="exampleInputName"
                                                placeholder="Search by Teacher Name" name="name"
                                                value="{{ Request::get('name') }}">
                                        </div>
                                        <div class="form-group col-md-2">
                                            <input type="email" class="form-control" id="exampleInputName"
                                                placeholder="Search by Teacher email" name="email"
                                                value="{{ Request::get('email') }}">
                                        </div>
                                        <div class="form-group
                                                col-md-3">
                                            <button type="submit" class="btn btn-primary btn-sm">Search</button>
                                            <a href="{{ url('admin/teacher/list') }}"
                                                class="btn btn-warning btn-sm">Reset</a>
                                        </div>
                                    </div>
                                </div>
                            </form>

                            <!-- /.card-header -->
                            <div class="card-body" style="overflow: auto">
                                <table class="table table-bordered table-striped">
                                    <thead>
                                        <tr style="text-align: center">
                                            <th>Sl</th>
                                            <th>Profile Image</th>
                                            <th>Teacher Name</th>
                                            <th>Email</th>
                                            <th>Gender</th>
                                            <th>Date of Birth</th>
                                            <th>Date of Joning</th>
                                            <th>Mobile No</th>
                                            <th>Marital Status</th>
                                            <th>Current Address</th>
                                            <th>Parmanent Address</th>
                                            <th>Qualification</th>
                                            <th>Work Experience</th>
                                            <th>Note</th>
                                            <th>status</th>
                                            <th>Created Date</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($getTeacher as $data)
                                            <tr style="text-align: center">
                                                <td> {{ $loop->index + 1 }}</td>
                                                <td>
                                                    <img src="{{ asset('/Profile/' . $data->image) }}" height=60px
                                                        width=60px style="border-radius: 50%" />
                                                </td>
                                                <td> {{ $data->name }}</td>
                                                <td> {{ $data->email }}</td>
                                                <td> {{ $data->gender }}</td>
                                                <td> {{ $data->date_of_birth }}</td>
                                                <td> {{ $data->date_of_joining }}</td>
                                                <td> {{ $data->mobile_number }}</td>
                                                <td> {{ $data->marital_status }}</td>
                                                <td> {{ $data->address }}</td>
                                                <td> {{ $data->permanent_address }}</td>
                                                <td> {{ $data->qualification }}</td>
                                                <td> {{ $data->Work_experience }}</td>
                                                <td> {{ $data->note }}</td>

                                                <td>
                                                    @if ($data->status == 0)
                                                        <span class="">Active</span>
                                                    @else
                                                        <span class="">Inactive</span>
                                                    @endif
                                                </td>
                                                <td> {{ date('m-d-y', strtotime($data->created_at)) }}</td>
                                                <td style="min-width:125px">
                                                    <a href="{{ url('admin/teacher/edit/' . $data->id) }}"
                                                        class="btn btn-info btn-sm">Edit</a>
                                                    <a href="{{ url('admin/teacher/Delete/' . $data->id) }}"
                                                        class="btn btn-danger btn-sm">Delete</a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <div class="float-right">
                                    {{-- {!! $allParent->links() !!} --}}
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
