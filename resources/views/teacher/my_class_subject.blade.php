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
                                    <h3 class="card-title">Class Wise Teacher List</h3>
                                </div>
                            </div>

                            <!-- /.card-header -->
                            <div class="card-body">
                                <table class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>Sl</th>
                                            <th>CLass Name</th>
                                            <th>My Subject</th>
                                            <th>Subject Type </th>
                                            <th>Status</th>
                                            <th>Create Date</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($getRecord as $data)
                                            <tr>
                                                <td> {{ $data->id }}</td>
                                                <td> {{ $data->class_name }}</td>
                                                <td> {{ $data->subject_name }}</td>
                                                <td> {{ $data->class_type }}</td>
                                                <td> {{ $data->created_by }}</td>
                                                <td>
                                                    @if ($data->status == 0)
                                                        <span class="">Active</span>
                                                    @else
                                                        <span class="">Inactive</span>
                                                    @endif
                                                </td>
                                                <td> {{ $data->created_at }}</td>
                                                <td>
                                                    <a href="{{ url('admin/assign_subject/edit/' . $data->id) }}"
                                                        class="btn btn-info btn-sm">Edit</a>
                                                    <a href="{{ url('admin/assign_subject/Delete/' . $data->id) }}"
                                                        class="btn btn-danger btn-sm">Delete</a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <div class="float-right">

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
