@extends('layouts.main_layout')


@section('my_contain')


<div class="bravo_search_space">
        <div class="bravo_banner" style="background-image: url(http://efarmhouses.pk/uploads/demo/space/banner-search-space-2.jpg)">
            <div class="container">
                <h1>
                    Search for farmhouses
                </h1>
            </div>
        </div>
        <div class="bravo_form_search">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-12">
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
                                    <div class="render check-in-render">12/16/2020</div>
                                    <span> - </span>
                                    <div class="render check-out-render">12/17/2020</div>
                                </div>
                            </div>
                            <input type="hidden" class="check-in-input" value="12/16/2020" name="start">
                            <input type="hidden" class="check-out-input" value="12/17/2020" name="end">
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
</form>                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
    <div class="col-lg-3 col-md-12">
        <div class="bravo_filter">
    <form action="http://efarmhouses.pk/en/farmhouse" class="bravo_form_filter">
                        <div class="filter-title">
            FILTER BY
        </div>
        <div class="g-filter-item">
            <div class="item-title">
                <h4>Filter Price</h4>
                <i class="fa fa-angle-up" aria-hidden="true"></i>
            </div>
            <div class="item-content">
                <div class="bravo-filter-price">
                                        <span class="irs irs--flat js-irs-0 irs-with-grid"><span class="irs"><span class="irs-line" tabindex="0"></span><span class="irs-min" style="visibility: hidden;"> ₨150</span><span class="irs-max" style="visibility: hidden;"> ₨50 000</span><span class="irs-from" style="visibility: visible; left: -5.9089%;"> ₨150</span><span class="irs-to" style="visibility: visible; left: 82.9922%;"> ₨50 000</span><span class="irs-single" style="visibility: hidden; left: 27.2081%;"> ₨150 —  ₨50 000</span></span><span class="irs-grid" style="width: 92.4883%; left: 3.65587%;"><span class="irs-grid-pol" style="left: 0%"></span><span class="irs-grid-text js-grid-text-0" style="left: 0%; margin-left: -4.9369%;">150</span><span class="irs-grid-pol small" style="left: 20%"></span><span class="irs-grid-pol small" style="left: 15%"></span><span class="irs-grid-pol small" style="left: 10%"></span><span class="irs-grid-pol small" style="left: 5%"></span><span class="irs-grid-pol" style="left: 25%"></span><span class="irs-grid-text js-grid-text-1" style="left: 25%; visibility: visible; margin-left: -7.87117%;">12 613</span><span class="irs-grid-pol small" style="left: 45%"></span><span class="irs-grid-pol small" style="left: 40%"></span><span class="irs-grid-pol small" style="left: 35%"></span><span class="irs-grid-pol small" style="left: 30%"></span><span class="irs-grid-pol" style="left: 50%"></span><span class="irs-grid-text js-grid-text-2" style="left: 50%; visibility: visible; margin-left: -7.87117%;">25 075</span><span class="irs-grid-pol small" style="left: 70%"></span><span class="irs-grid-pol small" style="left: 65%"></span><span class="irs-grid-pol small" style="left: 60%"></span><span class="irs-grid-pol small" style="left: 55%"></span><span class="irs-grid-pol" style="left: 75%"></span><span class="irs-grid-text js-grid-text-3" style="left: 75%; visibility: visible; margin-left: -7.87117%;">37 538</span><span class="irs-grid-pol small" style="left: 95%"></span><span class="irs-grid-pol small" style="left: 90%"></span><span class="irs-grid-pol small" style="left: 85%"></span><span class="irs-grid-pol small" style="left: 80%"></span><span class="irs-grid-pol" style="left: 100%"></span><span class="irs-grid-text js-grid-text-4" style="left: 100%; margin-left: -7.87117%;">50 000</span></span><span class="irs-bar" style="left: 3.75587%; width: 92.4883%;"></span><span class="irs-shadow shadow-from" style="display: none;"></span><span class="irs-shadow shadow-to" style="display: none;"></span><span class="irs-handle from" style="left: 0%;"><i></i><i></i><i></i></span><span class="irs-handle to" style="left: 92.4883%;"><i></i><i></i><i></i></span></span><input type="hidden" class="filter-price" name="price_range" data-symbol=" ₨" data-min="150.00" data-max="50000.00" data-from="150.00" data-to="50000.00" readonly="" value="150;50000" tabindex="-1">
                    <button type="submit" class="btn btn-link btn-apply-price-range">APPLY</button>
                </div>
            </div>
        </div>
                                        <div class="g-filter-item">
                <div class="item-title">
                    <h4> Amenities </h4>
                    <i class="fa fa-angle-up" aria-hidden="true"></i>
                </div>
                <div class="item-content">
                    <ul>
                                                                                <li>
                                <div class="bravo-checkbox">
                                    <label>
                                        <input type="checkbox" name="terms[]" value="21"> Air-conditioned
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                            </li>
                                                                                <li>
                                <div class="bravo-checkbox">
                                    <label>
                                        <input type="checkbox" name="terms[]" value="22"> Attached Bathroom
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                            </li>
                                                                                <li>
                                <div class="bravo-checkbox">
                                    <label>
                                        <input type="checkbox" name="terms[]" value="23"> Baby Pool
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                            </li>
                                                                                <li class="hide">
                                <div class="bravo-checkbox">
                                    <label>
                                        <input type="checkbox" name="terms[]" value="24"> Backup Generator
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                            </li>
                                                                                <li class="hide">
                                <div class="bravo-checkbox">
                                    <label>
                                        <input type="checkbox" name="terms[]" value="25"> BBQ Area
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                            </li>
                                                                                <li class="hide">
                                <div class="bravo-checkbox">
                                    <label>
                                        <input type="checkbox" name="terms[]" value="26"> Bedroom
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                            </li>
                                                                                <li class="hide">
                                <div class="bravo-checkbox">
                                    <label>
                                        <input type="checkbox" name="terms[]" value="27"> Cricket pitch
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                            </li>
                                                                                <li class="hide">
                                <div class="bravo-checkbox">
                                    <label>
                                        <input type="checkbox" name="terms[]" value="28"> Gas Cylinder
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                            </li>
                                                                                <li class="hide">
                                <div class="bravo-checkbox">
                                    <label>
                                        <input type="checkbox" name="terms[]" value="29"> Kids playing Area
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                            </li>
                                                                                <li class="hide">
                                <div class="bravo-checkbox">
                                    <label>
                                        <input type="checkbox" name="terms[]" value="30"> Kitchen
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                            </li>
                                                                                <li class="hide">
                                <div class="bravo-checkbox">
                                    <label>
                                        <input type="checkbox" name="terms[]" value="31"> Swimming pool
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                            </li>
                                                                                <li class="hide">
                                <div class="bravo-checkbox">
                                    <label>
                                        <input type="checkbox" name="terms[]" value="32"> TV Lounge
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                            </li>
                                                                                <li class="hide">
                                <div class="bravo-checkbox">
                                    <label>
                                        <input type="checkbox" name="terms[]" value="33"> Carrom
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                            </li>
                                                                                <li class="hide">
                                <div class="bravo-checkbox">
                                    <label>
                                        <input type="checkbox" name="terms[]" value="34"> Deep Freezer
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                            </li>
                                                                                <li class="hide">
                                <div class="bravo-checkbox">
                                    <label>
                                        <input type="checkbox" name="terms[]" value="35"> flooded light
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                            </li>
                                                                                <li class="hide">
                                <div class="bravo-checkbox">
                                    <label>
                                        <input type="checkbox" name="terms[]" value="36"> Foosball
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                            </li>
                                                                                <li class="hide">
                                <div class="bravo-checkbox">
                                    <label>
                                        <input type="checkbox" name="terms[]" value="37"> Garden
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                            </li>
                                                                                <li class="hide">
                                <div class="bravo-checkbox">
                                    <label>
                                        <input type="checkbox" name="terms[]" value="38"> Mini Zoo
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                            </li>
                                                                                <li class="hide">
                                <div class="bravo-checkbox">
                                    <label>
                                        <input type="checkbox" name="terms[]" value="39"> Security Guards
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                            </li>
                                                                                <li class="hide">
                                <div class="bravo-checkbox">
                                    <label>
                                        <input type="checkbox" name="terms[]" value="40"> Snooker
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                            </li>
                                                                                <li class="hide">
                                <div class="bravo-checkbox">
                                    <label>
                                        <input type="checkbox" name="terms[]" value="41"> Stove
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                            </li>
                                                                                <li class="hide">
                                <div class="bravo-checkbox">
                                    <label>
                                        <input type="checkbox" name="terms[]" value="42"> Swings
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                            </li>
                                                                                <li class="hide">
                                <div class="bravo-checkbox">
                                    <label>
                                        <input type="checkbox" name="terms[]" value="43"> Luxury Rooms
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                            </li>
                                                                                <li class="hide">
                                <div class="bravo-checkbox">
                                    <label>
                                        <input type="checkbox" name="terms[]" value="44"> Pool Slide
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                            </li>
                                                                                <li class="hide">
                                <div class="bravo-checkbox">
                                    <label>
                                        <input type="checkbox" name="terms[]" value="45"> Table tennis
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                            </li>
                                            </ul>
                                            <button type="button" class="btn btn-link btn-more-item">More <i class="fa fa-caret-down"></i></button>
                                    </div>
            </div>
            </form>
</div>


    </div>
    <div class="col-lg-9 col-md-12">
        <div class="bravo-list-item">
            <div class="topbar-search">
                <div class="text">
                    17 spaces found
                </div>
                <div class="control">

                </div>
            </div>
            <div class="list-item">
                <div class="row">
                                                                        <div class="col-lg-4 col-md-6">
                                <div class="item-loop ">
        <div class="thumb-image ">
        <a target="_blank" href="http://efarmhouses.pk/en/farmhouse/batla-farmhouse">
                                                <img class="img-responsive lazy loaded" data-src="http://efarmhouses.pk/uploads/0000/1/2020/10/03/22.jpg" alt="Batla Farmhouse" src="http://efarmhouses.pk/uploads/0000/1/2020/10/03/22.jpg" data-was-processed="true">
                                    </a>
            <div class="price-wrapper">
                <div class="price">
                    <span class="onsale">₨50.000</span>
                    <span class="text-price">₨30.000 <span class="unit">/day</span></span>
                </div>
            </div>
    </div>
    <div class="item-title">
        <a target="_blank" href="http://efarmhouses.pk/en/farmhouse/batla-farmhouse">
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
                                                    <div class="col-lg-4 col-md-6">
                                <div class="item-loop ">
            <div class="featured">
            Featured
        </div>
        <div class="thumb-image ">
        <a target="_blank" href="http://efarmhouses.pk/en/farmhouse/areej-farmhouse">
                                                <img class="img-responsive lazy loaded" data-src="http://efarmhouses.pk/uploads/0000/1/2020/10/03/42-600.jpg" alt="Areej Farmhouse" src="http://efarmhouses.pk/uploads/0000/1/2020/10/03/42-600.jpg" data-was-processed="true">
                                    </a>
            <div class="price-wrapper">
                <div class="price">
                    <span class="onsale"></span>
                    <span class="text-price">₨0 <span class="unit">/day</span></span>
                </div>
            </div>
    </div>
    <div class="item-title">
        <a target="_blank" href="http://efarmhouses.pk/en/farmhouse/areej-farmhouse">
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
                                                    <div class="col-lg-4 col-md-6">
                                <div class="item-loop ">
        <div class="thumb-image ">
        <a target="_blank" href="http://efarmhouses.pk/en/farmhouse/arabian-unit-1">
                                                <img class="img-responsive lazy loaded" data-src="http://efarmhouses.pk/uploads/0000/1/2020/10/03/6-600.jpg" alt="Arabian Unit 1" src="http://efarmhouses.pk/uploads/0000/1/2020/10/03/6-600.jpg" data-was-processed="true">
                                    </a>
            <div class="price-wrapper">
                <div class="price">
                    <span class="onsale">₨60.000</span>
                    <span class="text-price">₨50.000 <span class="unit">/day</span></span>
                </div>
            </div>
    </div>
    <div class="item-title">
        <a target="_blank" href="http://efarmhouses.pk/en/farmhouse/arabian-unit-1">
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
                                                    <div class="col-lg-4 col-md-6">
                                <div class="item-loop ">
        <div class="thumb-image ">
        <a target="_blank" href="http://efarmhouses.pk/en/farmhouse/al-shahab-farmhouse">
                                                <img class="img-responsive lazy loaded" data-src="http://efarmhouses.pk/uploads/0000/1/2020/10/03/29663065-1447838912009842-6630824964699733597-o-600.jpg" alt="Al Shahab Farmhouse" src="http://efarmhouses.pk/uploads/0000/1/2020/10/03/29663065-1447838912009842-6630824964699733597-o-600.jpg" data-was-processed="true">
                                    </a>
            <div class="price-wrapper">
                <div class="price">
                    <span class="onsale">₨50.000</span>
                    <span class="text-price">₨40.000 <span class="unit">/day</span></span>
                </div>
            </div>
    </div>
    <div class="item-title">
        <a target="_blank" href="http://efarmhouses.pk/en/farmhouse/al-shahab-farmhouse">
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
                                                    <div class="col-lg-4 col-md-6">
                                <div class="item-loop ">
        <div class="thumb-image ">
        <a target="_blank" href="http://efarmhouses.pk/en/farmhouse/raniya-farmhouse">
                                                <img class="img-responsive lazy loaded" data-src="http://efarmhouses.pk/uploads/0000/1/2020/10/02/3-600.jpg" alt="Raniya Farmhouse" src="http://efarmhouses.pk/uploads/0000/1/2020/10/02/3-600.jpg" data-was-processed="true">
                                    </a>
            <div class="price-wrapper">
                <div class="price">
                    <span class="onsale">₨40.000</span>
                    <span class="text-price">₨35.000 <span class="unit">/day</span></span>
                </div>
            </div>
    </div>
    <div class="item-title">
        <a target="_blank" href="http://efarmhouses.pk/en/farmhouse/raniya-farmhouse">
                        Raniya Farmhouse
        </a>
                    <div class="sale_info">12%</div>
            </div>
    <div class="location">
                                Dhabeji
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
                <i class="input-icon field-icon icofont-hotel"></i> 4
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
                                                    <div class="col-lg-4 col-md-6">
                                <div class="item-loop ">
        <div class="thumb-image ">
        <a target="_blank" href="http://efarmhouses.pk/en/farmhouse/dua-farmhouse">
                    </a>
            <div class="price-wrapper">
                <div class="price">
                    <span class="onsale">₨18.000</span>
                    <span class="text-price">₨16.000 <span class="unit">/day</span></span>
                </div>
            </div>
    </div>
    <div class="item-title">
        <a target="_blank" href="http://efarmhouses.pk/en/farmhouse/dua-farmhouse">
                        Dua farmhouse
        </a>
                    <div class="sale_info">11%</div>
            </div>
    <div class="location">
                                Malir Cant
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
                <i class="input-icon field-icon icofont-hotel"></i> 3
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
                                                    <div class="col-lg-4 col-md-6">
                                <div class="item-loop ">
            <div class="featured">
            Featured
        </div>
        <div class="thumb-image ">
        <a target="_blank" href="http://efarmhouses.pk/en/farmhouse/stay-greenwich-village">
                                                <img class="img-responsive lazy" data-src="http://efarmhouses.pk/uploads/demo/space/space-11.jpg" alt="STAY GREENWICH VILLAGE">
                                    </a>
            <div class="price-wrapper">
                <div class="price">
                    <span class="onsale">₨300</span>
                    <span class="text-price">₨150 <span class="unit">/day</span></span>
                </div>
            </div>
    </div>
    <div class="item-title">
        <a target="_blank" href="http://efarmhouses.pk/en/farmhouse/stay-greenwich-village">
                        STAY GREENWICH VILLAGE
        </a>
                    <div class="sale_info">50%</div>
            </div>
    <div class="location">
                                Los Angeles
            </div>
        <div class="service-review">
        <span class="rate">
             5.0/5  <span class="rate-text">Excellent</span>
        </span>
        <span class="review">
                             2 Reviews
                    </span>
    </div>
    <div class="amenities clearfix">



        
            
                
            
        


                <span class="amenity bed" data-toggle="tooltip" title="" data-original-title="No. Bed">
                <i class="input-icon field-icon icofont-hotel"></i> 3
            </span>
                            <span class="amenity bath" data-toggle="tooltip" title="" data-original-title="No. Bathroom">
                <i class="input-icon field-icon icofont-bathtub"></i> 5
            </span>
                            <span class="amenity size" data-toggle="tooltip" title="" data-original-title="Square">
                <i class="input-icon field-icon icofont-ruler-compass-alt"></i>127m<sup>2</sup>
            </span>
            </div>
</div>
                            </div>
                                                    <div class="col-lg-4 col-md-6">
                                <div class="item-loop ">
        <div class="thumb-image ">
        <a target="_blank" href="http://efarmhouses.pk/en/farmhouse/lily-dale-village">
                                                <img class="img-responsive lazy" data-src="http://efarmhouses.pk/uploads/demo/space/space-10.jpg" alt="LILY DALE VILLAGE">
                                    </a>
            <div class="price-wrapper">
                <div class="price">
                    <span class="onsale"></span>
                    <span class="text-price">₨250 <span class="unit">/day</span></span>
                </div>
            </div>
    </div>
    <div class="item-title">
        <a target="_blank" href="http://efarmhouses.pk/en/farmhouse/lily-dale-village">
                            <i class="fa fa-bolt d-none"></i>
                        LILY DALE VILLAGE
        </a>
            </div>
    <div class="location">
                                Los Angeles
            </div>
        <div class="service-review">
        <span class="rate">
             4.0/5  <span class="rate-text">Very Good</span>
        </span>
        <span class="review">
                             3 Reviews
                    </span>
    </div>
    <div class="amenities clearfix">



        
            
                
            
        


                <span class="amenity bed" data-toggle="tooltip" title="" data-original-title="No. Bed">
                <i class="input-icon field-icon icofont-hotel"></i> 5
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
                                                    <div class="col-lg-4 col-md-6">
                                <div class="item-loop ">
            <div class="featured">
            Featured
        </div>
        <div class="thumb-image ">
        <a target="_blank" href="http://efarmhouses.pk/en/farmhouse/luxury-single">
                                                <img class="img-responsive lazy" data-src="http://efarmhouses.pk/uploads/demo/space/space-9.jpg" alt="LUXURY SINGLE">
                                    </a>
            <div class="price-wrapper">
                <div class="price">
                    <span class="onsale">₨400</span>
                    <span class="text-price">₨350 <span class="unit">/day</span></span>
                </div>
            </div>
    </div>
    <div class="item-title">
        <a target="_blank" href="http://efarmhouses.pk/en/farmhouse/luxury-single">
                            <i class="fa fa-bolt d-none"></i>
                        LUXURY SINGLE
        </a>
                    <div class="sale_info">12%</div>
            </div>
    <div class="location">
                                Los Angeles
            </div>
        <div class="service-review">
        <span class="rate">
             5.0/5  <span class="rate-text">Excellent</span>
        </span>
        <span class="review">
                             2 Reviews
                    </span>
    </div>
    <div class="amenities clearfix">



        
            
                
            
        


                <span class="amenity bed" data-toggle="tooltip" title="" data-original-title="No. Bed">
                <i class="input-icon field-icon icofont-hotel"></i> 7
            </span>
                            <span class="amenity bath" data-toggle="tooltip" title="" data-original-title="No. Bathroom">
                <i class="input-icon field-icon icofont-bathtub"></i> 1
            </span>
                            <span class="amenity size" data-toggle="tooltip" title="" data-original-title="Square">
                <i class="input-icon field-icon icofont-ruler-compass-alt"></i>127m<sup>2</sup>
            </span>
            </div>
</div>
                            </div>
                                                            </div>
            </div>
            <div class="bravo-pagination">
                <ul class="pagination" role="navigation">
        
                    <li class="page-item disabled" aria-disabled="true" aria-label="« Previous">
                <span class="page-link" aria-hidden="true">‹</span>
            </li>
        
        
                    
            
            
                                                                        <li class="page-item active" aria-current="page"><span class="page-link">1</span></li>
                                                                                <li class="page-item"><a class="page-link" href="http://efarmhouses.pk/en/farmhouse?url=en%2Ffarmhouse&amp;page=2">2</a></li>
                                                        
        
                    <li class="page-item">
                <a class="page-link" href="http://efarmhouses.pk/en/farmhouse?url=en%2Ffarmhouse&amp;page=2" rel="next" aria-label="Next »">›</a>
            </li>
            </ul>

                                    <span class="count-string">Showing 1 - 9 of 17 Spaces</span>
                            </div>
        </div>
    </div>
</div>        </div>
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
                                <input type="hidden" name="_token" value="bJelbBdqBk3TiVqIYg0PCpF0M8iCVWSNOoGC7NfH">                                <div class="form-group">
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