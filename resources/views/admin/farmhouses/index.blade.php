@extends('admin.app')
@section('title') {{ $pageTitle }} @endsection
@section('content')
    <div class="app-title">
        <div>
            <h1><i class="fa fa-shopping-bag"></i> {{ $pageTitle }}</h1>
            <p>{{ $subTitle }}</p>
        </div>
        <a href="{{ route('admin.farmhouses.create') }}" class="btn btn-primary pull-right">Add Product</a>
    </div>
    @include('admin.partials.flash')
    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <div class="tile-body">
                    <table class="table table-hover table-bordered" id="sampleTable">
                        <thead>
                        <tr>
                            <th> # </th>
                            <th> SKU </th>
                            <th> Name </th>
                            <th class="text-center"> City </th>
                            <th class="text-center"> Categories </th>
                            <th class="text-center"> Price </th>
                            <th class="text-center"> Sale Price </th>
                            <th class="text-center"> Status </th>
                            <th style="width:100px; min-width:100px;" class="text-center text-danger"><i class="fa fa-bolt"> </i></th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach($farmhouses as $farmhouse)
                                <tr>
                                    <td>{{ $farmhouse->id }}</td>
                                    <td>{{ $farmhouse->sku }}</td>
                                    <td>{{ $farmhouse->title }}</td>
                                    <td>{{ $farmhouse->city ? $farmhouse->city->title : '--None' }}</td>
                                    <td>
                                        @if($farmhouse->categories)
                                        @foreach($farmhouse->categories as $category)
                                            <span class="badge badge-info">{{ $category->name }}</span>
                                        @endforeach
                                        @endif
                                    </td>
                                    <td>{{ config('settings.currency_symbol') }}{{ $farmhouse->price }}</td>
                                    <td>{{ $farmhouse->sale_price ? config('settings.currency_symbol') .$farmhouse->sale_price : '---'  }}</td>
                                    <td class="text-center">
                                        @if ($farmhouse->status == 1)
                                            <span class="badge badge-success">Active</span>
                                        @else
                                            <span class="badge badge-danger">Not Active</span>
                                        @endif
                                    </td>
                                    <td class="text-center">
                                        <div class="btn-group" role="group" aria-label="Second group">
                                            <a href="{{ route('admin.farmhouses.edit', $farmhouse->id) }}" class="btn btn-sm btn-primary"><i class="fa fa-edit"></i></a>
                                            <a href="{{ route('admin.farmhouses.delete', $farmhouse->id) }}" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script type="text/javascript" src="{{ asset('backend/js/plugins/jquery.dataTables.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('backend/js/plugins/dataTables.bootstrap.min.js') }}"></script>
    <script type="text/javascript">$('#sampleTable').DataTable();</script>
@endpush
