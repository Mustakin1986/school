@extends('Layouts.app')
@section('content')
    <div class="content-wrapper mt-2">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>My Account</h1>
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
                            <form method="post" action="{{ url('student/my_account') }}" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <div class="card-body">
                                    <div class="row">
                                        <div class="form-group col-md-3">
                                            <label for="exampleInputName">Frist Name</label>
                                            <input type="text" class="form-control" id="exampleInputName"
                                                placeholder="Enter Name" name="name"
                                                value="{{ old('name', $getRecode->name) }}">
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label for="exampleInputName">Last Name</label>
                                            <input type="text" class="form-control" id="exampleInputName"
                                                placeholder="Enter Name" name="last_name"
                                                value="{{ old('last_name', $getRecode->last_name) }}">
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label for="exampleInputEmail1"> Admission Number</label>
                                            <input type="text" class="form-control" id="exampleInputEmail1"
                                                placeholder="Enter email" name="admission_number"
                                                value="{{ old('admission_number', $getRecode->admission_number) }}">
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label for="exampleInputEmail1">Roll No</label>
                                            <input type="text" class="form-control" id="exampleInputEmail1"
                                                placeholder="Enter email" name="roll_no"
                                                value="{{ old('roll_no', $getRecode->roll_no) }}">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Class</label>
                                            <select class="form-control" name="class_id">
                                                <option value="" disabled selected>--Select Class--</option>
                                                @foreach ($getClass as $row)
                                                    <option
                                                        {{ old('class_id', $getRecode->class_id) == $row->id ? 'selected' : '' }}
                                                        value="{{ $row->id }}">
                                                        {{ $row->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group col-md-2">
                                            <label for="exampleInputEmail1">Gender</label>
                                            <select class="form-control" name="gender">
                                                <option value="">--Select Gender--</option>
                                                <option {{ old('gender', $getRecode->gender) == 'male' ? 'selected' : '' }}
                                                    value="male">Male</option>
                                                <option
                                                    {{ old('gender', $getRecode->gender) == 'female' ? 'selected' : '' }}
                                                    value="female">female</option>
                                                <!-- Add other gender options as needed -->
                                            </select>
                                        </div>
                                        <div class="form-group col-md-2">
                                            <label for="exampleInputEmail1">Date of Birth</label>
                                            <input type="date" class="form-control" id="exampleInputEmail1"
                                                placeholder="Enter email" name="date_of_birth"
                                                value="{{ old('date_of_birth', $getRecode->date_of_birth) }}">
                                        </div>
                                        <div class="form-group col-md-2">
                                            <label for="exampleInputEmail1">Religion</label>
                                            <input type="text" class="form-control" id="exampleInputEmail1"
                                                placeholder="Enter email"
                                                name="religion"value="{{ old('religion', $getRecode->religion) }}">
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label for="exampleInputEmail1">Mobile Number</label>
                                            <input type="tel" class="form-control" id="exampleInputEmail1"
                                                placeholder="Enter email" name="mobile_number"
                                                value="{{ old('mobile_number', $getRecode->mobile_number) }}">
                                        </div>
                                        <div class="form-group col-md-2">
                                            <label for="exampleInputEmail1">Date of Birth</label>
                                            <input type="date" class="form-control" id="exampleInputEmail1"
                                                placeholder="Enter email" name="date_of_birth"
                                                value="{{ old('date_of_birth', $getRecode->date_of_birth) }}">
                                        </div>
                                        <div class="form-group col-md-2">
                                            <label for="exampleInputEmail1">Admission Date</label>
                                            <input type="Date" class="form-control" id="exampleInputEmail1"
                                                placeholder="Enter email" name="admission_date"
                                                value="{{ old('admission_date', $getRecode->admission_date) }}">
                                        </div>
                                        <div class="form-group col-md-2">
                                            <label for="exampleInputEmail1">Blood Group</label>
                                            <input type="text" class="form-control" id="exampleInputEmail1"
                                                placeholder="Enter email" name="blood_group"
                                                value="{{ old('blood_group', $getRecode->blood_group) }}">
                                        </div>

                                        <div class="form-group
                                                col-md-2">
                                            <label for="exampleInputEmail1">Height</label>
                                            <input type="text" class="form-control" id="exampleInputEmail1"
                                                placeholder="Enter email" name="height"
                                                value=" {{ old('height', $getRecode->height) }}">
                                        </div>
                                        <div class="form-group col-md-2">
                                            <label for="exampleInputEmail1">Weight</label>
                                            <input type="text" class="form-control" id="exampleInputEmail1"
                                                placeholder="Enter email" name="weight"
                                                value="{{ old('weight', $getRecode->weight) }}">
                                        </div>
                                        <div class="form-group col-md-2">
                                            <label for="exampleInputEmail1">Status</label>
                                            <select class="form-control" name="status">
                                                <option value="0"
                                                    {{ old('status', $getRecode->status) == 0 ? 'selected' : '' }}>Active
                                                </option>
                                                <option value="1"
                                                    {{ old('status', $getRecode->status) == 1 ? 'selected' : '' }}>Inactive
                                                </option>
                                            </select>
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label for="exampleInputEmail1">Email address</label>
                                            <input type="email" class="form-control" id="exampleInputEmail1"
                                                placeholder="Enter email" name="email"
                                                value="{{ old('email', $getRecode->email) }}">
                                        </div>
                                        <div class="form-group col-md-2">
                                            <label for="exampleInputEmail1">Profile Picture</label>
                                            <input type="file" class="form-control" id="exampleInputEmail1"
                                                placeholder="Enter email" name="image" value="{{ old('image') }}">
                                            @if (!empty($getRecode->getImage()))
                                                <img src="{{ $getRecode->getImage() }}" alt=""
                                                    style="width: 100px" />
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <!-- /.card-body -->

                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Save</button>
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
