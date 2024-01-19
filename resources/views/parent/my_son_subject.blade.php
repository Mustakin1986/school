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
                                    <h3 class="card-title">My Son Subject:-<span style="color: blue">({{ $getUser->name }}
                                            {{ $getUser->last_name }})</span></h3>
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
                                            <th>Class Name</th>
                                            <th>Created by</th>
                                            <th>Status</th>
                                            <th>Create Date</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($MySonSubject as $data)
                                            <tr>
                                                <td> {{ $data->id }}</td>
                                                <td> {{ $data->subject_name }}</td>
                                                <td> {{ $data->subject_type }}</td>
                                                <td> {{ $data->class_name }}</td>
                                                <td> {{ $data->created_by }}</td>
                                                <td>
                                                    @if ($data->status == 0)
                                                        <span class="">Active</span>
                                                    @else
                                                        <span class="">Inactive</span>
                                                    @endif
                                                </td>
                                                <td> {{ $data->created_at }}</td>
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
