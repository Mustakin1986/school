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
                                    <h3 class="card-title">Clase List (Total:{{ $allParent->total() }})</h3>
                                </div>
                                <div class="col-sm-6 ">
                                    <a href="{{ url('admin/parent/add') }}" class="btn btn-primary btn-sm float-right">Add
                                        Parent</a>
                                </div>
                            </div>

                            <!-- /.card-header -->
                            <div class="card-body" style="overflow: auto">
                                <table class="table table-bordered table-striped">
                                    <thead>
                                        <tr style="text-align: center">
                                            <th>Sl</th>
                                            <th>Profile Image</th>
                                            <th>First Name</th>
                                            <th>Last Name</th>
                                            <th>Email</th>
                                            <th>Gender</th>
                                            <th>Mobile No</th>
                                            <th>Occupation</th>
                                            <th>Address</th>
                                            <th>status</th>
                                            <th>Created Date</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($allParent as $data)
                                            <tr style="text-align: center">
                                                <td> {{ $loop->index + 1 }}</td>
                                                <td>
                                                    <img src="{{ asset('/Profile/' . $data->image) }}" height=60px
                                                        width=60px style="border-radius: 50%" />
                                                </td>
                                                <td> {{ $data->name }}</td>
                                                <td> {{ $data->last_name }}</td>
                                                <td> {{ $data->email }}</td>
                                                <td> {{ $data->gender }}</td>
                                                <td> {{ $data->mobile_number }}</td>
                                                <td> {{ $data->occupation }}</td>
                                                <td> {{ $data->address }}</td>

                                                <td>
                                                    @if ($data->status == 0)
                                                        <span class="">Active</span>
                                                    @else
                                                        <span class="">Inactive</span>
                                                    @endif
                                                </td>
                                                <td> {{ date('m-d-y', strtotime($data->created_at)) }}</td>
                                                <td style="min-width:125px">
                                                    <a href="{{ url('admin/parent/edit/' . $data->id) }}"
                                                        class="btn btn-info btn-sm">Edit</a>
                                                    <a href="{{ url('admin/parent/Delete/' . $data->id) }}"
                                                        class="btn btn-danger btn-sm">Delete</a>
                                                    <a href="{{ url('admin/parent/my_son/' . $data->id) }}"
                                                        class="btn btn-primary btn-sm">My Son</a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <div class="float-right">
                                    {!! $allParent->links() !!}
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
