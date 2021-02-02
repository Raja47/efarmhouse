@extends('admin.app')
@section('title') {{ $pageTitle }} @endsection
@section('styles')
    <link rel="stylesheet" type="text/css" href="{{ asset('backend/js/plugins/dropzone/dist/min/dropzone.min.css') }}"/>
@endsection

{{-- <?php
    var_dump($farmhouse);
    die();
?> --}}

@section('content')

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
                    <li class="nav-item"><a class="nav-link" href="#images" data-toggle="tab">Images</a></li>
                    
                </ul>
            </div>
        </div>
        <div class="col-md-9">
            <div class="tab-content">
                <div class="tab-pane active" id="general">
                    <div class="tile">
                        <form action="{{ route('admin.farmhouses.update') }}" method="POST" role="form" enctype="multipart/form-data">
                            @csrf
                            <h3 class="tile-title">farmhouse Information</h3>
                            <hr>
                            <div class="tile-body">
                                <div class="form-group">
                                    <label class="control-label" for="title">Title</label>
                                    <input
                                        class="form-control @error('title') is-invalid @enderror"
                                        type="text"
                                        placeholder="Enter attribute title"
                                        id="title"
                                        name="title"
                                        value="{{ old('title', $farmhouse->title) }}"
                                    />
                                    <input type="hidden" name="farmhouse_id" value="{{ $farmhouse->id }}">
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
                                                value="{{ old('sku', $farmhouse->sku) }}"
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
                                                    @if ($farmhouse->city_id == $city->id)
                                                        <option value="{{ $city->id }}" selected>{{ $city->title }}</option>
                                                    @else
                                                        <option value="{{ $city->id }}">{{ $city->title }}</option>
                                                    @endif
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
                                                    @php $check = in_array( $category->id , old('categories', $farmhouse->categories->pluck('id')->toArray()) ) ? 'selected' : ''@endphp
                                                    <option value="{{ $category->id }}" {{ $check }}>{{ $category->title }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="control-label" for="price">Price</label>
                                            <input
                                                class="form-control @error('price') is-invalid @enderror"
                                                type="text"
                                                placeholder="Enter farmhouse price"
                                                id="price"
                                                name="price"
                                                value="{{ old('price', $farmhouse->price) }}"
                                            />
                                            <div class="invalid-feedback active">
                                                <i class="fa fa-exclamation-circle fa-fw"></i> @error('price') <span>{{ $message }}</span> @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="control-label" for="sale_price">Special Price</label>
                                            <input
                                                class="form-control @error('sale_price') is-invalid @enderror"
                                                type="text"
                                                placeholder="Enter farmhouse special price"
                                                id="sale_price"
                                                name="sale_price"
                                                value="{{ old('sale_price', $farmhouse->sale_price) }}"
                                            />
                                            <div class="invalid-feedback active">
                                                <i class="fa fa-exclamation-circle fa-fw"></i> @error('sale_price') <span>{{ $message }}</span> @enderror
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="control-label" for="weekdays_difference" title="Differnce if there for except saturdays and sundays">Week days Difference (If any)</label>
                                            <input
                                                class="form-control @error('weekdays_difference') is-invalid @enderror"
                                                type="text"
                                                placeholder="Enter weekdays difference"
                                                id="weekdays_difference"
                                                name="weekdays_difference"
                                                value="{{ old('weekdays_difference', $farmhouse->weekdays_difference) }}"
                                            />
                                            <div class="invalid-feedback active">
                                                <i class="fa fa-exclamation-circle fa-fw"></i> @error('weekdays_difference') <span>{{ $message }}</span> @enderror
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label" for="sku">Contact no</label>
                                            <input
                                                class="form-control @error('contact') is-invalid @enderror"
                                                type="text"
                                                placeholder="Enter Contact no"
                                                id="contact"
                                                name="contact"
                                                value="{{ old('contact', $farmhouse->contact) }}"
                                            />
                                            <div class="invalid-feedback active">
                                                <i class="fa fa-exclamation-circle fa-fw"></i> @error('contact') <span>{{ $message }}</span> @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label" for="group_id">Group if belongs To</label>
                                            <select name="group_id" required id="group_id" class="form-control @error('group_id') is-invalid @enderror">
                                                <option value="0">Select a city</option>
                                                @foreach($groups as $group)
                                                    @if ($farmhouse->group_id == $group->id)
                                                        <option value="{{ $group->id }}" selected>{{ $group->title }}</option>
                                                    @else
                                                        <option value="{{ $group->id }}">{{ $group->title }}</option>
                                                    @endif
                                                @endforeach
                                            </select>
                                            <div class="invalid-feedback active">
                                                <i class="fa fa-exclamation-circle fa-fw"></i> @error('group_id') <span>{{ $message }}</span> @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="control-label" for="keywords">Keywords</label>
                                            <select type="hidden" name="keywords[]" id="keywords" class="form-control" multiple>
                                                @if($farmhouse->keywords)
                                                    @foreach($farmhouse->keywords as $keyword)
                                                        <option value="{{ $keyword }}" selected="selected"> {{ $keyword }} <option>
                                                    @endforeach
                                                @endif
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label" for="short_description">Short Description</label>
                                    <textarea name="short_description" id="short_description" rows="2" class="form-control">{{ old('short_description', $farmhouse->short_description) }}</textarea>
                                </div>
                                <div class="form-group">
                                    <label class="control-label" for="description">Description</label>
                                    <textarea name="description" id="description" rows="8" class="form-control">{{ old('description', $farmhouse->description) }}</textarea>
                                </div>

                               

                                <fieldset>
                                    <legend> Halfdays (Status,Timing,Price) </legend> 
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <select name="halfday_feature"  class="form-control">
                                                    <option value="0" > Enabled<option>
                                                    <option value="1" @if($farmhouse->halfday_feature == 1) {{'selected'}} @endif> Disabled<option>        
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                     <div class="row">
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label class="control-label" for="morning_start_time">Morning Shift Start</label>
                                                <input
                                                    class="form-control @error('morning_start_time') is-invalid @enderror"
                                                    type="time"
                                                    placeholder="Shift Start"
                                                    id="morning_start_time"
                                                    name="morning_start_time"
                                                    value="{{ old('morning_start_time', $farmhouse->morning_start_time) }}"
                                                />
                                                <div class="invalid-feedback active">
                                                    <i class="fa fa-exclamation-circle fa-fw"></i> @error('morning_start_time') <span>{{ $message }}</span> @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label class="control-label" for="morning_end_time">Morning Shift End</label>
                                                <input
                                                    class="form-control @error('morning_end_time') is-invalid @enderror"
                                                    type="time"
                                                    placeholder="Shift End"
                                                    id="morning_end_time"
                                                    name="morning_end_time"
                                                    value="{{ old('morning_end_time', $farmhouse->morning_end_time) }}"
                                                />
                                                <div class="invalid-feedback active">
                                                    <i class="fa fa-exclamation-circle fa-fw"></i> @error('morning_end_time') <span>{{ $message }}</span> @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label class="control-label" for="morning_shift_price" title="Differnce if there for except saturdays and sundays">Morning Shift Price</label>
                                                <input
                                                    class="form-control @error('morning_shift_price') is-invalid @enderror"
                                                    type="text"
                                                    placeholder="Morning Price"
                                                    id="morning_shift_price"
                                                    name="morning_shift_price"
                                                    value="{{ old('morning_shift_price', $farmhouse->morning_shift_price) }}"
                                                />
                                                <div class="invalid-feedback active">
                                                    <i class="fa fa-exclamation-circle fa-fw"></i> @error('morning_shift_price') <span>{{ $message }}</span> @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label class="control-label" for="evening_shift_sale_price" title="Differnce if there for except saturdays and sundays">Morning Shift Sale Price</label>
                                                <input
                                                    class="form-control @error('morning_shift_sale_price') is-invalid @enderror"
                                                    type="text"
                                                    placeholder="Morning Sale Price"
                                                    id="morning_shift_sale_price"
                                                    name="morning_shift_sale_price"
                                                    value="{{ old('morning_shift_sale_price', $farmhouse->morning_shift_sale_price) }}"
                                                />
                                                <div class="invalid-feedback active">
                                                    <i class="fa fa-exclamation-circle fa-fw"></i> @error('morning_shift_sale_price') <span>{{ $message }}</span> @enderror
                                                </div>
                                            </div>
                                        </div>
                                    </div> 
                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label class="control-label" for="evening_start_time">Evening Shift Start</label>
                                                <input
                                                    class="form-control @error('evening_start_time') is-invalid @enderror"
                                                    type="time"
                                                    placeholder="Shift Start"
                                                    id="evening_start_time"
                                                    name="evening_start_time"
                                                    value="{{ old('evening_start_time', $farmhouse->evening_start_time) }}"
                                                />
                                                <div class="invalid-feedback active">
                                                    <i class="fa fa-exclamation-circle fa-fw"></i> @error('evening_start_time') <span>{{ $message }}</span> @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label class="control-label" for="evening_end_time">Evening Shift End</label>
                                                <input
                                                    class="form-control @error('evening_end_time') is-invalid @enderror"
                                                    type="time"
                                                    placeholder="Shift End"
                                                    id="evening_end_time"
                                                    name="evening_end_time"
                                                    value="{{ old('evening_end_time', $farmhouse->evening_end_time) }}"
                                                />
                                                <div class="invalid-feedback active">
                                                    <i class="fa fa-exclamation-circle fa-fw"></i> @error('evening_end_time') <span>{{ $message }}</span> @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label class="control-label" for="evening_shift_price" title="Differnce if there for except saturdays and sundays">Evening Shift Price</label>
                                                <input
                                                    class="form-control @error('evening_shift_price') is-invalid @enderror"
                                                    type="text"
                                                    placeholder="Morning Price"
                                                    id="evening_shift_price"
                                                    name="evening_shift_price"
                                                    value="{{ old('evening_shift_price', $farmhouse->evening_shift_price) }}"
                                                />
                                                <div class="invalid-feedback active">
                                                    <i class="fa fa-exclamation-circle fa-fw"></i> @error('evening_shift_price') <span>{{ $message }}</span> @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label class="control-label" for="evening_shift_sale_price" title="Differnce if there for except saturdays and sundays">Evening Shift Sale Price</label>
                                                <input
                                                    class="form-control @error('evening_shift_sale_price') is-invalid @enderror"
                                                    type="text"
                                                    placeholder="Morning Sale Price"
                                                    id="evening_shift_sale_price"
                                                    name="evening_shift_sale_price"
                                                    value="{{ old('evening_shift_sale_price', $farmhouse->evening_shift_sale_price) }}"
                                                />
                                                <div class="invalid-feedback active">
                                                    <i class="fa fa-exclamation-circle fa-fw"></i> @error('evening_shift_sale_price') <span>{{ $message }}</span> @enderror
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                     <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="control-label" for="halfday_weekdays_difference" title="Differnce if there for except saturdays and sundays">Halfday Weekday difference IF any</label>
                                                <input
                                                    class="form-control @error('halfday_weekdays_difference') is-invalid @enderror"
                                                    type="text"
                                                    placeholder="Morning Price"
                                                    id="halfday_weekdays_difference"
                                                    name="halfday_weekdays_difference"
                                                    value="{{ old('halfday_weekdays_difference', $farmhouse->halfday_weekdays_difference) }}"
                                                />
                                            </div>
                                        </div>
                                    </div>

                                </fieldset> 


                                <hr>
                                 <fieldset>
                                    <legend>Addresses:</legend>    
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="control-label" for="location_address">Location Address</label>
                                                <input
                                                    class="form-control @error('location_address') is-invalid @enderror"
                                                    type="text"
                                                    placeholder="Enter location address"
                                                    id="location_address"
                                                    name="location_address"
                                                    value="{{ old('location_address', $farmhouse->location_address) }}"
                                                />
                                               
                                                <div class="invalid-feedback active">
                                                    <i class="fa fa-exclamation-circle fa-fw"></i> @error('location_address') <span>{{ $message }}</span> @enderror
                                                </div>
                                            </div>
                                        </div>
                                    </div>



                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="control-label" for="location_lng">Location Longitude</label>
                                            <input
                                                class="form-control @error('location_lng') is-invalid @enderror"
                                                type="text"
                                                placeholder="Enter location address"
                                                id="location_lng"
                                                name="location_lng"
                                                value="{{ old('location_lng', $farmhouse->location_lng) }}"
                                            />
                                           
                                            <div class="invalid-feedback active">
                                                <i class="fa fa-exclamation-circle fa-fw"></i> @error('location_address') <span>{{ $message }}</span> @enderror
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="control-label" for="location_lat">Location Lattitude</label>
                                            <input
                                                class="form-control @error('location_lat') is-invalid @enderror"
                                                type="text"
                                                placeholder="Enter location address"
                                                id="location_lat"
                                                name="location_lat"
                                                value="{{ old('location_lat', $farmhouse->location_lat) }}"
                                            />
                                           
                                            <div class="invalid-feedback active">
                                                <i class="fa fa-exclamation-circle fa-fw"></i> @error('location_lat') <span>{{ $message }}</span> @enderror
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="control-label" for="location_zoom">Location Zoom</label>
                                            <input
                                                class="form-control @error('location_zoom') is-invalid @enderror"
                                                type="tyext"
                                                placeholder="Enter location address"
                                                id="location_zoom"
                                                name="location_zoom"
                                                value="{{ old('location_zoom', $farmhouse->location_zoom) }}"
                                            />
                                           
                                            <div class="invalid-feedback active">
                                                <i class="fa fa-exclamation-circle fa-fw"></i> @error('location_zoom') <span>{{ $message }}</span> @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                </fieldset>
                                
                                <hr/>   
                                
                                
                                

                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-2">
                                            @if ( $farmhouse->getFirstMediaUrl('featuredImage') != null)
                                                <figure class="mt-2" style="width: 80px; height: auto;">
                                                    <img src="{{ $farmhouse->getFirstMediaUrl('featuredImage') }}" id="featuredImage" class="img-fluid" alt="img">
                                                </figure>
                                            @endif
                                        </div>
                                        <div class="col-md-10">
                                            <label class="control-label">Featured Image</label>
                                            <input class="form-control @error('featuredImage') is-invalid @enderror" type="file" id="image" name="featuredImage"/>
                                            @error('featuredImage') {{ $message }} @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-2">
                                            @if ( $farmhouse->getFirstMediaUrl('bannerImage') != null)
                                                <figure class="mt-2" style="width: 80px; height: auto;">
                                                    <img src="{{ $farmhouse->getFirstMediaUrl('bannerImage') }}" id="bannerImage" class="img-fluid" alt="img">
                                                </figure>
                                            @endif
                                        </div>
                                        <div class="col-md-10">
                                            <label class="control-label">Banner Image</label>
                                            <input class="form-control @error('bannerImage') is-invalid @enderror" 
                                            type="file" 
                                            id="bannerImage" 
                                            name="bannerImage"/>
                                            @error('bannerImage') {{ $message }} @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="control-label" for="youtube_video_link">Youtube Video Url/Link</label>
                                            <input
                                                class="form-control @error('youtube_video_link') is-invalid @enderror"
                                                type="text"
                                                placeholder="Enter location address"
                                                id="youtube_video_link"
                                                name="youtube_video_link"
                                                value="{{ old('youtube_video_link', $farmhouse->youtube_video_link) }}"
                                            />

                                            <div class="invalid-feedback active">
                                                <i class="fa fa-exclamation-circle fa-fw"></i> @error('youtube_video_link') <span>{{ $message }}</span> @enderror
                                            </div>

                                        </div>
                                    </div>
                                </div>




                                <hr>
                                 <fieldset>
                                    <legend>Farmhouse Seo:</legend>    
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="control-label" for="seo_title">Seo Meta Title</label>
                                                <input
                                                    class="form-control @error('seo_title') is-invalid @enderror"
                                                    type="text"
                                                    placeholder="Enter Seo Meta Title"
                                                    id="seo_title"
                                                    name="seo_title"
                                                    value="{{ old('seo_title',$farmhouse->seo_title) }}"
                                                />
                                               
                                                <div class="invalid-feedback active">
                                                    <i class="fa fa-exclamation-circle fa-fw"></i> @error('seo_title') <span>{{ $message }}</span> @enderror
                                                </div>
                                            </div>
                                        </div>
                                    </div>



                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                             <label class="control-label" for="seo_description">Seo Meta Description</label>
                                            <textarea name="seo_description" id="seo_description" rows="2" class="form-control">{{ old('seo_description',$farmhouse->seo_description) }}</textarea>
                                            
                                            <div class="invalid-feedback active">
                                                    <i class="fa fa-exclamation-circle fa-fw"></i> @error('seo_description') <span>{{ $message }}</span> @enderror
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                    
                               <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="control-label" for="seo_keywords">Seo Keywords</label>
                                            <select type="hidden" name="seo_keywords[]" id="seo_keywords" class="form-control" multiple>
                                                
                                                  @foreach( old('seo_keywords',$farmhouse->seo_keywords) as $keyword)
                                                        <option value="{{ $keyword }}" selected >{{ $keyword}} </option>
                                                  @endforeach
                                                    
                                            </select>

                                            <div class="invalid-feedback active">
                                                    <i class="fa fa-exclamation-circle fa-fw"></i> @error('seo_keywords') <span>{{ $message }}</span> @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                </fieldset>

                                <hr/>



                                <div class="form-group">
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input class="form-check-input"
                                                   type="checkbox"
                                                   id="status"
                                                   name="status"
                                                   {{ old( "status" , $farmhouse->status == 1 ) ? 'checked' : '' }}
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
                                                   {{ old( "featured" , $farmhouse->featured == 1) ? 'checked' : '' }}
                                                />Featured
                                        </label>
                                    </div>
                                </div>
                               
                                <div class="form-group">
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input class="form-check-input"
                                                   type="checkbox"
                                                   id="family_friendly"
                                                   name="family_friendly"
                                                   {{ old( "family_friendly" , $farmhouse->family_friendly == 1) ? 'checked' : '' }}
                                                />Family Friendly
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="tile-footer">
                                <div class="row d-print-none mt-2">
                                    <div class="col-12 text-right">
                                        <button class="btn btn-success" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Update farmhouse</button>
                                        <a class="btn btn-danger" href="{{ route('admin.farmhouses.index') }}"><i class="fa fa-fw fa-lg fa-arrow-left"></i>Go Back</a>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="tab-pane" id="images">
                    <div class="tile">
                        <h3 class="tile-title">Upload Image</h3>
                        <hr>
                        <div class="tile-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <form action="" class="dropzone" id="dropzone" style="border: 2px dashed rgba(0,0,0,0.3)" enctype="multipart/form-data">
                                        <input type="hidden" name="farmhouse_id" value="{{ $farmhouse->id }}">
                                        {{ csrf_field() }}
                                    </form>
                                </div>
                            </div>
                            <div class="row d-print-none mt-2">
                                <div class="col-12 text-right">
                                    <button class="btn btn-success" type="button" id="uploadButton">
                                        <i class="fa fa-fw fa-lg fa-upload"></i>Upload Images
                                    </button>
                                </div>
                            </div>
                            @if ( ($medias = $farmhouse->getMedia('gallery')) != null)
                            
                                <hr>
                                <div class="row">
                                    @foreach($medias as $key => $media)
                                        <div class="col-md-3">
                                            <div class="card">
                                                <div class="card-body">
                                                    <img src="{{ $media->getFullUrl() }}" id="cityLogo" class="img-fluid" alt="img">
                                                    <a class="card-link float-right text-danger" href="{{ route('admin.farmhouses.images.delete', [ $farmhouse->id , $key ]) }}">
                                                        <i class="fa fa-fw fa-lg fa-trash"></i>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script type="text/javascript" src="{{ asset('backend/js/plugins/select2.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('backend/js/plugins/dropzone/dist/min/dropzone.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('backend/js/plugins/bootstrap-notify.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('backend/js/app.js') }}"></script>
    <script src="//cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/ckeditor/4.14.1/adapters/jquery.min.js"></script>
    <script>
        Dropzone.autoDiscover = false;

        $( document ).ready(function() {
            
            $('#categories').select2();
        
            $("#keywords").select2({
                tags: true,
                tokenSeparators: [',']
            });

            $("#seo_keywords").select2({
                tags: true,
                tokenSeparators: [',']
            });

            let myDropzone = new Dropzone("#dropzone", {
                paramName: "image",
                addRemoveLinks: false,
                maxFilesize: 400,
                parallelUploads: 6,
                uploadMultiple: false,
                url: "{{ route('admin.farmhouses.images.upload') }}",
                autoProcessQueue: false,
                init: function () {
                  this.on("success", function (file, responseText) {
                    console.log(responseText.img);
                });
              }
            });
            
            myDropzone.on("queuecomplete", function (file) {
                // window.location.reload();
                showNotification('Completed', 'All farmhouse images uploaded', 'success', 'fa-check');
                
                setTimeout(function(){ location.reload(); }, 3000);    
            });

            $('#uploadButton').click(function(){
                if (myDropzone.files.length === 0) {
                    showNotification('Error', 'Please select files to upload.', 'danger', 'fa-close');
                } else {
                    myDropzone.processQueue();
                }
            });

            function showNotification(title, message, type, icon)
            {
                $.notify({
                    title: title + ' : ',
                    message: message,
                    icon: 'fa ' + icon
                },{
                    type: type,
                    allow_dismiss: true,
                    placement: {
                        from: "top",
                        align: "right"
                    },
                });
            }
        });
    </script>
    <script type="text/javascript">
            $('#description').ckeditor();
            $('#short_description').ckeditor();
    </script>
@endpush
