@extends('admin.layouts.master')
@section('title', ucwords(str_replace('-', ' ', $slug)) . ' | Add FAQ')
@section('content')

    @include('admin.page.top-nav')

    <section class="content">
        @include('admin.page.side-nav')
        <div class="row">



            <div class="col-md-12">
                {{-- content --}}
                <div class="card card-primary card-outline">
                    <div class="card-header">
                        <h3 class="card-title mt-1">{{ __('FAQ Add') }}</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <form action="{{ route('admin.faq.store', ['slug' => $slug]) }}" method="post"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="faqQuestion">{{ __('Question ') }} <span
                                            class="text-danger">*</span></label>
                                    <textarea required class="form-control" id="faqQuestion" name="question" rows="3"></textarea>
                                    @error('question')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <label for="faqAnswer">{{ __('Answer') }} <span
                                            class="text-danger">*</span></label>
                                    <textarea required class="form-control" id="faqAnswer" name="answer" rows="3"></textarea>
                                    @error('answer')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mt-3">
                                <div class="col-md-6">
                                    <label for="faqOrderNo">{{ __('Order Number') }} <span class="text-danger">*</span></label>
                                    <input required type="number" class="form-control" id="faqOrderNo" name="order_no">
                                    @error('order_no')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="col-md-6">
                                    <label for="faqStatus">{{ __('Status') }} <span class="text-danger">*</span></label>
                                    <select required class="form-control" id="faqStatus" name="status">
                                        <option value="active">{{ __('Active') }}</option>
                                        <option value="inactive">{{ __('Inactive') }}</option>
                                    </select>
                                    @error('status')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="row">

                                <div class="col-12 mt-2">
                                    <button class="btn btn-primary btn-sm float-right">Submit</button>
                                </div>
                            </div>


                    </div>
                    </form>
                </div>
            </div>
        </div>
        </div>
    </section>

@endsection
