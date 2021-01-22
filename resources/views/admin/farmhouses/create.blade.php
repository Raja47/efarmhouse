@extends('admin.app')
@section('title') {{ $pageTitle }} @endsection
=@section('content')
    <div class="app-title">
        <div>
            <h1><i class="fa fa-shopping-bag"></i> {{ $pageTitle }} - {{ $subTitle }}</h1>
        </div>
    </div>
    @include('admin.partials.flash')
    <div class="row user">
        <div class="col-md-3">
            <div class="tile p-0">
                <ul class="nav flex-column nav-tabs user-tabs">
                    <li class="nav-item"><a class="nav-link active" href="#general" data-toggle="tab">General</a></li>
                </ul>
            </div>
        </div>
        <div class="col-md-9">
            <div class="tab-content">
                <div class="tab-pane active" id="general">
                    <div class="tile">
                        <form action="{{ route('admin.farmhouses.store') }}" method="POST" role="form">
                            @csrf
                            <h3 class="tile-title">Farmhouse Information</h3>
                            <hr>
                            <div class="tile-body">
                                <div class="form-group">
                                    <label class="control-label" for="title">Name</label>
                                    <input
                                        class="form-control @error('title') is-invalid @enderror"
                                        type="text"
                                        placeholder="Enter Farmhouse name"
                                        id="title"
                                        name="title"
                                        value="{{ old('title') }}"
                                    />
                                    <div class="invalid-feedback active">
                                        <i class="fa fa-exclamation-circle fa-fw"></i> @error('title') <span>{{ $message }}</span> @enderror
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label" for="sku">SKU</label>
                                            <input
                                                class="form-control @error('sku') is-invalid @enderror"
                                                type="text"
                                                placeholder="Enter farmhouse sku"
                                                id="sku"
                                                name="sku"
                                                value="{{ old('sku') }}"
                                            />
                                            <div class="invalid-feedback active">
                                                <i class="fa fa-exclamation-circle fa-fw"></i> @error('sku') <span>{{ $message }}</span> @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label" for="city_id">City</label>
                                            <select name="city_id" required id="city_id" class="form-control @error('city_id') is-invalid @enderror">
                                                <option value="0">Select a city</option>
                                                @foreach($cities as $city)
                                                    <option value="{{ $city->id }}" {{ old('city_id') == $city->id ? 'selected' : '' }} >{{ $city->title }}</option>
                                                @endforeach
                                            </select>
                                            <div class="invalid-feedback active">
                                                <i class="fa fa-exclamation-circle fa-fw"></i> @error('city_id') <span>{{ $message }}</span> @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="control-label" for="categories">Categories</label>
                                            <select name="categories[]" id="categories" class="form-control" multiple>
                                                @foreach($categories as $category)
                                                    <option value="{{ $category->id }}">{{ $category->title }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label" for="price">Price</label>
                                            <input
                                                class="form-control @error('price') is-invalid @enderror"
                                                type="text"
                                                placeholder="Enter farmhouse price"
                                                id="price"
                                                name="price"
                                                value="{{ old('price') }}"
                                            />
                                            <div class="invalid-feedback active">
                                                <i class="fa fa-exclamation-circle fa-fw"></i> @error('price') <span>{{ $message }}</span> @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label" for="sale_price">Special Price</label>
                                            <input
                                                class="form-control  @error('sale_price') is-invalid @enderror"
                                                type="text"
                                                placeholder="Enter farmhouse special price"
                                                id="sale_price"
                                                name="sale_price"
                                                value="{{ old('sale_price') }}"
                                            />
                                            <div class="invalid-feedback active">
                                                <i class="fa fa-exclamation-circle fa-fw"></i> @error('sale_price') <span>{{ $message }}</span> @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label" for="quantity">Quantity</label>
                                            <input
                                                class="form-control @error('quantity') is-invalid @enderror"
                                                type="number"
                                                placeholder="Enter farmhouse quantity"
                                                id="quantity"
                                                name="quantity"
                                                value="{{ old('quantity') }}"
                                            />
                                            <div class="invalid-feedback active">
                                                <i class="fa fa-exclamation-circle fa-fw"></i> @error('quantity') <span>{{ $message }}</span> @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label" for="weight">Weight</label>
                                            <input
                                                class="form-control @error('weight') is-invalid @enderror"
                                                type="text"
                                                placeholder="Enter farmhouse weight"
                                                id="weight"
                                                name="weight"
                                                value="{{ old('weight','0') }}"
                                            />
                                            <div class="invalid-feedback active">
                                                <i class="fa fa-exclamation-circle fa-fw"></i> @error('weight') <span>{{ $message }}</span> @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="control-label" for="tags">Keywords / Tags</label>
                                            <select name="tags[]" id="tags" class="form-control" multiple>
                                                
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                
                                
                                
                                <div class="form-group">
                                    <label class="control-label" for="short_description">Short Description</label>
                                    <textarea name="short_description" id="short_description" rows="2" class="form-control" >{{ old('short_description') }}</textarea>
                                </div>
                                <div class="form-group">
                                    <label class="control-label" for="description">Description</label>
                                    <textarea name="description" id="description" rows="8" class="form-control" >{{ old('description') }}</textarea>
                                </div>
                                <div class="form-group">
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input class="form-check-input"
                                                   type="checkbox"
                                                   id="status"
                                                   name="status"
                                                />Status
                                        </label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input class="form-check-input"
                                                   type="checkbox"
                                                   id="featured"
                                                   name="featured"
                                                />Featured
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="tile-footer">
                                <div class="row d-print-none mt-2">
                                    <div class="col-12 text-right">
                                        <button class="btn btn-success" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Save Farmhouse</button>
                                        <a class="btn btn-danger" href="{{ route('admin.farmhouses.index') }}"><i class="fa fa-fw fa-lg fa-arrow-left"></i>Go Back</a>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script type="text/javascript" src="{{ asset('backend/js/plugins/select2.min.js') }}"></script>
    <script>
        $( document ).ready(function() {
            $('#categories').select2();
        
            $("#tags").select2({
                tags: true,
                tokenSeparators: [',', ' ']
            });
            
        });
        
    </script>
@endpush
