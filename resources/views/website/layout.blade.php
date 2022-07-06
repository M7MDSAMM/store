<!doctype html>
<html lang="zxx">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Links of CSS files -->
    @include('website.ext.css')

    <title>Coze - IT Solutions & Technology Services HTML Template</title>

    <link rel="icon" type="image/png" href="assets/images/favicon.png">
</head>

<body>

<!-- Start Preloader Area -->
<div class="preloader">
    <div class="d-table">
        <div class="d-table-cell">
            <div class="lds-spinner">
                <div></div>
                <div></div>
                <div></div>
                <div></div>
                <div></div>
                <div></div>
                <div></div>
                <div></div>
                <div></div>
                <div></div>
                <div></div>
                <div></div>
            </div>
        </div>
    </div>
</div>
<!-- End Preloader Area -->



<!-- Start Navbar Area -->
@include('website.ext.nav')
<!-- End Navbar Area -->

<!-- Sidebar Modal -->
<div class="sidebarModal modal right fade" id="sidebarModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <button type="button" class="close" data-bs-dismiss="modal"><i class="ri-close-line"></i></button>

            <div class="modal-body">
                <a href="index.html">
                    <img src="assets/images/black-logo.png" class="black-logo" alt="image">
                    <img src="assets/images/logo.png" class="white-logo" alt="image">
                </a>
                <div class="sidebar-content">
                    <h3>About Us</h3>
                    <p>Lorem ipsum dolor sit amet consectetur adipiscing elit sed do eiusmod tempor incididunt ut labore
                        et dolore magna aliqua.</p>

                    <div class="sidebar-btn">
                        <a href="contact.html" class="default-btn">Let’s Talk</a>
                    </div>
                </div>
                <div class="sidebar-contact-info">
                    <h3>Contact Information</h3>

                    <ul class="info-list">
                        <li><i class="ri-phone-fill"></i> <a href="tel:9901234567">+990-123-4567</a></li>

                        <li><i class="ri-mail-line"></i> <a
                                href="../../cdn-cgi/l/email-protection.html#284b47524d684f45494144064b4745"><span
                                class="__cf_email__" data-cfemail="32515d485772555f535b5e1c515d5f">[email&#160;protected]</span></a>
                        </li>

                        <li><i class="ri-map-pin-line"></i> 413 North Las Vegas, NV 89032</li>
                    </ul>
                </div>
                <ul class="sidebar-social-list">
                    <li><a href="#" target="_blank"><i class="ri-facebook-fill"></i></a></li>
                    <li><a href="#" target="_blank"><i class="ri-twitter-fill"></i></a></li>
                    <li><a href="#" target="_blank"><i class="ri-linkedin-fill"></i></a></li>
                    <li><a href="#" target="_blank"><i class="ri-instagram-fill"></i></a></li>
                </ul>
                <div class="contact-form">
                    <h3>Ready to Get Started?</h3>

                    <form id="contactForm">
                        <div class="row">
                            <div class="col-lg-12 col-md-6">
                                <div class="form-group">
                                    <input type="text" name="name" class="form-control" required
                                           data-error="Please enter your name" placeholder="Your name">
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>

                            <div class="col-lg-12 col-md-6">
                                <div class="form-group">
                                    <input type="email" name="email" class="form-control" required
                                           data-error="Please enter your email" placeholder="Your email address">
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>

                            <div class="col-lg-12 col-md-12">
                                <div class="form-group">
                                    <input type="text" name="phone_number" class="form-control" required
                                           data-error="Please enter your phone number" placeholder="Your phone number">
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>

                            <div class="col-lg-12 col-md-12">
                                <div class="form-group">
                                    <textarea name="message" class="form-control" cols="30" rows="6" required
                                              data-error="Please enter your message"
                                              placeholder="Write your message..."></textarea>
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>

                            <div class="col-lg-12 col-md-12">
                                <button type="submit" class="default-btn">Send Message<span></span></button>
                                <div id="msgSubmit" class="h3 text-center hidden"></div>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Sidebar Modal -->

<!-- Start Main Hero Area -->

    @yield('slyder')

<!-- End Main Hero Area -->

<!-- Start Content Area-->

    @yield('content')


<!-- End Content Area -->


<!-- End Footer Area -->

    @include('website.ext.footer') 

<!-- End Footer Area -->

<!-- Start Go Top Area -->
<div class="go-top">
    <i class="ri-arrow-up-s-line"></i>
</div>
<!-- End Go Top Area -->

<!-- Links of JS files -->
@include('website.ext.js')
</body>
</html>
