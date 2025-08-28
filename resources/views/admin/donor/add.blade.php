@extends('admin.layouts.master')
@section('title', 'Add Donor')

@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <form class="form-horizontal" action="{{ route('admin.donor.store') }}" method="post">
                    @csrf
                    <div class="col-lg-12">
                        <div class="card card-primary card-outline mt-2">
                            <div class="card-header">
                                <h3 class="card-title mt-1"><b>Add Donor</b></h3>
                                <div class="card-tools">
                                    <a href="{{ route('admin.donor.index') }}" class="btn btn-primary btn-sm">
                                        <i class="bi bi-list"></i> Donor List
                                    </a>
                                </div>
                            </div>

                            <div class="card-body py-3">
                                <div class="row">

                                    <!-- Name -->
                                    <div class="col-md-4">
                                        <label for="name">Donor Name <span class="text-danger">*</span></label>
                                        <input type="text" name="name" id="name"
                                            class="form-control form-control-sm" value="{{ old('name') }}"
                                            placeholder="Enter Donor Name">
                                        @error('name')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <!-- Account Name -->
                                    <div class="col-md-4">
                                        <label for="account_name">Account Name <span class="text-danger">*</span></label>
                                        <input type="text" name="account_name" id="account_name"
                                            class="form-control form-control-sm" value="{{ old('account_name') }}"
                                            placeholder="Enter Unique Account Name">
                                        @error('account_name')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <!-- Email -->
                                    <div class="col-md-4">
                                        <label for="email">Email</label>
                                        <input type="email" name="email" id="email"
                                            class="form-control form-control-sm" value="{{ old('email') }}"
                                            placeholder="Enter Email">
                                        @error('email')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <!-- Phone -->
                                    <div class="col-md-6">
                                        <label for="phone">Phone</label>
                                        <input type="text" name="phone" id="phone"
                                            class="form-control form-control-sm" value="{{ old('phone') }}"
                                            placeholder="Enter Phone Number">
                                        @error('phone')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <!-- WhatsApp Number -->
                                    <div class="col-md-6">
                                        <label for="whatsapp_no">WhatsApp No</label>
                                        <input type="text" name="whatsapp_no" id="whatsapp_no"
                                            class="form-control form-control-sm" value="{{ old('whatsapp_no') }}"
                                            placeholder="Enter WhatsApp Number">
                                        @error('whatsapp_no')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <!-- Country -->
                                    <!-- Country Dropdown -->
                                    <div class="col-md-6">
                                        <label for="country_id">Country</label>
                                        <select name="country_id" id="country_id" class="form-control form-control-sm">
                                            <option value="">Select Country</option>
                                            @foreach ($countries as $country)
                                                <option value="{{ $country->id }}"
                                                    {{ old('country_id') == $country->id ? 'selected' : '' }}>
                                                    {{ $country->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('country_id')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <!-- City Dropdown (Dynamic) -->
                                    <div class="col-md-6">
                                        <label for="city_id">City</label>
                                        <select name="city_id" id="city_id" class="form-control form-control-sm">
                                            <option value="">Select City</option>
                                            {{-- Cities will be loaded dynamically --}}
                                        </select>
                                        @error('city_id')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>


                                    <!-- Address -->
                                    <div class="col-md-12">
                                        <label for="address">Address</label>
                                        <textarea name="address" id="address" rows="3" class="form-control form-control-sm" placeholder="Enter Address">{{ old('address') }}</textarea>
                                        @error('address')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <!-- Status -->
                                    <div class="col-md-4">
                                        <label for="status">Status <span class="text-danger">*</span></label>
                                        <select name="status" id="status" class="form-control form-control-sm">
                                            <option value="active" {{ old('status') == 'active' ? 'selected' : '' }}>Active
                                            </option>
                                            <option value="inactive" {{ old('status') == 'inactive' ? 'selected' : '' }}>
                                                Inactive</option>
                                        </select>
                                        @error('status')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <!-- Donor Type -->
                                    <div class="col-md-4">
                                        <label for="donor_type">Donor Type <span class="text-danger">*</span></label>
                                        <select name="donor_type" id="donor_type" class="form-control form-control-sm">
                                            <option value="individual"
                                                {{ old('donor_type') == 'individual' ? 'selected' : '' }}>Individual
                                            </option>
                                            <option value="corporate"
                                                {{ old('donor_type') == 'corporate' ? 'selected' : '' }}>Corporate</option>
                                            <option value="recurring"
                                                {{ old('donor_type') == 'recurring' ? 'selected' : '' }}>Recurring</option>
                                        </select>
                                        @error('donor_type')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <!-- Receive Email -->
                                    <div class="col-md-4">
                                        <label for="is_receive_email">Receive Email?</label>
                                        <select name="is_receive_email" id="is_receive_email"
                                            class="form-control form-control-sm">
                                            <option value="1" {{ old('is_receive_email') == '1' ? 'selected' : '' }}>
                                                Yes</option>
                                            <option value="0" {{ old('is_receive_email') == '0' ? 'selected' : '' }}>
                                                No</option>
                                        </select>
                                        @error('is_receive_email')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>

                                </div> <!-- /.row -->
                            </div> <!-- /.card-body -->
                        </div> <!-- /.card -->
                    </div>

                    <div class="col-12">
                        <button type="submit" class="btn btn-sm mb-1 btn-primary float-right">Save Donor</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection
@section('js')
<script>
    $(document).ready(function () {
        $('#country_id').on('change', function () {
            var countryId = $(this).val();

            if (countryId) {
                $.ajax({
                    url: '{{ route("admin.donor.getCities") }}',
                    type: 'GET',
                    data: { country_id: countryId },
                    success: function (data) {
                        $('#city_id').empty().append('<option value="">Select City</option>');
                        $.each(data, function (key, city) {
                            $('#city_id').append('<option value="' + city.id + '">' + city.name + '</option>');
                        });
                    },
                    error: function () {
                        alert('Failed to load cities.');
                    }
                });
            } else {
                $('#city_id').html('<option value="">Select City</option>');
            }
        });
    });
</script>
@endsection
