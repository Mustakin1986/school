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
                            <form method="post" action="{{ url('teacher/my_account') }}" enctype="multipart/form-data">
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
                                            <label for="exampleInputName">Qualification</label>
                                            <input type="text" class="form-control" id="exampleInputName"
                                                placeholder="Enter Name" name="qualification"
                                                value="{{ old('qualification', $getRecode->qualification) }}">
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label for="exampleInputName">Work Experience</label>
                                            <input type="text" class="form-control" id="exampleInputName"
                                                placeholder="Enter Name" name="Work_experience"
                                                value="{{ old('Work_experience', $getRecode->Work_experience) }}">
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label for="exampleInputName">Marital Status</label>
                                            <input type="text" class="form-control" id="exampleInputName"
                                                placeholder="Enter Name" name="marital_status"
                                                value="{{ old('marital_status', $getRecode->marital_status) }}">
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
                                            <label for="exampleInputEmail1">Date of Joining</label>
                                            <input type="date" class="form-control" id="exampleInputEmail1"
                                                placeholder="Enter email" name="date_of_joining"
                                                value="{{ old('date_of_joining', $getRecode->date_of_joining) }}">
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
                                        <div class="form-group col-md-11">
                                            <label for="exampleInputEmail1"> Current Address</label>
                                            <textarea type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter  Current Address"
                                                name="address">
                                                {{ old('address', $getRecode->address) }}
                                            </textarea>
                                        </div>
                                        <div class="form-group col-md-11">
                                            <label for="exampleInputEmail1">Parmanent Address</label>
                                            <textarea type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter Parmanent Address"
                                                name="permanent_address">{{ $getRecode->permanent_address }}</textarea>
                                        </div>
                                        <div class="form-group col-md-11">
                                            <label for="exampleInputEmail1">Note</label>
                                            <textarea type="text" class="form-control" id="exampleInputEmail1" placeholder="Write Note" name="note">{{ $getRecode->note }}</textarea>
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
