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
                                    <h3 class="card-title">My Son
                                    </h3>
                                </div>
                            </div>
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
                                            <th>Action</th </tr>
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
                                                <td>
                                                    <a href="{{ url('parent/my_son/subject/' . $data->id) }}"
                                                        class="btn btn-primary sm-btn">Subject</a>
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
