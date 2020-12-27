@extends('layouts.main_layout')


@section('my_contain')



                    <div class="page-template-content">
            <div class="bravo-form-search-space" style="background-image: linear-gradient(0deg,rgba(0, 0, 0, 0.2),rgba(0, 0, 0, 0.2)),url('http://efarmhouses.pk/uploads/demo/space/banner-search-space.jpg') !important">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="text-heading text-center">Find Best Farmhouses</h1>
                <div class="sub-heading text-center">Book incredible farmhouses to relaxtainment around the Pakistan.</div>
                <div class="g-form-control">
                    <form action="http://efarmhouses.pk/en/farmhouse" class="form bravo_form" method="get">
    <div class="g-field-search">
        <div class="row">
            <div class="col-md-6 border-right">
                <div class="form-group">
                    <i class="field-icon fa icofont-map"></i>
                    <div class="form-content">
                        <div class="dropdown">
                            <label>Destination</label>
                            <select name="location_id" class="form-control">
                                <option value="">Where are you going?</option>
                                <option value="9"> Karachi</option><option value="10">- Dhabeji</option><option value="11">- Malir Cant</option><option value="12">- Gadap</option><option value="13">- Hawke's Bay</option><option value="14">- Super Highway / Toll Plaza</option>                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 border-right">
                <div class="form-group">
                    <i class="field-icon icofont-wall-clock"></i>
                    <div class="form-content">
                        <div class="form-date-search">
                            <div class="date-wrapper">
                                <div class="check-in-wrapper">
                                    <label>From - To</label>
                                    <div class="render check-in-render">12/15/2020</div>
                                    <span> - </span>
                                    <div class="render check-out-render">12/16/2020</div>
                                </div>
                            </div>
                            <input type="hidden" class="check-in-input" value="12/15/2020" name="start">
                            <input type="hidden" class="check-out-input" value="12/16/2020" name="end">
                            <input type="text" class="check-in-out" name="date" value="">
                        </div>
                    </div>
                </div>
            </div>
            <div style="display: none">


            <div class="col-md-4 border-right dropdown form-select-guests">
                <div class="form-group">
                    <i class="field-icon icofont-travelling"></i>
                    <div class="form-content dropdown-toggle" data-toggle="dropdown">
                        <div class="wrapper-more">
                            <label>Guests</label>
                                                        <div class="render">
                                <span class="adults"><span class="one ">1 Adult</span> <span class=" d-none  multi" data-html=":count Adults">1 Adults</span></span>
                                -
                                <span class="children">
                            <span class="one " data-html=":count Child">0 Child</span>
                            <span class="multi  d-none " data-html=":count Children">0 Children</span>
                        </span>
                            </div>
                        </div>
                    </div>
                    <div class="dropdown-menu select-guests-dropdown">
                        <input type="hidden" name="adults" value="1" min="1" max="20">
                        <input type="hidden" name="children" value="0" min="0" max="20">
                        <div class="dropdown-item-row">
                            <div class="label">Adults</div>
                            <div class="val">
                                <span class="btn-minus" data-input="adults"><i class="icon ion-md-remove"></i></span>
                                <span class="count-display">1</span>
                                <span class="btn-add" data-input="adults"><i class="icon ion-ios-add"></i></span>
                            </div>
                        </div>
                        <div class="dropdown-item-row">
                            <div class="label">Children</div>
                            <div class="val">
                                <span class="btn-minus" data-input="children"><i class="icon ion-md-remove"></i></span>
                                <span class="count-display">0</span>
                                <span class="btn-add" data-input="children"><i class="icon ion-ios-add"></i></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>


    <div class="g-button-submit">
        <button class="btn btn-primary btn-search" type="submit">Search</button>
    </div>
</form>                </div>
            </div>
        </div>
    </div>
</div><div class="container">
    <div class="bravo-list-space layout_carousel">
        <div class="title">
            Recommended Farmhouses
        </div>
                    <div class="sub-title">
                Farmhouses highly rated for thoughtful design
            </div>
                <div class="list-item">
                                        <div class="owl-carousel owl-loaded owl-drag">
                                            
                                            
                                            
                                            
                                            
                <div class="owl-stage-outer">
                    <div class="owl-stage" style="transform: translate3d(0px, 0px, 0px); transition: all 0s ease 0s; width: 1875px;">


                    @foreach($featuredFarmHouse as $featuredFarmHouse)
                        
                        <div class="owl-item active" style="width: 360px; margin-right: 15px;">
                        <div class="item-loop ">
                            <div class="thumb-image ">
                                <a href="{{ route('farmHouse.show', ['slug'=>$featuredFarmHouse->slug]) }}">
                                    <img class="img-responsive lazy loaded" data-src="http://efarmhouses.pk/uploads/demo/space/space-1.jpg" alt="LUXURY STUDIO" src="http://efarmhouses.pk/uploads/demo/space/space-1.jpg" data-was-processed="true">
                                </a>
                                <div class="price-wrapper">
                                    <div class="price">
                                        @if($featuredFarmHouse->sale_price)
                                        <span class="onsale">Rs $featuredFarmHouse->sale_price</span>
                                        @endif

                                        <span class="text-price">Rs{{$featuredFarmHouse->price}}<span class="unit">/day</span></span>
                                    </div>
                                </div>
                            </div>

                            <div class="item-title">
                                <a href="{{ route('farmHouse.show', ['slug'=>$featuredFarmHouse->slug]) }}">
                                    <i class="fa fa-bolt d-none"></i>{{$featuredFarmHouse->title}}
                                </a>
                                <div class="sale_info">10%</div>
                            </div>
                            <div class="location">
                                {{$featuredFarmHouse->location_address}}
                            </div>
        
                            <div class="service-review">
                                <span class="rate">
                                     5.0/5  <span class="rate-text">Excellent</span>
                                </span>
                                <span class="review">2 Reviews</span>
                            </div>
    
                            <div class="amenities clearfix">
                                <span class="amenity bed" data-toggle="tooltip" title="" data-original-title="No. Bed">
                                    <i class="input-icon field-icon icofont-hotel"></i> 6
                                </span>
                                <span class="amenity bath" data-toggle="tooltip" title="" data-original-title="No. Bathroom">
                                    <i class="input-icon field-icon icofont-bathtub"></i> 9
                                </span>
                                <span class="amenity size" data-toggle="tooltip" title="" data-original-title="Square">
                                    <i class="input-icon field-icon icofont-ruler-compass-alt"></i>127m<sup>2</sup>
                                </span>
                            </div>
                        
                        </div>
                        </div>


                    @endforeach

      
</div></div><div class="owl-nav disabled"><button type="button" role="presentation" class="owl-prev"><span aria-label="Previous"></span></button><button type="button" role="presentation" class="owl-next"><span aria-label="Next"></span></button></div><div class="owl-dots"><button role="button" class="owl-dot active"><span></span></button><button role="button" class="owl-dot"><span></span></button></div></div>
                    </div>
    </div>
</div><div class="bravo-featured-box">
        <div class="container">
            <div class="title">
                Find a Farmhouse Type
            </div>
                            <div class="sub-title">
                    It is a long established fact that a reader
                </div>
                        <div class="row">
                            </div>
        </div>
    </div>


    
<div class="container">
    <div class="bravo-list-locations  style_2 ">
        <div class="title">
            Top Destinations
        </div>
                    <div class="sub-title">
                It is a long established fact that a farmhouses are best to have fun and soul peace
            </div>
                <div class="list-item">
            <div class="row">
                                                        <div class="col-lg-4">
                        <div class="destination-item ">
    <a href="http://efarmhouses.pk/en/farmhouse?location_id=14">
        <div class="image" style="background: url(http://efarmhouses.pk/uploads/0000/1/2020/09/29/super-highway.png)">
            <div class="effect"></div>
            <div class="content">
                <h4 class="title">Super Highway / Toll Plaza</h4>
                            </div>
        </div>
    </a>
</div>                    </div>
                                                        <div class="col-lg-4">
                        <div class="destination-item ">
    <a href="http://efarmhouses.pk/en/farmhouse?location_id=13">
        <div class="image" style="background: url(http://efarmhouses.pk/uploads/0000/1/2020/09/29/hawks.png)">
            <div class="effect"></div>
            <div class="content">
                <h4 class="title">Hawke's Bay</h4>
                            </div>
        </div>
    </a>
</div>                    </div>
                                                        <div class="col-lg-4">
                        <div class="destination-item ">
    <a href="http://efarmhouses.pk/en/farmhouse?location_id=12">
        <div class="image" style="background: url(http://efarmhouses.pk/uploads/0000/1/2020/09/29/gadap.png)">
            <div class="effect"></div>
            <div class="content">
                <h4 class="title">Gadap</h4>
                            </div>
        </div>
    </a>
</div>                    </div>
                                                        <div class="col-lg-4">
                        <div class="destination-item ">
    <a href="http://efarmhouses.pk/en/farmhouse?location_id=11">
        <div class="image" style="background: url(http://efarmhouses.pk/uploads/0000/1/2020/09/29/malir.png)">
            <div class="effect"></div>
            <div class="content">
                <h4 class="title">Malir Cant</h4>
                            </div>
        </div>
    </a>
</div>                    </div>
                                                        <div class="col-lg-4">
                        <div class="destination-item ">
    <a href="http://efarmhouses.pk/en/farmhouse?location_id=10">
        <div class="image" style="background: url(http://efarmhouses.pk/uploads/0000/1/2020/09/29/dhabeji.png)">
            <div class="effect"></div>
            <div class="content">
                <h4 class="title">Dhabeji</h4>
                            </div>
        </div>
    </a>
</div>                    </div>
                                                        <div class="col-lg-4">
                        <div class="destination-item ">
    <a href="http://efarmhouses.pk/en/farmhouse?location_id=9">
        <div class="image" style="background: url(http://efarmhouses.pk/uploads/0000/1/2020/09/29/karachi.png)">
            <div class="effect"></div>
            <div class="content">
                <h4 class="title">Karachi</h4>
                            </div>
        </div>
    </a>
</div>                    </div>
                            </div>
        </div>
    </div>
</div><div class="container">
    <div class="bravo-list-space layout_normal">
        <div class="title">
             Farmhouse Listing
        </div>
                    <div class="sub-title">
                Homes highly rated for thoughtful design
            </div>
                <div class="list-item">
                            <div class="row">
                                            <div class="col-lg-3 col-md-6">
                            <div class="item-loop ">
        <div class="thumb-image ">
        <a href="http://efarmhouses.pk/en/farmhouse/batla-farmhouse">
                                                <img class="img-responsive lazy" data-src="http://efarmhouses.pk/uploads/0000/1/2020/10/03/22.jpg" alt="Batla Farmhouse">
                                    </a>
            <div class="price-wrapper">
                <div class="price">
                    <span class="onsale">Rs50.000</span>
                    <span class="text-price">Rs30.000 <span class="unit">/day</span></span>
                </div>
            </div>
    </div>
    <div class="item-title">
        <a href="http://efarmhouses.pk/en/farmhouse/batla-farmhouse">
                        Batla Farmhouse
        </a>
                    <div class="sale_info">40%</div>
            </div>
    <div class="location">
                                Gadap
            </div>
        <div class="service-review">
        <span class="rate">
             <span class="rate-text">Not rate</span>
        </span>
        <span class="review">
                             0 Review
                    </span>
    </div>
    <div class="amenities clearfix">



        
            
                
            
        


                <span class="amenity bed" data-toggle="tooltip" title="" data-original-title="No. Bed">
                <i class="input-icon field-icon icofont-hotel"></i> 5
            </span>
                            <span class="amenity bath" data-toggle="tooltip" title="" data-original-title="No. Bathroom">
                <i class="input-icon field-icon icofont-bathtub"></i> 2
            </span>
                            <span class="amenity size" data-toggle="tooltip" title="" data-original-title="Square">
                <i class="input-icon field-icon icofont-ruler-compass-alt"></i>127m<sup>2</sup>
            </span>
            </div>
</div>
                        </div>
                                            <div class="col-lg-3 col-md-6">
                            <div class="item-loop ">
            <div class="featured">
            Featured
        </div>
        <div class="thumb-image ">
        <a href="http://efarmhouses.pk/en/farmhouse/areej-farmhouse">
                                                <img class="img-responsive lazy" data-src="http://efarmhouses.pk/uploads/0000/1/2020/10/03/42-600.jpg" alt="Areej Farmhouse">
                                    </a>
            <div class="price-wrapper">
                <div class="price">
                    <span class="onsale"></span>
                    <span class="text-price">Rs0 <span class="unit">/day</span></span>
                </div>
            </div>
    </div>
    <div class="item-title">
        <a href="http://efarmhouses.pk/en/farmhouse/areej-farmhouse">
                        Areej Farmhouse
        </a>
            </div>
    <div class="location">
            </div>
        <div class="service-review">
        <span class="rate">
             <span class="rate-text">Not rate</span>
        </span>
        <span class="review">
                             0 Review
                    </span>
    </div>
    <div class="amenities clearfix">



        
            
                
            
        


                        </div>
</div>
                        </div>
                                            <div class="col-lg-3 col-md-6">
                            <div class="item-loop ">
        <div class="thumb-image ">
        <a href="http://efarmhouses.pk/en/farmhouse/arabian-unit-1">
                                                <img class="img-responsive lazy" data-src="http://efarmhouses.pk/uploads/0000/1/2020/10/03/6-600.jpg" alt="Arabian Unit 1">
                                    </a>
            <div class="price-wrapper">
                <div class="price">
                    <span class="onsale">Rs60.000</span>
                    <span class="text-price">Rs50.000 <span class="unit">/day</span></span>
                </div>
            </div>
    </div>
    <div class="item-title">
        <a href="http://efarmhouses.pk/en/farmhouse/arabian-unit-1">
                        Arabian Unit 1
        </a>
                    <div class="sale_info">16%</div>
            </div>
    <div class="location">
                                Gadap
            </div>
        <div class="service-review">
        <span class="rate">
             <span class="rate-text">Not rate</span>
        </span>
        <span class="review">
                             0 Review
                    </span>
    </div>
    <div class="amenities clearfix">



        
            
                
            
        


                <span class="amenity bed" data-toggle="tooltip" title="" data-original-title="No. Bed">
                <i class="input-icon field-icon icofont-hotel"></i> 10
            </span>
                            <span class="amenity bath" data-toggle="tooltip" title="" data-original-title="No. Bathroom">
                <i class="input-icon field-icon icofont-bathtub"></i> 4
            </span>
                            <span class="amenity size" data-toggle="tooltip" title="" data-original-title="Square">
                <i class="input-icon field-icon icofont-ruler-compass-alt"></i>127m<sup>2</sup>
            </span>
            </div>
</div>
                        </div>
                                            <div class="col-lg-3 col-md-6">
                            <div class="item-loop ">
        <div class="thumb-image ">
        <a href="http://efarmhouses.pk/en/farmhouse/al-shahab-farmhouse">
                                                <img class="img-responsive lazy" data-src="http://efarmhouses.pk/uploads/0000/1/2020/10/03/29663065-1447838912009842-6630824964699733597-o-600.jpg" alt="Al Shahab Farmhouse">
                                    </a>
            <div class="price-wrapper">
                <div class="price">
                    <span class="onsale">Rs50.000</span>
                    <span class="text-price">Rs40.000 <span class="unit">/day</span></span>
                </div>
            </div>
    </div>
    <div class="item-title">
        <a href="http://efarmhouses.pk/en/farmhouse/al-shahab-farmhouse">
                        Al Shahab Farmhouse
        </a>
                    <div class="sale_info">20%</div>
            </div>
    <div class="location">
                                Gadap
            </div>
        <div class="service-review">
        <span class="rate">
             <span class="rate-text">Not rate</span>
        </span>
        <span class="review">
                             0 Review
                    </span>
    </div>
    <div class="amenities clearfix">


                <span class="amenity bed" data-toggle="tooltip" title="" data-original-title="No. Bed">
                <i class="input-icon field-icon icofont-hotel"></i> 5
            </span>
                            <span class="amenity bath" data-toggle="tooltip" title="" data-original-title="No. Bathroom">
                <i class="input-icon field-icon icofont-bathtub"></i> 3
            </span>
                            <span class="amenity size" data-toggle="tooltip" title="" data-original-title="Square">
                <i class="input-icon field-icon icofont-ruler-compass-alt"></i>127m<sup>2</sup>
            </span>
            </div>
</div>
                        </div>
                                    </div>
                                </div>
    </div>
</div><div class="bravo-call-to-action">
    <div class="container">
        <div class="context">
            <div class="row">
                <div class="col-md-8">
                    <div class="title">
                        Know your city?
                    </div>
                    <div class="sub_title">
                        Join 2000+ locals contributors from 120 cities
                    </div>
                </div>
                <div class="col-md-4">
                                            <a class="btn-more" href="#">
                            Become Local Expert
                        </a>
                                    </div>
            </div>
        </div>
    </div>
</div>

        </div>
            <div class="bravo_footer">
    <div class="mailchimp">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-lg-10 col-lg-offset-1">
                    <div class="row">
                        <div class="col-xs-12  col-md-7 col-lg-6">
                            <div class="media ">
                                <div class="media-left hidden-xs">
                                    <i class="icofont-island-alt"></i>
                                </div>
                                <div class="media-body">
                                    <h4 class="media-heading">Get Updates &amp; More</h4>
                                    <p>Thoughtful thoughts to your inbox</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-md-5 col-lg-6">
                            <form action="http://efarmhouses.pk/en/newsletter/subscribe" class="subcribe-form bravo-subscribe-form bravo-form">
                                <input type="hidden" name="_token" value="gth46RLoZbmvS515h76Q3ZbsHwYAKq23ExcKCG4e">                                <div class="form-group">
                                    <input type="text" name="email" class="form-control email-input" placeholder="Your Email">
                                    <button type="submit" class="btn-submit">Subscribe
                                        <i class="fa fa-spinner fa-pulse fa-fw"></i>
                                    </button>
                                </div>
                                <div class="form-mess"></div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
@endsection








