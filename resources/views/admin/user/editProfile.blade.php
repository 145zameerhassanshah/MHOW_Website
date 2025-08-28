@extends('admin.layouts.master')
@section('title', 'Edit Profile')
@section('content')

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-4 mt-2">

                    <!-- Profile Image -->

                    <div class="card card-primary card-outline">
                        <div class="card-header">
                            <h3 class="card-title">{{ __('Change Password') }} </h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="card-body">
                            <form class="form-horizontal" action="{{ route('admin.password.update') }}" method="POST">
                                @csrf
                            
                                <label class="control-label">{{ __('Current Password') }} <span class="text-danger">*</span></label>
                                <input type="password" class="form-control" name="old_password" placeholder="{{ __('Your Current Password') }}">
                                @if ($errors->has('old_password'))
                                    <p class="text-danger"> {{ $errors->first('old_password') }} </p>
                                @endif
                            
                                <label class="control-label"> {{ __('New Password') }}<span class="text-danger">*</span></label>
                                <input type="password" class="form-control" name="password" placeholder="{{ __('New Password') }}">
                                @if ($errors->has('password'))
                                    <p class="text-danger"> {{ $errors->first('password') }} </p>
                                @endif
                            
                                <label class="control-label">{{ __('Confirm Password') }}<span class="text-danger">*</span></label>
                                <input type="password" class="form-control" name="password_confirmation" placeholder="{{ __('Confirm Password') }}">
                                @if ($errors->has('password_confirmation'))
                                    <p class="text-danger"> {{ $errors->first('password_confirmation') }} </p>
                                @endif
                            
                                <button type="submit" class="btn btn-primary mt-2 form-control">{{ __('Update') }}</button>
                            </form>
                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
                <div class="col-md-8 mt-2">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card card-primary card-outline">
                                <div class="card-header">
                                    <h3 class="card-title">{{ __('Update Admin Profile') }} </h3>
                                </div>
                                <!-- /.box-header -->
                                <div class="card-body">
                                    <form class="form-horizontal" action="{{ route('admin.profile.update') }}"
                                        method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-group row">
                                            <label for="image" class="col-sm-2 control-label">{{ __('Image') }}
                                            </label>
                                            <div class="col-sm-10">
                                                @if ($user->icon)
                                                    <img class="w-100 mb-3 img-demo show-img"
                                                        src="{{ asset('admin/user/profile/' . $user->icon) }}"
                                                        alt="">
                                                @endif
                                                <div class="custom-file">
                                                    <label class="custom-file-label"
                                                        for="image">{{ __('Choose New Image') }}</label>
                                                    <input type="file" class="custom-file-input  up-img" name="icon"
                                                        id="image">
                                                </div>
                                                <p class="help-block text-info">
                                                    {{ __('Upload 70X70 (Pixel) Size image for best quality. Only jpg, jpeg, png image is allowed.') }}
                                                </p>
                                                @if ($errors->has('icon'))
                                                    <p class="text-danger"> {{ $errors->first('icon') }} </p>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="email" class="col-sm-2 control-label">{{ __('Email') }}<span
                                                    class="text-danger">*</span>
                                            </label>
                                            <div class="col-sm-10">
                                                <input type="email" class="form-control" name="email"
                                                    value="{{ $user->email }}" placeholder="{{ __('Email') }}"
                                                    readonly>
                                                @if ($errors->has('email'))
                                                    <p class="text-danger"> {{ $errors->first('email') }} </p>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-sm-2 control-label" for="name">{{ __('Name') }}
                                                <span class="text-danger">*</span>
                                            </label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" name="name"
                                                    value="{{ $user->name }}" placeholder="{{ __('Full Name') }}">
                                                @if ($errors->has('name'))
                                                    <p class="text-danger"> {{ $errors->first('name') }} </p>
                                                @endif
                                            </div>
                                        </div>



                                        <div class="form-group row">
                                            <label class="col-sm-2 control-label" for="phone_no">{{ __('Phone No') }}
                                               
                                            </label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" name="phone_no"
                                                    value="{{ $user->phone_no }}" placeholder="{{ __('Phone NO') }}">
                                                @if ($errors->has('phone_no'))
                                                    <p class="text-danger"> {{ $errors->first('phone_no') }} </p>
                                                @endif
                                            </div>
                                        </div>


                                        <div class="form-group row">
                                            <label class="col-sm-2 control-label"
                                                for="whatsapp_no">{{ __('WhatsApp No') }}
                                            </label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" name="whatsapp_no"
                                                    value="{{ $user->whatsapp_no }}"
                                                    placeholder="{{ __('+923001234567') }}">
                                                @if ($errors->has('whatsapp_no'))
                                                    <p class="text-danger"> {{ $errors->first('whatsapp_no') }} </p>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-sm-2 control-label" for="address">{{ __('Address') }}
                                            </label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" name="address"
                                                    value="{{ $user->address }}" placeholder="{{ __('Address') }}">
                                                @if ($errors->has('address'))
                                                    <p class="text-danger"> {{ $errors->first('address') }} </p>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <div class="offset-sm-2 col-sm-10">
                                                <button type="submit"
                                                    class="btn btn-primary">{{ __('Update profile') }}</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <!-- /.box-body -->
                            </div>
                        </div>
                        <!-- /.col -->
                    </div>
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div><!-- / -->
    </section>

@endsection
