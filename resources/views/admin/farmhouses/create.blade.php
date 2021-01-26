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
                        <form action="{{ route('admin.farmhouses.store') }}" method="POST" role="form" enctype="multipart/form-data">
                            @csrf
                            <h3 class="tile-title">farmhouse Information</h3>
                            <hr>
                            <div class="tile-body">
                                <div class="form-group">
                                    <label class="control-label" for="title">Title</label>
                                    <input
                                        class="form-control @error('title') is-invalid @enderror"
                                        type="text"
                                        placeholder="Enter Title"
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
                                                <option value="">Select a city</option>
                                                @foreach($cities as $city)
                                                    
                                                        <option value="{{ $city->id }}">{{ $city->title }}</option>
                        
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
                                                    <option value="{{ $category->id }}" >{{ $category->title }}</option>
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
                                                value="{{ old('price') }}"
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
                                                value="{{ old('sale_price') }}"
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
                                                value="{{ old('weekdays_difference') }}"
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
                                                value="{{ old('contact') }}"
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
                                                <option value="">Select a city</option>
                                                @foreach($groups as $group)
                                                        <option value="{{ $group->id }}">{{ $group->title }}</option>
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
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label" for="short_description">Short Description</label>
                                    <textarea name="short_description" id="short_description" rows="2" class="form-control">{{ old('short_description') }}</textarea>
                                </div>
                                <div class="form-group">
                                    <label class="control-label" for="description">Description</label>
                                    <textarea name="description" id="description" rows="8" class="form-control">{{ old('description') }}</textarea>
                                </div>

                               

                                <fieldset>
                                    <legend> Halfdays (Status,Timing,Price) </legend> 
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <select name="halfday_feature"  class="form-control">
                                                    <option value="0"> Disabled<option>
                                                    <option value="1"> Enabled<option>        
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
                                                    value="{{ old('morning_start_time') }}"
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
                                                    value="{{ old('morning_end_time') }}"
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
                                                    value="{{ old('morning_shift_price') }}"
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
                                                    value="{{ old('morning_shift_sale_price') }}"
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
                                                    value="{{ old('evening_start_time') }}"
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
                                                    value="{{ old('evening_end_time') }}"
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
                                                    value="{{ old('evening_shift_price') }}"
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
                                                    value="{{ old('evening_shift_sale_price') }}"
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
                                                    placeholder="Morning Pfference                                                    id="halfday_weekdays_difference"
                                                    name="halfday_weekdays_difference"
                                                    value="{{ old('halfday_weekdays_difference') }}"
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
                                                    value="{{ old('location_address') }}"
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
                                                value="{{ old('location_lng') }}"
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
                                                value="{{ old('location_lat') }}"
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
                                                value="{{ old('location_zoom') }}"
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
                                       
                                        <div class="col-md-12">
                                            <label class="control-label">Featured Image</label>
                                        <input type="file" class="form-control @error('featuredImage') is-invalid @enderror"  id="featuredImage" name="featuredImage" accept="image/png, image/jpeg"/>
                                            @error('featuredImage') {{ $message }} @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="row">
                                        
                                        <div class="col-md-12">
                                            <label class="control-label">Banner Image</label>
                                            <input type="file" class="form-control @error('bannerImage') is-invalid @enderror"  id="bannerImage" name="bannerImage" accept="image/png, image/jpeg"/>
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
                                                value="{{ old('youtube_video_link') }}"
                                            />
                                           
                                            <div class="invalid-feedback active">
                                                <i class="fa fa-exclamation-circle fa-fw"></i> @error('youtube_video_link') <span>{{ $message }}</span> @enderror
                                            </div>
                                        </div>
                                    </div>
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
                               
                                <div class="form-group">
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input class="form-check-input"
                                                   type="checkbox"
                                                   id="family_friendly"
                                                   name="family_friendly"
                                                  
                                                />Family Friendly
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
        
            $("#keywords").select2({
                tags: true,
                tokenSeparators: [',', ' ']
            });
            
        });
        
    </script>
@endpush
