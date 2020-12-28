@extends('admin.app')
@section('title') {{ $pageTitle }} @endsection
@section('content')

<style>
.select2-container{
    width: 100% !important;
}
</style>
    <div class="app-title">
        <div>
            <h1><i class="fa fa-briefcase"></i> {{ $pageTitle }}</h1>
        </div>
    </div>
    @include('admin.partials.flash')
    <div class="row">
        <div class="col-md-8 mx-auto">
            <div class="tile">
                <h3 class="tile-title">{{ $subTitle }}</h3>
                <form action="{{ route('admin.couponAndDeals.store') }}" method="POST" role="form" enctype="multipart/form-data">
                    @csrf
                    <div class="tile-body">

                        <div class="form-group">
                            <label class="control-label" for="name">COUPON OR DEAL <span class="m-l-5 text-danger">*</span></label>
                            <select class="form-control @error('type') is-invalid @enderror" name="type" id="type" value="{{ old('type') }}">
                                <option value="">select</option>
                                <option value="coupon">Coupon</option>
                                <option value="deal">Deal</option>
                            </select>
                            @error('couponapplyfor') {{ $message }} @enderror
                        </div>  
                        
                        <div class="form-group couponcode" style="display: none;">
                            <label class="control-label" for="title">Coupon Code<span class="m-l-5 text-danger"> *</span></label>
                            <input class="form-control @error('code') is-invalid @enderror" type="text" name="code" id="code" value="{{ old('code') }}"/>
                            @error('code') {{ $message }} @enderror
                        </div>

                        <div class="form-group quantity" style="display: none;">
                            <label class="control-label" for="quantity">Coupons Quantity<span class="m-l-5 text-danger"> *</span></label>
                            <input class="form-control @error('quantity') is-invalid @enderror" type="number" name="quantity" id="quantity" value="{{ old('quantity') }}"/>
                            @error('quantity') {{ $message }} @enderror
                        </div>
                        
                        <div class="form-group banner" style="display: none;">
                            <label class="control-label">Banner</label>
                            <input class="form-control @error('banner') is-invalid @enderror" type="file" id="banner" name="banner"/>
                            @error('banner') {{ $message }} @enderror
                        </div>

                        <div class="form-group">
                            <label class="control-label" for="title">Title<span class="m-l-5 text-danger"> *</span></label>
                            <input class="form-control @error('title') is-invalid @enderror" type="text" name="title" id="title" value="{{ old('title') }}"/>
                            @error('title') {{ $message }} @enderror
                        </div>

                        <div class="form-group">
                            <label class="control-label" for="name">Description <span class="m-l-5 text-danger"> *</span></label>
                            <input class="form-control @error('description') is-invalid @enderror" type="text" name="description" id=description value="{{ old('description') }}"/>
                            @error('description') {{ $message }} @enderror
                        </div>  

                        <div class="form-group">
                            <label class="control-label" for="name"> Apply at <span class="m-l-5 text-danger"> *</span></label>
                            <select class="form-control @error('apply_at') is-invalid @enderror" name="apply_at" id="couponapplyfor" value="{{ old('apply_at') }}">
                                   <option value="">select</option>
                                    <option value="product">Product</option>
                                    <option value="category">Category</option>
                                    <option value="cart">Cart</option>
                                </select>
                                @error('couponapplyfor') {{ $message }} @enderror
                                @error('products') {{ $message }} @enderror
                                @error('cart') {{ $message }} @enderror
                                @error('categoies') {{ $message }} @enderror
                        </div>  

                         <div class="form-group"  style="display: none" id="cdropdown">
                                    <label class="control-label" for="categories">Categories</label>
                                    <select name="categories[]" id="categories" class="form-control" multiple>
                                         <option value="">selet product</option>
                                           @foreach($categories as $category)
                                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                                            @endforeach     
                                    </select>
                         </div>
                        <div class="form-group " style="display: none" id="pdropdown">
                                    <label class="control-label" for="products">Products</label>
                                    <select name="products[]" id="products" class="form-control" multiple>
                                       <option value="">selet category</option>
                                       @foreach($products as $product )
                                            <option value="{{ $product->id }}">{{ $product->name }}</option>
                                        @endforeach
                                    </select>
                         </div>


                        <div class="form-group row " style="display: none" id="carttotal">
                                    <div class="col-md-4">
                                        <label class="control-label" for="operator">Cart Total</label>
                                    </div>
                                    <div class="col-md-8">
                                        <input type="hidden" name="cart" >
                                        <input type="number" name="min_cart_limit" class="form-control" placeholder="total">
                                    </div>

                         </div>

                        <div class="form-group">
                            <label class="control-label" for="name">Discount Type <span class="m-l-5 text-danger"> *</span></label>
                            <select class="form-control @error('discount_type') is-invalid @enderror" name="discount_type" id="coupontype" value="{{ old('discount_type') }}">
                                <option value="fixed">Fixed Price</option>
                                <option value="percentage">Percentage</option>

                            </select>
                            @error('discount_type') {{ $message }} @enderror
                        </div> 

                        <div class="form-group">
                            <label class="control-label" for="name">Value <span class="m-l-5 text-danger"> *</span></label>
                            <input class="form-control @error('value') is-invalid @enderror" type="text" name="value" id="price" value="{{ old('value') }}"/>
                            @error('value') {{ $message }} @enderror
                        </div> 

                        <div class="form-group">
                            <label class="control-label" for="name">Expire at <span class="m-l-5 text-danger"> *</span></label>
                            <input class="form-control @error('expire_at') is-invalid @enderror" type="date" name="expire_at" id="price" value="{{ old('expire_at') }}"/>
                            @error('expire_at') {{ $message }} @enderror
                        </div> 
                      
                        <div class="form-group">
                            
                            <input class="@error('status') is-invalid @enderror" type="checkbox" id="status" name="status" />&nbsp;&nbsp;<label class="control-label" for="status">Active </label>
                            @error('status') {{ $message }} @enderror
                        </div>
                    </div>
                    <div class="tile-footer">
                        <button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Save Banner</button>
                        &nbsp;&nbsp;&nbsp;
                        <a class="btn btn-secondary" href="{{ route('admin.couponAndDeals.index') }}"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@push('scripts')

 <script type="text/javascript" src="{{ asset('backend/js/plugins/select2.min.js') }}"></script>
    <script>
        $( document ).ready(function() {
            $('#categories').select2();
            $('#products').select2();


             $("#type").change(function(){
                
                var type = $(this).val();
               
                if(type == 'coupon')
                {
                    $('.couponcode').show();
                    $('.quantity').show();
                    $('.banner').hide();


                    $('#couponapplyfor').html('<option value="cart">Cart</option>');
                    $('#couponapplyfor').trigger('change');


                }
                else if(type == 'deal')
                {
                    $('.couponcode').hide();
                    $('.quantity').hide();
                    $('.banner').show();
                    $('#couponapplyfor').html('<option value="">select</option><option value="product">Product</option> <option value="category">Category</option><option value="cart">Cart</option>');
                }
             

            });



            $("#couponapplyfor").change(function(){
                
                var applyfor = $(this).val();
               
                if(applyfor == 'product')
                {

                    $('#pdropdown').show();
                    $('#cdropdown').hide();
                    $('#carttotal').hide();
                }
                else if(applyfor == 'category')
                {
                    $('#pdropdown').hide();
                    $('#cdropdown').show();
                    $('#carttotal').hide();
                }
                else if(applyfor == 'cart')
                {

                     $('#pdropdown').hide();
                    $('#cdropdown').hide();
                    $('#carttotal').show();

                }
                else{

                    $('#pdropdown').hide();
                    $('#cdropdown').hide();
                    $('#carttotal').hide();
                }
                // categoriesdropdown
                // productsdropdwon
                // carttotal


            });

            $("#coupontype").change(function(){
                
                var pricetype = $(this).val();
               
                if(pricetype == 'percentage')
                {

                      $("#couponprice").attr({
                           "max" : 100,        // substitute your own
                           "min" : 1          // values (or variables) here
                        });



                }
                else
                {

                    $('#couponprice').removeAttr('max');
                    $('#couponprice').removeAttr('min');
                   
                }
                // categoriesdropdown
                // productsdropdwon
                // carttotal


            });



          

        });
    </script>

@endpush
