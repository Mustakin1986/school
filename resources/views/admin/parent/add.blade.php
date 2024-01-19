@extends('Layouts.app')
@section('content')
    <div class="content-wrapper mt-2">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Add New Parent</h1>
                    </div>
                    {{-- <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">General Form</li>
                        </ol>
                    </div> --}}
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content mt-1">
            <div class="container-fluid">
                <div class="row">
                    <!-- left column -->
                    <div class="col-md-12">
                        <!-- general form elements -->
                        <div class="card card-primary">
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form method="post" action="{{ url('admin/parent/add') }}" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <div class="card-body">
                                    <div class="row">
                                        <div class="form-group col-md-3">
                                            <label for="exampleInputName">Frist Name</label>
                                            <input type="text" class="form-control" id="exampleInputName"
                                                placeholder="Enter Name" name="name" value="{{ old('name') }}">
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label for="exampleInputName">Last Name</label>
                                            <input type="text" class="form-control" id="exampleInputName"
                                                placeholder="Enter Name" name="last_name" value="{{ old('last_name') }}">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Gender</label>
                                            <select class="form-control" name="gender">
                                                <option value="">--Selecr Gender--</option>
                                                <option value="male">Male</option>
                                                <option value="female">Female</option>
                                                <option value="others">Others</option>
                                            </select>
                                        </div>
                                        <div class="form-group col-md-2">
                                            <label for="exampleInputEmail1">Mobile Number</label>
                                            <input type="tel" class="form-control" id="exampleInputEmail1"
                                                placeholder="Enter email" name="mobile_number"
                                                value="{{ old('mobile_number') }}">
                                        </div>
                                        <div class="form-group col-md-2">
                                            <label for="exampleInputEmail1">Occupation</label>
                                            <input type="text" class="form-control" id="exampleInputEmail1"
                                                placeholder="Enter email" name="occupation" value="{{ old('occupation') }}">
                                        </div>
                                        <div class="form-group col-md-2">
                                            <label for="exampleInputEmail1">Profile Picture</label>
                                            <input type="file" class="form-control" id="exampleInputEmail1"
                                                placeholder="Enter email" name="image" value="{{ old('image') }}">
                                        </div>
                                        <div class="form-group col-md-10">
                                            <label for="exampleInputEmail1">Address</label>
                                            <textarea type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter email" name="address"
                                                value="{{ old('Address') }}"></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Status</label>
                                            <select class="form-control" name="status">
                                                <option value="0">Active</option>
                                                <option value="1">inactive</option>
                                            </select>
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label for="exampleInputEmail1">Email address</label>
                                            <input type="email" class="form-control" id="exampleInputEmail1"
                                                placeholder="Enter email" name="email" value="{{ old('email') }}">
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label for="exampleInputPassword1">Password</label>
                                            <input type="password" class="form-control" id="exampleInputPassword1"
                                                placeholder="Password" name="password">
                                        </div>
                                    </div>
                                </div>
                                <!-- /.card-body -->

                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
        <!-- /.content-wrapper -->
    </div>
@endsection
