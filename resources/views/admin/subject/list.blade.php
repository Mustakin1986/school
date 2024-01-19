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
                                    <h3 class="card-title">Clase List</h3>
                                </div>
                                <div class="col-sm-6 ">
                                    <a href="{{ url('admin/subject/add') }}" class="btn btn-primary btn-sm float-right">Add
                                        New
                                        Subject</a>
                                </div>
                            </div>

                            <!-- /.card-header -->
                            <div class="card-body">
                                <table class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>Sl</th>
                                            <th>Subject Name</th>
                                            <th>Subject Type</th>
                                            <th>Created by</th>
                                            <th>Status</th>
                                            <th>Create Date</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($allSubject as $data)
                                            <tr>
                                                <td> {{ $data->id }}</td>
                                                <td> {{ $data->name }}</td>
                                                <td> {{ $data->type }}</td>
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
                                                    <a href="{{ url('admin/subject/edit/' . $data->id) }}"
                                                        class="btn btn-info btn-sm">Edit</a>
                                                    <a href="{{ url('admin/subject/Delete/' . $data->id) }}"
                                                        class="btn btn-danger btn-sm">Delete</a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>Sl</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Create Date</th>
                                        </tr>
                                    </tfoot>
                                </table>
                                <div class="float-right">
                                    {{-- {!! $allClass->links() !!} --}}
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
