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
                                    <h3 class="card-title">Parent Son ({{ $getParent->name }} {{ $getParent->last_name }})
                                    </h3>
                                </div>
                            </div>
                            <form method="get" action="">
                                <div class="card-header">
                                    <div class="row">
                                        <div class="form-group col-md-2">
                                            <input type="text" class="form-control" id="exampleInputName"
                                                placeholder="Search by Student Id" name="id"
                                                value="{{ Request::get('id') }}">
                                        </div>
                                        <div class="form-group col-md-2">
                                            <input type="text" class="form-control" id="exampleInputName"
                                                placeholder="Search by Student Name" name="name"
                                                value="{{ Request::get('name') }}">
                                        </div>
                                        <div class="form-group col-md-2">
                                            <input type="email" class="form-control" id="exampleInputName"
                                                placeholder="Search by Student email" name="email"
                                                value="{{ Request::get('email') }}">
                                        </div>
                                        <div class="form-group
                                                col-md-3">
                                            <button type="submit" class="btn btn-primary btn-sm">Search</button>
                                            <a href="{{ url('admin/parent/my_son/' . $parent_id) }}"
                                                class="btn btn-warning btn-sm">Reset</a>
                                        </div>
                                    </div>
                                </div>
                            </form>

                            <!-- /.card-header -->
                            @if (!@empty($getSearchStudent))
                                <div class="card-body" style="overflow: auto">
                                    <table class="table table-bordered table-striped">
                                        <thead>
                                            <tr style="text-align: center">
                                                <th>Sl</th>
                                                <th>Profile Image</th>
                                                <th>First Name</th>
                                                <th>Last Name</th>
                                                <th>Email</th>
                                                <th>Admission Number</th>
                                                <th>Roll Number</th>
                                                <th>Class</th>
                                                <th>Gender</th>
                                                <th>Date of Birth</th>
                                                <th>Religion</th>
                                                <th>Mobile No</th>
                                                <th>Admission Date</th>
                                                <th>Blood Group</th>
                                                <th>Height</th>
                                                <th>Weight</th>
                                                <th>Created By</th>
                                                <th>status</th>
                                                <th>Created At</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($getSearchStudent as $data)
                                                <tr style="text-align: center">
                                                    <td> {{ $loop->index + 1 }}</td>
                                                    <td>
                                                        <img src="{{ asset('/Profile/' . $data->image) }}" height=60px
                                                            width=60px style="border-radius: 50%" />
                                                    </td>
                                                    <td> {{ $data->name }}</td>
                                                    <td> {{ $data->last_name }}</td>
                                                    <td> {{ $data->email }}</td>
                                                    <td> {{ $data->admission_number }}</td>
                                                    <td> {{ $data->roll_no }}</td>
                                                    <td> {{ $data->class_name }}</td>
                                                    <td> {{ $data->gender }}</td>
                                                    <td> {{ $data->date_of_birth }}</td>
                                                    <td> {{ $data->religion }}</td>
                                                    <td> {{ $data->mobile_number }}</td>
                                                    <td> {{ $data->admission_date }}</td>
                                                    <td> {{ $data->blood_group }}</td>
                                                    <td> {{ $data->height }}</td>
                                                    <td> {{ $data->weight }}</td>
                                                    <td> {{ $data->created_by }}</td>
                                                    <td>
                                                        @if ($data->status == 0)
                                                            <span class="">Active</span>
                                                        @else
                                                            <span class="">Inactive</span>
                                                        @endif
                                                    </td>
                                                    <td> {{ date('m-d-y', strtotime($data->created_at)) }}</td>
                                                    <td style="min-width:165px">
                                                        <a href="{{ url('admin/parent/assign_son_to_parent/' . $data->id . '/' . $parent_id) }}"
                                                            class="btn btn-info btn-sm">Assign Son to Parent</a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            @endif
                            <!-- /.card-body -->
                        </div>
                        <div class="card">
                            <div class="card-body" style="overflow: auto">
                                <table class="table table-bordered table-striped">
                                    <thead>
                                        <tr style="text-align: center">
                                            <th>Sl</th>
                                            <th>Profile Image</th>
                                            <th>First Name</th>
                                            <th>Last Name</th>
                                            <th>Parent Name</th>
                                            <th>Email</th>
                                            <th>Admission Number</th>
                                            <th>Roll Number</th>
                                            <th>Class</th>
                                            <th>Gender</th>
                                            <th>Date of Birth</th>
                                            <th>Religion</th>
                                            <th>Mobile No</th>
                                            <th>Admission Date</th>
                                            <th>Blood Group</th>
                                            <th>Height</th>
                                            <th>Weight</th>
                                            <th>Created By</th>
                                            <th>status</th>
                                            <th>Created At</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($getMySon as $data)
                                            <tr style="text-align: center">
                                                <td> {{ $loop->index + 1 }}</td>
                                                <td>
                                                    <img src="{{ asset('/Profile/' . $data->image) }}" height=60px
                                                        width=60px style="border-radius: 50%" />
                                                </td>
                                                <td> {{ $data->name }}</td>
                                                <td> {{ $data->last_name }}</td>
                                                <td> {{ $data->parent_name }}</td>
                                                <td> {{ $data->email }}</td>
                                                <td> {{ $data->admission_number }}</td>
                                                <td> {{ $data->roll_no }}</td>
                                                <td> {{ $data->class_name }}</td>
                                                <td> {{ $data->gender }}</td>
                                                <td> {{ $data->date_of_birth }}</td>
                                                <td> {{ $data->religion }}</td>
                                                <td> {{ $data->mobile_number }}</td>
                                                <td> {{ $data->admission_date }}</td>
                                                <td> {{ $data->blood_group }}</td>
                                                <td> {{ $data->height }}</td>
                                                <td> {{ $data->weight }}</td>
                                                <td> {{ $data->created_by }}</td>
                                                <td>
                                                    @if ($data->status == 0)
                                                        <span class="">Active</span>
                                                    @else
                                                        <span class="">Inactive</span>
                                                    @endif
                                                </td>
                                                <td> {{ date('m-d-y', strtotime($data->created_at)) }}</td>
                                                <td style="min-width:100px">
                                                    <a href="{{ url('admin/parent/assign_son_parent_delete/' . $data->id) }}"
                                                        class="btn btn-danger btn-sm">Delete</a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
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
