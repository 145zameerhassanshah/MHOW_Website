@extends('admin.layouts.master')
@section('title', 'Add Enquiries')
@section('content')


    <div class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">{{ __('Add Enquiry') }} </h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}"><i
                                    class="fas fa-home"></i>{{ __('Home') }}</a></li>
                        <li class="breadcrumb-item">{{ __('Enquiry') }}</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card card-primary card-outline">
                        <div class="card-header">
                            <h3 class="card-title mt-1">{{ __('Add Enquiry') }}</h3>
                            <div class="card-tools">
                                <a href="{{ route('admin.enquiry.index') }}" class="btn btn-primary btn-sm">
                                    <i class="fas fa-angle-double-left"></i> {{ __('Back') }}
                                </a>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <form class="form-horizontal" action="{{ route('admin.enquiry.store') }}" method="post"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="form-group row">
                                    <label for="name" class="col-sm-12 control-label">{{ __('Name') }}<span
                                            class="text-danger">*</span></label>
                                    <div class="col-sm-12">
                                        <input type="text" id="name" class="form-control" name="name"
                                            value="{{ old('name') }}" placeholder="{{ __('Enter Name') }}">
                                        @if ($errors->has('name'))
                                            <p class="text-danger"> {{ $errors->first('name') }} </p>
                                        @endif
                                    </div>

                                </div>

                                <div class="form-group row">
                                    <label for="email" class="col-sm-12 control-label">{{ __('Email') }}</label>
                                    <div class="col-sm-12">
                                        <input type="email" id="email" class="form-control" name="email"
                                            value="{{ old('email') }}" placeholder="{{ __('Enter Email') }}">
                                        @if ($errors->has('email'))
                                            <p class="text-danger"> {{ $errors->first('email') }} </p>
                                        @endif
                                    </div>

                                </div>


                                <div class="form-group row">
                                    <label for="phone_no" class="col-sm-12 control-label">{{ __('Phone Number') }}<span
                                            class="text-danger">*</span></label>
                                    <div class="col-sm-12">
                                        <input type="text" id="phone_no" class="form-control" name="phone_no"
                                            value="{{ old('phone_no') }}" placeholder="{{ __('Enter Phone Number') }}">
                                        @if ($errors->has('phone_no'))
                                            <p class="text-danger"> {{ $errors->first('phone_no') }} </p>
                                        @endif
                                    </div>

                                </div>

                                <div class="form-group row">
                                    <label for="subject" class="col-sm-12 control-label">{{ __('Subject') }}</label>
                                    <div class="col-sm-12">
                                        <input type="text" id="subject" class="form-control" name="subject"
                                            value="{{ old('subject') }}" placeholder="{{ __('Enter Subject') }}">
                                        @if ($errors->has('subject'))
                                            <p class="text-danger"> {{ $errors->first('subject') }} </p>
                                        @endif
                                    </div>

                                </div>

                                <div class="form-group row">
                                    <label for="enquiry_message"
                                        class="col-sm-12 control-label">{{ __('Enquiry Message') }}<span
                                            class="text-danger">*</span></label>
                                    <div class="col-sm-12">
                                        <textarea id="enquiry_message" class="form-control" name="enquiry_message" rows="4"
                                            placeholder="{{ __('Enter Enquiry Message') }}">{{ old('enquiry_message') }}</textarea>
                                        @if ($errors->has('enquiry_message'))
                                            <p class="text-danger"> {{ $errors->first('enquiry_message') }} </p>
                                        @endif
                                    </div>
                                </div>


                                <div class="form-group row">
                                    <label for="status" class="col-sm-12 control-label">{{ __('Status') }}<span
                                            class="text-danger">*</span></label>
                                    <div class="col-sm-12">
                                        <select id="status" name="status" class="form-control"
                                            value="{{ old('status') }}">
                                            <option value="" disabled selected>Select Status</option>
                                            <option value="pending">Pending</option>
                                            <option value="follow-up">Follow-Up</option>
                                            <option value="completed">Completed</option>
                                        </select>
                                        @if ($errors->has('status'))
                                            <p class="text-danger"> {{ $errors->first('status') }} </p>
                                        @endif

                                    </div>

                                </div>

                                <div class="form-group row">
                                    <label for="followup_date"
                                        class="col-sm-12 control-label">{{ __('Follow-up Date') }}</label>
                                    <div class="col-sm-12">
                                        <input type="date" id="followup_date" class="form-control"
                                            name="followup_date" value="{{ old('followup_date') }}"
                                            placeholder="{{ __('Select Follow-up Date') }}">
                                        @if ($errors->has('followup_date'))
                                            <p class="text-danger"> {{ $errors->first('followup_date') }} </p>
                                        @endif
                                    </div>
                                </div>


                                <div class="form-group row">
                                    <label for="followup_type"
                                        class="col-sm-12 control-label">{{ __('Followup Type') }}<span
                                            class="text-danger">*</span></label>
                                    <div class="col-sm-12">
                                        <select id="followup_type" name="followup_type" class="form-control"
                                            value="{{ old('followup_type') }}">
                                            <option value="" disabled selected>Select Followup Type</option>
                                            <option value="call">Call</option>
                                            <option value="whatsapp">WhatsApp</option>
                                            <option value="message">Message</option>
                                            <option value="email">Email</option>
                                            <option value="info-required">Info Required</option>
                                            <option value="docs-required">Docs Required</option>
                                        </select>
                                        @if ($errors->has('followup_type'))
                                            <p class="text-danger"> {{ $errors->first('followup_type') }} </p>
                                        @endif

                                    </div>

                                </div>

                                <div class="form-group row">
                                    <label for="remarks" class="col-sm-12 control-label">{{ __('Remarks') }}</label>
                                    <div class="col-sm-12">
                                        <textarea id="remarks" class="form-control" name="remarks" rows="3"
                                            placeholder="{{ __('Enter Remarks') }}">{{ old('remarks') }}</textarea>
                                        @if ($errors->has('remarks'))
                                            <p class="text-danger"> {{ $errors->first('remarks') }} </p>
                                        @endif
                                    </div>
                                </div>






                                <div class="form-group row">
                                    <div class="col-sm-3">
                                        <button type="submit"
                                            class="btn btn-primary btn btn-sm">{{ __('Add') }}</button>
                                    </div>
                                </div>
                        </div>

                        </form>

                    </div>
                    <!-- /.card-body -->
                </div>
            </div>
        </div>
        </div>
        <!-- /.row -->

    </section>


@endsection
