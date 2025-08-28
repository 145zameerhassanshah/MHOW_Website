@extends('admin.layouts.master')
@section('title', ucwords(str_replace('-', ' ', $slug)) . ' | Edit FAQ')
@section('content')

    @include('admin.page.top-nav')

    <section class="content">
        @include('admin.page.side-nav')
        <div class="row">

            <div class="col-md-12">
                {{-- content --}}
                <div class="card card-primary card-outline">
                    <div class="card-header">
                        <h3 class="card-title mt-1">{{ __('FAQ Edit') }}</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <form action="{{ route('admin.faq.update', $faq->id) }}" method="post">
                            @csrf
                            @method('PUT')

                            <div class="row">
                                <div class="col-md-6">
                                    <label for="editFaqQuestion">{{ __('Question') }} <span class="text-danger">*</span></label>
                                    <textarea required class="form-control" id="editFaqQuestion" name="question" rows="3">{{ $faq->question }}</textarea>
                                    @error('question')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <label for="editFaqAnswer">{{ __('Answer ') }} <span class="text-danger">*</span></label>
                                    <textarea required class="form-control" id="editFaqAnswer" name="answer" rows="3">{{ $faq->answer }}</textarea>
                                    @error('answer')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mt-3">
                                <div class="col-md-6">
                                    <label for="editFaqOrderNo">{{ __('Order Number') }} <span class="text-danger">*</span></label>
                                    <input required type="number" class="form-control" id="editFaqOrderNo" name="order_no" value="{{ $faq->order_no ?? 0 }}">
                                    @error('order_no')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="col-md-6">
                                    <label for="editFaqStatus">{{ __('Status') }} <span class="text-danger">*</span></label>
                                    <select required class="form-control" id="editFaqStatus" name="status">
                                        <option value="active" {{ $faq->status == 'active' ? 'selected' : '' }}>{{ __('Active') }}</option>
                                        <option value="inactive" {{ $faq->status == 'inactive' ? 'selected' : '' }}>{{ __('Inactive') }}</option>
                                    </select>
                                    @error('status')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mt-3">
                                <div class="col-12">
                                    <button class="btn btn-primary btn-sm float-right" type="submit">{{ __('Submit') }}</button>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>

        </div>
    </section>

@endsection
