@extends('layouts.main_layout')

@section('my_contain')


<!-- 
<div class="bravo_detail_space">
                <div class="bravo_content">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-lg-9">
                                                <div class="g-header">
    <div class="left">
        <h2>{{$farmHouse[0]->title}}</h2>
            </div>
    <div class="right">
                    <div class="review-score">
                <span class="head-rating">Not Rate</span>
                <div class="list-star">
                    <ul class="booking-item-rating-stars">
                        <li><i class="fa fa-star-o"></i></li>
                        <li><i class="fa fa-star-o"></i></li>
                        <li><i class="fa fa-star-o"></i></li>
                        <li><i class="fa fa-star-o"></i></li>
                        <li><i class="fa fa-star-o"></i></li>
                    </ul>
                    <div class="booking-item-rating-stars-active" style="width: 0%">
                        <ul class="booking-item-rating-stars">
                            <li><i class="fa fa-star"></i></li>
                            <li><i class="fa fa-star"></i></li>
                            <li><i class="fa fa-star"></i></li>
                            <li><i class="fa fa-star"></i></li>
                            <li><i class="fa fa-star"></i></li>
                        </ul>
                    </div>
                </div>
                <span>
                    from 0 reviews
                </span>
            </div>
            </div>
</div>
<div class="g-space-feature">
    <div class="row">
                    <div class="col-xs-6 col-lg-3 col-md-6">
                <div class="item">
                    <div class="icon">
                        <i class="icofont-hotel"></i>
                    </div>
                    <div class="info">
                        <h4 class="name">No. Bed</h4>
                        <p class="value">
                            4
                        </p>
                    </div>
                </div>
            </div>
                            <div class="col-xs-6 col-lg-3 col-md-6">
                <div class="item">
                    <div class="icon">
                        <i class="icofont-bathtub"></i>
                    </div>
                    <div class="info">
                        <h4 class="name">No. Bathroom</h4>
                        <p class="value">
                            2
                        </p>
                    </div>
                </div>
            </div>
                                <div class="col-xs-6 col-lg-3 col-md-6">
                <div class="item">
                    <div class="icon">
                        <i class="icofont-ruler-compass-alt"></i>
                    </div>
                    <div class="info">
                        <h4 class="name">Square</h4>
                        <p class="value">
                            127m<sup>2</sup>
                        </p>
                    </div>
                </div>
            </div>
                                            <div class="col-xs-6 col-lg-3 col-md-6">
                <div class="item">
                    <div class="icon">
                        <i class="icofont-island-alt"></i>
                    </div>
                    <div class="info">
                        <h4 class="name">Location</h4>
                        <p class="value">
                        {{$farmHouse[0]->location_address}}
                        </p>
                    </div>
                </div>
            </div>
            </div>
</div>
    <div class="g-gallery">
    <style>.fotorama1608546775460 .fotorama__nav--thumbs .fotorama__nav__frame{padding:15px;height:135px}
 .fotorama1608546775460 .fotorama__thumb-border{height:131px;border-width:2px;margin-top:15px}</style>
<div class="fotorama--hidden"></div>
		<div class="fotorama fotorama1608546775460" data-width="100%" data-thumbwidth="135" data-thumbheight="135" data-thumbmargin="15" data-nav="thumbs" data-allowfullscreen="true">
			<div class="fotorama__wrap fotorama__wrap--css3 fotorama__wrap--slide fotorama__wrap--toggle-arrows fotorama__wrap--no-controls" style="width: 100%; min-width: 0px; max-width: 100%;">
				<div class="fotorama__stage fotorama__pointer" style="width: 825px; height: 572px;"><div class="fotorama__fullscreen-icon" tabindex="0" role="button"></div>
					<div class="fotorama__stage__shaft" style="transition-duration: 0ms; transform: translate3d(0px, 0px, 0px); width: 825px; margin-left: 0px;">
						<div class="fotorama__stage__frame fotorama__active fotorama__loaded fotorama__loaded--img" style="left: 0px;">
							<img src="http://efarmhouses.pk/uploads/0000/1/2020/10/02/1.jpg" class="fotorama__img" style="width: 825px; height: 571.154px; left: 0px; top: 0.423077px;">
						</div>
						<div class="fotorama__stage__frame fotorama__loaded fotorama__loaded--img" style="left: 827px;">
							<img src="http://efarmhouses.pk/uploads/0000/1/2020/10/02/2.jpg" class="fotorama__img" style="width: 825px; height: 571.154px; left: 0px; top: 0.423077px;">
						</div>
					</div>
					<div class="fotorama__arr fotorama__arr--prev fotorama__arr--disabled" tabindex="-1" role="button" disabled="disabled"></div>
					<div class="fotorama__arr fotorama__arr--next" tabindex="0" role="button"></div>
					<div class="fotorama__video-close"></div>
				</div>
				
				<div class="fotorama__nav-wrap">
					<div class="fotorama__nav fotorama__nav--thumbs" style="width: 825px;">
						<div class="fotorama__nav__shaft" style="transition-duration: 0ms; transform: translate3d(0px, 0px, 0px);">
							<div class="fotorama__thumb-border" style="transition-duration: 0ms; transform: translate3d(0px, 0px, 0px); width: 131px;">
							</div>
							<div class="fotorama__nav__frame fotorama__nav__frame--thumb fotorama__active" tabindex="0" role="button" style="width: 135px;">
								<div class="fotorama__thumb fotorama__loaded fotorama__loaded--img">
									<img src="http://efarmhouses.pk/uploads/0000/1/2020/10/02/1-150.jpg" class="fotorama__img" style="width: 194.712px; height: 135px; left: -29.8558px; top: 0px;">
								</div>
							</div>
								
							<div class="fotorama__nav__frame fotorama__nav__frame--thumb" tabindex="0" role="button" style="width: 135px;">
								<div class="fotorama__thumb fotorama__loaded fotorama__loaded--img">
									<img src="http://efarmhouses.pk/uploads/0000/1/2020/10/02/2-150.jpg" class="fotorama__img" style="width: 194.712px; height: 135px; left: -29.8558px; top: 0px;">
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		
	</div>
    <div class="g-overview">
        <h3>Description</h3>
        <div class="description">
            <p><strong style="margin: 0px; padding: 0px; font-family: 'Open Sans', Arial, sans-serif; font-size: 14px; text-align: justify; background-color: #ffffff;">Lorem Ipsum</strong><span style="font-family: 'Open Sans', Arial, sans-serif; font-size: 14px; text-align: justify; background-color: #ffffff;">&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum</span></p>        </div>
    </div>
                        <div class="bravo-reviews">
        <h3>Reviews</h3>
                    <div class="review-box">
                <div class="row">
                    <div class="col-lg-5">
                        <div class="review-box-score">
                            <div class="review-score">
                                0<span class="per-total">/5</span>
                            </div>
                            <div class="review-score-text">
                                Not Rate
                            </div>
                            <div class="review-score-base">
                                Based on <span>
                                                                    0 review
                                                            </span></div>
                        </div>
                    </div>
                    <div class="col-lg-7">
                        <div class="review-sumary">
                                                                                                <div class="item">
                                        <div class="label">
                                            Excellent
                                        </div>
                                        <div class="progress">
                                            <div class="percent green" style="width: 0%"></div>
                                        </div>
                                        <div class="number">0</div>
                                    </div>
                                                                    <div class="item">
                                        <div class="label">
                                            Very Good
                                        </div>
                                        <div class="progress">
                                            <div class="percent green" style="width: 0%"></div>
                                        </div>
                                        <div class="number">0</div>
                                    </div>
                                                                    <div class="item">
                                        <div class="label">
                                            Average
                                        </div>
                                        <div class="progress">
                                            <div class="percent green" style="width: 0%"></div>
                                        </div>
                                        <div class="number">0</div>
                                    </div>
                                                                    <div class="item">
                                        <div class="label">
                                            Poor
                                        </div>
                                        <div class="progress">
                                            <div class="percent green" style="width: 0%"></div>
                                        </div>
                                        <div class="number">0</div>
                                    </div>
                                                                    <div class="item">
                                        <div class="label">
                                            Terrible
                                        </div>
                                        <div class="progress">
                                            <div class="percent green" style="width: 0%"></div>
                                        </div>
                                        <div class="number">0</div>
                                    </div>
                                                                                    </div>
                    </div>
                </div>
            </div>
                <div class="review-list">
                                                </div>
        <div class="review-pag-wrapper">
                            <div class="review-pag-text">No Review</div>
                    </div>
        <div class="review-form">
            <div class="title-form">
                Write a review
            </div>
            <div class="form-wrapper">
                                <form action="http://efarmhouses.pk/en/review" class="needs-validation" novalidate="" method="post">
                    <input type="hidden" name="_token" value="42WGbSVzrLw7GxfbcPcewrJx7QEQ91gFtF8WZ3zT">                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <input type="text" required="" class="form-control" name="review_title" placeholder="Title">
                                <div class="invalid-feedback">Review title is required</div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 col-md-8">
                            <div class="form-group">
                                <textarea name="review_content" required="" class="form-control" placeholder="Review content" minlength="10"></textarea>
                                <div class="invalid-feedback">
                                    Review content has at least 10 character
                                </div>
                            </div>
                        </div>
                                                                                <div class="col-xs-12 col-md-4">
                                <div class="form-group review-items">
                                                                            <div class="item">
                                            <label>Sleep</label>
                                            <input class="review_stats" type="hidden" name="review_stats[Sleep]">
                                            <div class="rates">
                                                <i class="fa fa-star-o grey"></i>
                                                <i class="fa fa-star-o grey"></i>
                                                <i class="fa fa-star-o grey"></i>
                                                <i class="fa fa-star-o grey"></i>
                                                <i class="fa fa-star-o grey"></i>
                                            </div>
                                        </div>
                                                                            <div class="item">
                                            <label>Location</label>
                                            <input class="review_stats" type="hidden" name="review_stats[Location]">
                                            <div class="rates">
                                                <i class="fa fa-star-o grey"></i>
                                                <i class="fa fa-star-o grey"></i>
                                                <i class="fa fa-star-o grey"></i>
                                                <i class="fa fa-star-o grey"></i>
                                                <i class="fa fa-star-o grey"></i>
                                            </div>
                                        </div>
                                                                            <div class="item">
                                            <label>Service</label>
                                            <input class="review_stats" type="hidden" name="review_stats[Service]">
                                            <div class="rates">
                                                <i class="fa fa-star-o grey"></i>
                                                <i class="fa fa-star-o grey"></i>
                                                <i class="fa fa-star-o grey"></i>
                                                <i class="fa fa-star-o grey"></i>
                                                <i class="fa fa-star-o grey"></i>
                                            </div>
                                        </div>
                                                                            <div class="item">
                                            <label>Clearness</label>
                                            <input class="review_stats" type="hidden" name="review_stats[Clearness]">
                                            <div class="rates">
                                                <i class="fa fa-star-o grey"></i>
                                                <i class="fa fa-star-o grey"></i>
                                                <i class="fa fa-star-o grey"></i>
                                                <i class="fa fa-star-o grey"></i>
                                                <i class="fa fa-star-o grey"></i>
                                            </div>
                                        </div>
                                                                            <div class="item">
                                            <label>Rooms</label>
                                            <input class="review_stats" type="hidden" name="review_stats[Rooms]">
                                            <div class="rates">
                                                <i class="fa fa-star-o grey"></i>
                                                <i class="fa fa-star-o grey"></i>
                                                <i class="fa fa-star-o grey"></i>
                                                <i class="fa fa-star-o grey"></i>
                                                <i class="fa fa-star-o grey"></i>
                                            </div>
                                        </div>
                                                                    </div>
                            </div>
                                            </div>
                    <div class="text-center">
                        <input type="hidden" name="review_service_id" value="13">
                        <input type="hidden" name="review_service_type" value="space">
                        <input id="submit" type="submit" name="submit" class="btn" value="Leave a Review">
                    </div>
                </form>
            </div>
        </div>
    </div>
                    </div>
                    <div class="col-md-12 col-lg-3">
                        <div class="bravo_space_book_wrap">
    <div class="bravo_space_book">
        <div id="bravo_space_book_app"><div class="tour-sale-box"><span class="sale_class box_sale sale_small">12%</span></div> <div class="form-head"><div class="price"><span class="label">
                        from
                    </span> <span class="value"><span class="onsale">₨40.000</span> <span class="text-lg">₨35.000</span></span></div></div> <div class="form-content"><div data-format="MM/DD/YYYY" class="form-group form-date-field form-date-search clearfix "><div class="date-wrapper clearfix"><div class="check-in-wrapper"><label>Select Dates</label> <div class="render check-in-render"></div></div> <i class="fa fa-angle-down arrow"></i></div> <input type="text" class="start_date" style="height: 1px; visibility: hidden;"></div> <div id="no-required-div" style="display: none;"><div><div class="form-group form-guest-search"><div class="guest-wrapper d-flex justify-content-between align-items-center"><div class="flex-grow-1"><label>Adults</label> <div class="render check-in-render">Ages 12+</div></div> <div class="flex-shrink-0"><div class="input-number-group"><i class="icon ion-ios-remove-circle-outline"></i> <span class="input">1</span> <i class="icon ion-ios-add-circle-outline"></i></div></div></div></div> <div class="form-group form-guest-search"><div class="guest-wrapper d-flex justify-content-between align-items-center"><div class="flex-grow-1"><label>Children</label> <div class="render check-in-render">Ages 2–12</div></div> <div class="flex-shrink-0"><div class="input-number-group"><i class="icon ion-ios-remove-circle-outline"></i> <span class="input">0</span> <i class="icon ion-ios-add-circle-outline"></i></div></div></div></div></div></div> </div> <div></div> <div class="submit-group"><div id="no-required-div" style="display: none;"><p><i>  Guests in maximum</i></p></div> <a name="submit" class="btn btn-large btn-primary"><span>BOOK NOW</span> <i class="fa fa-spinner fa-spin" style="display: none;"></i></a> <div class="alert-text mt10 danger" style="display: none;"></div></div></div>
    </div>
</div>
                    </div>
                </div>
                <div class="row end_tour_sticky">
                    <div class="col-md-12">
                                            </div>
                </div>
            </div>
        </div>
        <div class="bravo-more-book-mobile">
    <div class="container">
        <div class="left">
            <div class="g-price">
                <div class="prefix">
                    <span class="fr_text">from</span>
                </div>
                <div class="price">
                    <span class="onsale">₨40.000</span>
                    <span class="text-price">₨35.000</span>
                </div>
            </div>
                        <div class="service-review tour-review-0">
                <div class="list-star">
                    <ul class="booking-item-rating-stars">
                        <li><i class="fa fa-star-o"></i></li>
                        <li><i class="fa fa-star-o"></i></li>
                        <li><i class="fa fa-star-o"></i></li>
                        <li><i class="fa fa-star-o"></i></li>
                        <li><i class="fa fa-star-o"></i></li>
                    </ul>
                    <div class="booking-item-rating-stars-active" style="width: 0%">
                        <ul class="booking-item-rating-stars">
                            <li><i class="fa fa-star"></i></li>
                            <li><i class="fa fa-star"></i></li>
                            <li><i class="fa fa-star"></i></li>
                            <li><i class="fa fa-star"></i></li>
                            <li><i class="fa fa-star"></i></li>
                        </ul>
                    </div>
                </div>
                <span class="review">
                                                0 Review
                                        </span>
            </div>
        </div>
        <div class="right">
            <a class="btn btn-primary bravo-button-book-mobile">Book Now</a>
        </div>
    </div>
</div>    </div>
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
     -->



     <div class="bravo_detail_space">
                <div class="bravo_content">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-lg-9">
                                                <div class="g-header">
    <div class="left">
        <h2>Raniya Farmhouse</h2>
            </div>
    <div class="right">
                    <div class="review-score">
                <span class="head-rating">Not Rate</span>
                <div class="list-star">
                    <ul class="booking-item-rating-stars">
                        <li><i class="fa fa-star-o"></i></li>
                        <li><i class="fa fa-star-o"></i></li>
                        <li><i class="fa fa-star-o"></i></li>
                        <li><i class="fa fa-star-o"></i></li>
                        <li><i class="fa fa-star-o"></i></li>
                    </ul>
                    <div class="booking-item-rating-stars-active" style="width: 0%">
                        <ul class="booking-item-rating-stars">
                            <li><i class="fa fa-star"></i></li>
                            <li><i class="fa fa-star"></i></li>
                            <li><i class="fa fa-star"></i></li>
                            <li><i class="fa fa-star"></i></li>
                            <li><i class="fa fa-star"></i></li>
                        </ul>
                    </div>
                </div>
                <span>
                    from 0 reviews
                </span>
            </div>
            </div>
</div>
<div class="g-space-feature">
    <div class="row">
                    <div class="col-xs-6 col-lg-3 col-md-6">
                <div class="item">
                    <div class="icon">
                        <i class="icofont-hotel"></i>
                    </div>
                    <div class="info">
                        <h4 class="name">No. Bed</h4>
                        <p class="value">
                            4
                        </p>
                    </div>
                </div>
            </div>
                            <div class="col-xs-6 col-lg-3 col-md-6">
                <div class="item">
                    <div class="icon">
                        <i class="icofont-bathtub"></i>
                    </div>
                    <div class="info">
                        <h4 class="name">No. Bathroom</h4>
                        <p class="value">
                            2
                        </p>
                    </div>
                </div>
            </div>
                                <div class="col-xs-6 col-lg-3 col-md-6">
                <div class="item">
                    <div class="icon">
                        <i class="icofont-ruler-compass-alt"></i>
                    </div>
                    <div class="info">
                        <h4 class="name">Square</h4>
                        <p class="value">
                            127m<sup>2</sup>
                        </p>
                    </div>
                </div>
            </div>
                                            <div class="col-xs-6 col-lg-3 col-md-6">
                <div class="item">
                    <div class="icon">
                        <i class="icofont-island-alt"></i>
                    </div>
                    <div class="info">
                        <h4 class="name">Location</h4>
                        <p class="value">
                            Dhabeji
                        </p>
                    </div>
                </div>
            </div>
            </div>
</div>
    <div class="g-gallery">
        <style>.fotorama1608546775460 .fotorama__nav--thumbs .fotorama__nav__frame{
padding:15px;
height:135px}
.fotorama1608546775460 .fotorama__thumb-border{
height:131px;
border-width:2px;
margin-top:15px}</style><div class="fotorama--hidden"></div><div class="fotorama fotorama1608546775460" data-width="100%" data-thumbwidth="135" data-thumbheight="135" data-thumbmargin="15" data-nav="thumbs" data-allowfullscreen="true"><div class="fotorama__wrap fotorama__wrap--css3 fotorama__wrap--slide fotorama__wrap--toggle-arrows fotorama__wrap--no-controls" style="width: 100%; min-width: 0px; max-width: 100%;"><div class="fotorama__stage fotorama__pointer" style="width: 825px; height: 572px;"><div class="fotorama__fullscreen-icon" tabindex="0" role="button"></div><div class="fotorama__stage__shaft" style="transition-duration: 0ms; transform: translate3d(0px, 0px, 0px); width: 825px; margin-left: 0px;"><div class="fotorama__stage__frame fotorama__active fotorama__loaded fotorama__loaded--img" style="left: 0px;"><img src="http://efarmhouses.pk/uploads/0000/1/2020/10/02/1.jpg" class="fotorama__img" style="width: 825px; height: 571.154px; left: 0px; top: 0.423077px;"></div><div class="fotorama__stage__frame fotorama__loaded fotorama__loaded--img" style="left: 827px;"><img src="http://efarmhouses.pk/uploads/0000/1/2020/10/02/2.jpg" class="fotorama__img" style="width: 825px; height: 571.154px; left: 0px; top: 0.423077px;"></div></div><div class="fotorama__arr fotorama__arr--prev fotorama__arr--disabled" tabindex="-1" role="button" disabled="disabled"></div><div class="fotorama__arr fotorama__arr--next" tabindex="0" role="button"></div><div class="fotorama__video-close"></div></div><div class="fotorama__nav-wrap"><div class="fotorama__nav fotorama__nav--thumbs" style="width: 825px;"><div class="fotorama__nav__shaft" style="transition-duration: 0ms; transform: translate3d(0px, 0px, 0px);"><div class="fotorama__thumb-border" style="transition-duration: 0ms; transform: translate3d(0px, 0px, 0px); width: 131px;"></div><div class="fotorama__nav__frame fotorama__nav__frame--thumb fotorama__active" tabindex="0" role="button" style="width: 135px;"><div class="fotorama__thumb fotorama__loaded fotorama__loaded--img"><img src="http://efarmhouses.pk/uploads/0000/1/2020/10/02/1-150.jpg" class="fotorama__img" style="width: 194.712px; height: 135px; left: -29.8558px; top: 0px;"></div></div><div class="fotorama__nav__frame fotorama__nav__frame--thumb" tabindex="0" role="button" style="width: 135px;"><div class="fotorama__thumb fotorama__loaded fotorama__loaded--img"><img src="http://efarmhouses.pk/uploads/0000/1/2020/10/02/2-150.jpg" class="fotorama__img" style="width: 194.712px; height: 135px; left: -29.8558px; top: 0px;"></div></div></div></div></div></div></div>
    </div>
    <div class="g-overview">
        <h3>Description</h3>
        <div class="description">
            <p><strong style="margin: 0px; padding: 0px; font-family: 'Open Sans', Arial, sans-serif; font-size: 14px; text-align: justify; background-color: #ffffff;">Lorem Ipsum</strong><span style="font-family: 'Open Sans', Arial, sans-serif; font-size: 14px; text-align: justify; background-color: #ffffff;">&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum</span></p>        </div>
    </div>
                        <div class="bravo-reviews">
        <h3>Reviews</h3>
                    <div class="review-box">
                <div class="row">
                    <div class="col-lg-5">
                        <div class="review-box-score">
                            <div class="review-score">
                                0<span class="per-total">/5</span>
                            </div>
                            <div class="review-score-text">
                                Not Rate
                            </div>
                            <div class="review-score-base">
                                Based on <span>
                                                                    0 review
                                                            </span></div>
                        </div>
                    </div>
                    <div class="col-lg-7">
                        <div class="review-sumary">
                                                                                                <div class="item">
                                        <div class="label">
                                            Excellent
                                        </div>
                                        <div class="progress">
                                            <div class="percent green" style="width: 0%"></div>
                                        </div>
                                        <div class="number">0</div>
                                    </div>
                                                                    <div class="item">
                                        <div class="label">
                                            Very Good
                                        </div>
                                        <div class="progress">
                                            <div class="percent green" style="width: 0%"></div>
                                        </div>
                                        <div class="number">0</div>
                                    </div>
                                                                    <div class="item">
                                        <div class="label">
                                            Average
                                        </div>
                                        <div class="progress">
                                            <div class="percent green" style="width: 0%"></div>
                                        </div>
                                        <div class="number">0</div>
                                    </div>
                                                                    <div class="item">
                                        <div class="label">
                                            Poor
                                        </div>
                                        <div class="progress">
                                            <div class="percent green" style="width: 0%"></div>
                                        </div>
                                        <div class="number">0</div>
                                    </div>
                                                                    <div class="item">
                                        <div class="label">
                                            Terrible
                                        </div>
                                        <div class="progress">
                                            <div class="percent green" style="width: 0%"></div>
                                        </div>
                                        <div class="number">0</div>
                                    </div>
                                                                                    </div>
                    </div>
                </div>
            </div>
                <div class="review-list">
                                                </div>
        <div class="review-pag-wrapper">
                            <div class="review-pag-text">No Review</div>
                    </div>
        <div class="review-form">
            <div class="title-form">
                Write a review
            </div>
            <div class="form-wrapper">
                                <form action="http://efarmhouses.pk/en/review" class="needs-validation" novalidate="" method="post">
                    <input type="hidden" name="_token" value="42WGbSVzrLw7GxfbcPcewrJx7QEQ91gFtF8WZ3zT">                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <input type="text" required="" class="form-control" name="review_title" placeholder="Title">
                                <div class="invalid-feedback">Review title is required</div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 col-md-8">
                            <div class="form-group">
                                <textarea name="review_content" required="" class="form-control" placeholder="Review content" minlength="10"></textarea>
                                <div class="invalid-feedback">
                                    Review content has at least 10 character
                                </div>
                            </div>
                        </div>
                                                                                <div class="col-xs-12 col-md-4">
                                <div class="form-group review-items">
                                                                            <div class="item">
                                            <label>Sleep</label>
                                            <input class="review_stats" type="hidden" name="review_stats[Sleep]">
                                            <div class="rates">
                                                <i class="fa fa-star-o grey"></i>
                                                <i class="fa fa-star-o grey"></i>
                                                <i class="fa fa-star-o grey"></i>
                                                <i class="fa fa-star-o grey"></i>
                                                <i class="fa fa-star-o grey"></i>
                                            </div>
                                        </div>
                                                                            <div class="item">
                                            <label>Location</label>
                                            <input class="review_stats" type="hidden" name="review_stats[Location]">
                                            <div class="rates">
                                                <i class="fa fa-star-o grey"></i>
                                                <i class="fa fa-star-o grey"></i>
                                                <i class="fa fa-star-o grey"></i>
                                                <i class="fa fa-star-o grey"></i>
                                                <i class="fa fa-star-o grey"></i>
                                            </div>
                                        </div>
                                                                            <div class="item">
                                            <label>Service</label>
                                            <input class="review_stats" type="hidden" name="review_stats[Service]">
                                            <div class="rates">
                                                <i class="fa fa-star-o grey"></i>
                                                <i class="fa fa-star-o grey"></i>
                                                <i class="fa fa-star-o grey"></i>
                                                <i class="fa fa-star-o grey"></i>
                                                <i class="fa fa-star-o grey"></i>
                                            </div>
                                        </div>
                                                                            <div class="item">
                                            <label>Clearness</label>
                                            <input class="review_stats" type="hidden" name="review_stats[Clearness]">
                                            <div class="rates">
                                                <i class="fa fa-star-o grey"></i>
                                                <i class="fa fa-star-o grey"></i>
                                                <i class="fa fa-star-o grey"></i>
                                                <i class="fa fa-star-o grey"></i>
                                                <i class="fa fa-star-o grey"></i>
                                            </div>
                                        </div>
                                                                            <div class="item">
                                            <label>Rooms</label>
                                            <input class="review_stats" type="hidden" name="review_stats[Rooms]">
                                            <div class="rates">
                                                <i class="fa fa-star-o grey"></i>
                                                <i class="fa fa-star-o grey"></i>
                                                <i class="fa fa-star-o grey"></i>
                                                <i class="fa fa-star-o grey"></i>
                                                <i class="fa fa-star-o grey"></i>
                                            </div>
                                        </div>
                                                                    </div>
                            </div>
                                            </div>
                    <div class="text-center">
                        <input type="hidden" name="review_service_id" value="13">
                        <input type="hidden" name="review_service_type" value="space">
                        <input id="submit" type="submit" name="submit" class="btn" value="Leave a Review">
                    </div>
                </form>
            </div>
        </div>
    </div>
                    </div>
                    <div class="col-md-12 col-lg-3">
                        <div class="bravo_space_book_wrap">
    <div class="bravo_space_book">
        <div id="bravo_space_book_app"><div class="tour-sale-box"><span class="sale_class box_sale sale_small">12%</span></div> <div class="form-head"><div class="price"><span class="label">
                        from
                    </span> <span class="value"><span class="onsale">₨40.000</span> <span class="text-lg">₨35.000</span></span></div></div> <div class="form-content"><div data-format="MM/DD/YYYY" class="form-group form-date-field form-date-search clearfix "><div class="date-wrapper clearfix"><div class="check-in-wrapper"><label>Select Dates</label> <div class="render check-in-render"></div></div> <i class="fa fa-angle-down arrow"></i></div> <input type="text" class="start_date" style="height: 1px; visibility: hidden;"></div> <div id="no-required-div" style="display: none;"><div><div class="form-group form-guest-search"><div class="guest-wrapper d-flex justify-content-between align-items-center"><div class="flex-grow-1"><label>Adults</label> <div class="render check-in-render">Ages 12+</div></div> <div class="flex-shrink-0"><div class="input-number-group"><i class="icon ion-ios-remove-circle-outline"></i> <span class="input">1</span> <i class="icon ion-ios-add-circle-outline"></i></div></div></div></div> <div class="form-group form-guest-search"><div class="guest-wrapper d-flex justify-content-between align-items-center"><div class="flex-grow-1"><label>Children</label> <div class="render check-in-render">Ages 2–12</div></div> <div class="flex-shrink-0"><div class="input-number-group"><i class="icon ion-ios-remove-circle-outline"></i> <span class="input">0</span> <i class="icon ion-ios-add-circle-outline"></i></div></div></div></div></div></div> <!----></div> <div></div> <div class="submit-group"><div id="no-required-div" style="display: none;"><p><i>  Guests in maximum</i></p></div> <a name="submit" class="btn btn-large btn-primary"><span>BOOK NOW</span> <!----> <i class="fa fa-spinner fa-spin" style="display: none;"></i></a> <div class="alert-text mt10 danger" style="display: none;"></div></div></div>
    </div>
</div>
                    </div>
                </div>
                <div class="row end_tour_sticky">
                    <div class="col-md-12">
                                            </div>
                </div>
            </div>
        </div>
        <div class="bravo-more-book-mobile">
    <div class="container">
        <div class="left">
            <div class="g-price">
                <div class="prefix">
                    <span class="fr_text">from</span>
                </div>
                <div class="price">
                    <span class="onsale">₨40.000</span>
                    <span class="text-price">₨35.000</span>
                </div>
            </div>
                        <div class="service-review tour-review-0">
                <div class="list-star">
                    <ul class="booking-item-rating-stars">
                        <li><i class="fa fa-star-o"></i></li>
                        <li><i class="fa fa-star-o"></i></li>
                        <li><i class="fa fa-star-o"></i></li>
                        <li><i class="fa fa-star-o"></i></li>
                        <li><i class="fa fa-star-o"></i></li>
                    </ul>
                    <div class="booking-item-rating-stars-active" style="width: 0%">
                        <ul class="booking-item-rating-stars">
                            <li><i class="fa fa-star"></i></li>
                            <li><i class="fa fa-star"></i></li>
                            <li><i class="fa fa-star"></i></li>
                            <li><i class="fa fa-star"></i></li>
                            <li><i class="fa fa-star"></i></li>
                        </ul>
                    </div>
                </div>
                <span class="review">
                                                0 Review
                                        </span>
            </div>
        </div>
        <div class="right">
            <a class="btn btn-primary bravo-button-book-mobile">Book Now</a>
        </div>
    </div>
</div>    </div>
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
