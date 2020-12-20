@extends('layouts.main_layout')

@section('my_contain')

<div id="bravo_content-wrapper">
	<div class="bravo_content">
		<div class="container">
			<div class="row section">
				<div class="col-md-12 col-lg-5">
					<div role="form" class="form_wrapper" lang="en-US" dir="ltr">
						<form method="post" action="http://efarmhouses.pk/en/contact/store" class="bookcore-form">
							<input type="hidden" name="_token" value="bJelbBdqBk3TiVqIYg0PCpF0M8iCVWSNOoGC7NfH">
							<div style="display: none;">
								<input type="hidden" name="g-recaptcha-response" value="">
							</div>
							<div class="contact-form">
								<div class="contact-header">
									<h3>We'd love to hear from you</h3>
									<p>Send us a message and we'll respond as soon as possible</p>
                                </div>
																<div class="contact-form">
									<div class="form-group">
										<input type="text" value="" placeholder=" Name " name="name" class="form-control">
									</div>
									<div class="form-group">
										<input type="text" value="" placeholder="Email" name="email" class="form-control">
									</div>

									<div class="form-group">
										 <textarea name="message" cols="40" rows="10" class="form-control textarea" placeholder="Message"></textarea>
									</div>
									<div class="form-group">
										
									</div>
									<p><input type="submit" value="SEND MESSAGE" class="form-control submit btn btn-primary"></p></div></div>
							</form>
					</div>
				</div>
				<div class="offset-lg-2 col-md-12 col-lg-5">
					<div class="contact-info">
						<div class="info-bg">
															<img src="images/contact_page/bg-contact.jpg" class="img-responsive" alt="We'd love to hear from you">
													</div>
						<div class="info-content">
							<div class="sub">
								<p></p><h3>Booking Core</h3>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>Tell. + 00 222 444 33</p>
<p>Email. hello@yoursite.com</p>
<p>1355 Market St, Suite 900San, Francisco, CA 94103 United States</p><p></p>
							</div>
						</div>
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