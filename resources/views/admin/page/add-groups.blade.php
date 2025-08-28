@extends('admin.layouts.master')
@section('title', 'Add Groups to page')
@section('content')

    <div class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">{{ __('Add Groups to page') }} <span class="text-primary"> {{ $page->title }}</span></h1>
                </div>
            </div>
        </div>
    </div>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card card-primary card-outline">
                        <div class="card-body">
                            <form class="form-horizontal" action="{{ route('admin.page.store-groups',$page->id) }}" method="POST">
                                @csrf
                                    <input type="hidden" name="page_id" value="{{ $page->id }}">
                                <div class="row">
                                    <div class="col-lg-10">
                                        <div class="form-group">
                                            <label for="group_id">Group Name <span class="text-danger">*</span></label>
                                            <div class="input-group">
                                                <span class="input-group-text"><i class="bi bi-info-circle"></i></span>
                                                <select name="group_id" class="form-control select2" id="group_id" required>
                                                    <option value="" disabled {{ old('group_id') ? '' : 'selected' }}>Select Group</option>
                                                    @foreach ($groups as $group)
                                                        <option value="{{ $group->id }}" {{ old('group_id') == $group->id ? 'selected' : '' }}>
                                                            {{ $group->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            @if ($errors->has('group_id'))
                                                <p class="text-danger">{{ $errors->first('group_id') }}</p>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="col-lg-2 d-flex align-items-center pt-3">
                                        <button type="submit" class="btn btn-primary btn-sm">
                                            <i class="fas fa-plus"></i> {{ __('Add Groups') }}
                                        </button>
                                    </div>



                                    <div class="col-lg-6  mt-2">
                                        <label for="order_no" class="control-label">{{ __('Order No') }}<span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" name="order_no" id="order_no"
                                            placeholder="{{ __('Order No') }}" value="{{ old('order_no') }}">
                                        @if ($errors->has('order_no'))
                                            <p class="text-danger"> {{ $errors->first('order_no') }} </p>
                                        @endif
                                    </div>

                                    <div class="col-lg-6 mt-2">
                                        <label for="status" class="control-label">{{ __('Status') }}<span class="text-danger">*</span></label>
                                        <select class="form-control" name="status">
                                            <option value="inactive">{{ __('InActive') }}</option>
                                            <option value="active">{{ __('Active') }}</option>
                                        </select>
                                        @if ($errors->has('status'))
                                            <p class="text-danger"> {{ $errors->first('status') }} </p>
                                        @endif
                                    </div>


                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>


            <div class="row">
                <div class="col-md-12">
                    <div class="card card-primary card-outline mt-3">
                        <div class="card-header">
                            <h3 class="card-title mt-1"><b>{{ __('List of Groups') }}  <span class="text-primary"> {{ $page->title }} </b></h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="tableContent">
                                <table class="table table-striped table-bordered table-sm">
                                    <thead>
                                        <tr>
                                            <th style="width: 5%;">{{ __('#') }}</th>        <!-- Small width for serial number -->
                                            <th style="width: 62%;">{{ __('Group Name') }}</th> <!-- Wider space for names -->
                                            <th style="width: 8%;">{{ __('Order') }}</th>   <!-- Medium width for order number -->
                                            <th style="width: 5%;">{{ __('Status') }}</th>     <!-- Medium width for status -->
                                            <th style="width: 20%;">{{ __('Action') }}</th>     <!-- Room for action buttons -->
                                        </tr>
                                    </thead>
                                    <tbody id="tbody">
                                        @forelse ($pagegroups as $id => $pagegroup)
                                            <tr>
                                                <td class="text-center">{{ ++$id }}</td>
                                                <td>
                                                    {{ $pagegroup->group->name ?? 'N/A' }}
                                                </td>

                                                <td>
                                                    {{ $pagegroup->order_no }}
                                                </td>
                                                <td>
                                                    {{ $pagegroup->status }}
                                                </td>

                                                <td>
                                                    <div class="d-flex justify-content-center">
                                                        <a href="{{ route('admin.page.edit-groups', $pagegroup->id) }}" class="btn btn-info btn-sm mx-1">
                                                            <i class="fas fa-plus"></i> {{ __('Edit Groups') }}
                                                        </a>

                                                        <form id="deleteform" class="d-inline-block mx-1"
                                                            action="{{ route('admin.page.delete-groups', $pagegroup->id) }}" method="post">
                                                            @csrf
                                                            <button type="submit" class="btn btn-danger btn-sm" id="delete">
                                                                <i class="fas fa-trash"></i>
                                                            </button>
                                                        </form>
                                                    </div>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="9" class="text-center text-muted">No Groups available.</td>
                                            </tr>
                                        @endforelse

                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="loader text-center" id="loader" style="display: none">
                            <div class="spinner-border" role="status">
                                <span class="visually-hidden"></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
