@extends('admin.layouts.master')
@section('title', 'Edit Payment Method')
@section('content')

<section class="content">
    <div class="container-fluid">
        <div class="row">
            <!-- Card Container -->
            <div class="col-12">
                <form class="form-horizontal" action="{{ route('payment.method.update', $payment->id) }}" method="post"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="card card-primary card-outline mt-2">
                        <div class="card-header">
                            <h3 class="card-title mt-1"> <b> {{ __('Edit Payment-Method') }} </b> </h3>
                            <div class="card-tools">
                                <a href="{{ route('payment.method.index') }}" class="btn btn-primary btn-sm">
                                    <i class="bi bi-person-lines-fill"></i> {{ __('Payment-Method List') }}
                                </a>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body py-3">

                            <div class="row">
                                <!-- Payment-Method Name -->
                                <div class="col-md-12">
                                    <label for="name">{{ __('Payment-Method Name') }} <span class="text-danger">*</span></label>
                                    <input type="text" id="name" class="form-control form-control-sm"
                                        name="name" value="{{ old('name', $payment->name) }}"
                                        placeholder="{{ __('Enter Payment-Method Name') }}" onkeyup="generateSlug()">
                                    @if ($errors->has('name'))
                                        <p class="text-danger">{{ $errors->first('name') }}</p>
                                    @endif
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 mt-3">
                                    <button type="submit"
                                        class="btn btn-sm mb-1 btn-primary float-right">{{ __('Update Payment-Method') }}</button>
                                </div>
                            </div>
                            
                        </div>
                        <!-- /.card-body -->
                    </div>
                    
                </form>
                
            </div>

            <!-- Submit Button -->
            
        </div>
    </div>
    <!-- /.row -->
</section>

@endsection

@section('js')
<script>
    function generateSlug() {
        let paymentName = document.getElementById('name').value;
        let slug = paymentName.toLowerCase().replace(/\s+/g, '-');
        document.getElementById('slug').value = slug;
    }
</script>
@endsection
