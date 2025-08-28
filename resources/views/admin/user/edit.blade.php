@extends('admin.layouts.master')
@section('title', 'Edit User')

@section('content')

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 mt-2">
                    <div class="card card-primary card-outline">
                        <div class="card-header">
                            <h3 class="card-title mt-1">{{ __('Add New User') }}</h3>
                            <div class="card-tools">
                                <a href="{{ route('admin.user.index') }}" class="btn btn-primary btn-sm">
                                    <i class="fas fa-angle-double-left"></i> {{ __('Back') }}
                                </a>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="row justify-content-center">
                                <div class="col-lg-12">
                                    <form class="" action="{{ route('admin.user.update', $user->id) }}" method="POST"
                                        enctype="multipart/form-data">
                                        @csrf

                                        <div class="row">
                                            
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label for="name">Name <span class="text-danger">*</span></label>
                                                    <input type="text" class="form-control" name="name" id="name"
                                                        placeholder="Enter Name" value="{{ old('name', $user->name) }}" required>
                                                    @if ($errors->has('name'))
                                                        <p class="text-danger"> {{ $errors->first('name') }} </p>
                                                    @endif
                                                </div>
                                            </div>

                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label for="email">Email <span class="text-danger">*</span></label>
                                                    <input type="text" class="form-control" name="email" name="email"
                                                        placeholder="Enter Email" value="{{ old('email', $user->email) }}" required>
                                                    @if ($errors->has('email'))
                                                        <p class="text-danger"> {{ $errors->first('email') }} </p>
                                                    @endif
                                                </div>
                                            </div>

                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label for="phone_no">Phone No</label>
                                                    <input type="text" class="form-control" name="phone_no" id="phone_no"
                                                        placeholder="Enter Phone No" value="{{ old('phone_no', $user->phone_no) }}">
                                                    @if ($errors->has('phone_no'))
                                                        <p class="text-danger"> {{ $errors->first('phone_no') }} </p>
                                                    @endif
                                                </div>
                                            </div>

                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label for="whatsapp_no">WhatsApp No</label>
                                                    <input type="text" class="form-control" name="whatsapp_no"
                                                        placeholder="Enter WhatsApp No" value="{{ old('whatsapp_no', $user->whatsapp_no) }}">
                                                    @if ($errors->has('whatsapp_no'))
                                                        <p class="text-danger"> {{ $errors->first('whatsapp_no') }} </p>
                                                    @endif
                                                </div>
                                            </div>

                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label for="user_type">User Type<span
                                                            class="text-danger">*</span></label>
                                                    <select class="form-control" name="user_type" required>
                                                        <option value="-1" disabled selected>{{ __('Select User Type') }}
                                                        </option>
                                                        <option {{ $user->user_type == 'admin' ? 'selected' : '' }} value="admin">{{ __('Admin') }}
                                                        </option>
                                                        <option {{ $user->user_type == 'user' ? 'selected' : '' }} value="user">{{ __('User') }}
                                                        </option>
                                                    </select>
                                                    @if ($errors->has('user_type'))
                                                        <p class="text-danger"> {{ $errors->first('user_type') }} </p>
                                                    @endif
                                                </div>
                                            </div>

                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label for="address">Address </label>
                                                    <input type="text" class="form-control" id="address"
                                                        name="address" placeholder="Enter Address"
                                                        value="{{ old('address', $user->address) }}">
                                                    @if ($errors->has('address'))
                                                        <p class="text-danger"> {{ $errors->first('address') }} </p>
                                                    @endif
                                                </div>
                                            </div>

                                            <div class="col-lg-12">
                                                <label for="icon">{{ __('Upload Image') }}</label>
                                                <div class="form-group">

                                                    <div class="col-sm-12">
                                                        <label class="custom-file-label"
                                                            for="icon">{{ __('Choose New Image') }}</label>

                                                        <input type="file"
                                                            class="custom-file-input up-img form-control" name="icon"
                                                            id="icon">

                                                        <img class="mw-400 mb-3 show-img img-demo mt-2"
                                                            src="{{ asset('admin/user/profile/'. $user->icon) }}"
                                                            alt="">

                                                        @if ($errors->has('icon'))
                                                            <p class="text-danger"> {{ $errors->first('icon') }} </p>
                                                        @endif

                                                    </div>
                                                </div>
                                            </div>

                                        </div>

                                        <div class="row">
                                            <div class="col">
                                                <div class="form-group row">
                                                    <div class="col-sm-12">
                                                        <button type="submit"
                                                            class="btn btn-sm btn-primary">{{ __('Update') }}</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </form>
                                </div>
                            </div>


                        </div>
                        <!-- /.card-body -->
                    </div>
                </div>
            </div>
        </div>
        <!-- /.row -->

    </section>
@endsection

