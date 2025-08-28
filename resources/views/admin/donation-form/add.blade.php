@extends('admin.layouts.master')

@section('content')
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-primary card-outline">
                    <div class="card-header">
                        <h3 class="card-title mt-1">{{ __('Element Add') }}</h3>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('donation-forms.store') }}" method="post" enctype="multipart/form-data">
                            @csrf

                            <div class="row">
                                <!-- Title Fields -->
                                <div class="col-md-6 mb-3">
                                    <label for="title">{{ __('Title') }}<span class="text-danger">*</span></label>
                                    <input type="text" id="title" class="form-control" name="title"
                                        placeholder="Enter Title in English" value="{{ old('title') }}" required>
                                    @error('title')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                
                                <!-- SubTitle Fields -->
                                <div class="col-md-6 mb-3">
                                    <label for="sub_title">{{ __('Subtitle') }}</label>
                                    <input type="text" id="subtitle" class="form-control" name="sub_title"
                                        placeholder="Enter Subtitle in English" value="{{ old('sub_title') }}">
                                    @error('sub_title')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>

                                <!-- image -->
                                <div class="col-md-6">
                                    <label for="image">{{ __('Image') }}</label>
                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <label class="custom-file-label"
                                                for="image">{{ __('Choose New Image') }}</label>
                                            <input type="file" class="custom-file-input up-img form-control" name="image"
                                                id="image">
                                            <img class="mw-400 mb-3 show-img img-demo mt-2"
                                                src="{{ asset('assets/admin/img/img-demo.jpg') }}" alt="" width="50px">
                                            @error('image')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                
                                <!-- purpose -->
                                <div class="col-md-6 mb-3">
                                    <label for="purpose">{{ __('Purpose') }}</label>
                                    <input type="text" id="purpose" class="form-control" name="purpose"
                                        placeholder="Enter purpose " value="{{ old('purpose') }}">
                                    @error('purpose')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                
                                <!-- order_no -->
                                <div class="col-md-6 mb-3">
                                    <label for="order_no">{{ __('order_no') }}</label>
                                    <input type="number" id="order_no" class="form-control" name="order_no"
                                        placeholder="Enter order_no " value="{{ old('order_no') }}">
                                    @error('order_no')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>

                                <!-- compain_id -->
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="compaign_id">Compaign<span class="text-danger">*</span></label>
                                        <select class="form-control" name="compaign_id" id="compaign_id">
                                            <option value="" disabled selected>{{ __('Select Compaign') }}</option>
                                            @foreach ($compaigns as $compaign)
                                                <option value="{{ $compaign->id }}" {{ old('compain_id') == $compaign->id ? 'selected' : '' }}>
                                                    {{ $compaign->title }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('compaign_id')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>

                                <!-- status -->
                                <div class="col-lg-6">
                                    <div class="form-group row">
                                        <label for="status" class="col-sm-12 control-label">{{ __('Status') }}<span
                                                class="text-danger">*</span></label>
                                        <div class="col-sm-12">
                                            <select class="form-control" name="status" id="status">
                                                <option value="publish" {{ old('status') == 'publish' ? 'selected' : '' }}>{{ __('Publish') }}</option>
                                                <option value="unpublish" {{ old('status') == 'unpublish' ? 'selected' : '' }}>{{ __('Unpublish') }}</option>
                                            </select>
                                            @error('status')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <!-- Dynamic Amount Fields -->
                                <div class="col-md-12 mb-3">
                                    <label>{{ __('Amount') }}</label>
                                    <div id="features-container">
                                        @if(old('amount'))
                                            @foreach(old('amount') as $index => $amount)
                                                <div class="row mb-3 feature-group border rounded p-2">
                                                    <div class="col-md-6">
                                                        <input type="text" name="amount[{{ $index }}][title]" 
                                                            class="form-control" placeholder="Enter Title" 
                                                            value="{{ $amount['title'] ?? '' }}" required>
                                                        @error("amount.$index.title")
                                                            <p class="text-danger">{{ $message }}</p>
                                                        @enderror
                                                    </div>
                                                    <div class="col-md-6">
                                                        <input type="number" name="amount[{{ $index }}][amount]" 
                                                            class="form-control" placeholder="Amount" 
                                                            value="{{ $amount['amount'] ?? '' }}" required>
                                                        @error("amount.$index.amount")
                                                            <p class="text-danger">{{ $message }}</p>
                                                        @enderror
                                                    </div>
                                                    <div class="col-md-12 text-end mt-2">
                                                        @if($index > 0)
                                                            <button type="button" class="btn btn-danger btn-sm remove-feature">Remove</button>
                                                        @endif
                                                    </div>
                                                </div>
                                            @endforeach
                                        @else
                                            <div class="row mb-3 feature-group border rounded p-2">
                                                <div class="col-md-6">
                                                    <input type="text" name="amount[0][title]" class="form-control" placeholder="Enter Title" required>
                                                </div>
                                                <div class="col-md-6">
                                                    <input type="number" name="amount[0][amount]" class="form-control" placeholder="Amount" required>
                                                </div>
                                            </div>
                                        @endif
                                    </div>
                                    <button type="button" class="btn btn-secondary mt-2" id="add-feature">Add Amount</button>
                                    @error('amount')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>

                                <!-- Description -->
                                <div class="col-md-12 mb-3">
                                    <label for="description">{{ __('Description') }}</label>
                                    <textarea id="description" class="form-control summernote" name="description"
                                        placeholder="Enter Description in English"
                                        rows="6">{{ old('description') }}</textarea>
                                    @error('description')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                
                                <div class="col-12">
                                    <button class="btn btn-sm btn-primary mt-2 float-right">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('js')
    <script>
        $(document).ready(function () {
            let featureIndex = {{ old('amount') ? count(old('amount')) : 1 }};

            $('#add-feature').click(function () {
                $('#features-container').append(`
                    <div class="row mb-3 feature-group border rounded p-2">
                        <div class="col-md-6">
                            <input type="text" name="amount[${featureIndex}][title]" class="form-control" placeholder="Enter Title" required>
                        </div>
                        <div class="col-md-6">
                            <input type="number" name="amount[${featureIndex}][amount]" class="form-control" placeholder="Amount" required>
                        </div>
                        <div class="col-md-12 text-end mt-2">
                            <button type="button" class="btn btn-danger btn-sm remove-feature">Remove</button>
                        </div>
                    </div>
                `);
                featureIndex++;
            });

            $(document).on('click', '.remove-feature', function () {
                $(this).closest('.feature-group').remove();
                // Reindex the remaining fields if needed
            });
        });
    </script>
@endsection