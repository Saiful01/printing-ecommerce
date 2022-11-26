@extends("layouts.common")
@section("content")
    <div class="page-content">
        <div class="holder breadcrumbs-wrap mt-0">
            <div class="container">
                <ul class="breadcrumbs">
                    <li><a href="/">Home</a></li>
                    <li><span>Contact US</span></li>
                </ul>
            </div>
        </div>

        <div class="holder">
            <div class="container">
                <div class="title-wrap text-center">
                    <h2 class="h1-style">Our Information</h2>
                    <p class="h-sub maxW-825"> If you require any further information, please feel free to call us by dialing number the bellow</p>
                </div>
                <div class="text-icn-blocks-row" style="margin-left: 29px">
                    <div class="text-icn-block-hor">
                        <div class="icn">
                            <i class="icon-location"></i>
                        </div>
                        <div class="text">
                            <h4>Address:</h4>
                            <p>Post Office Box 00
                                Worcester,<br> PA 19490</p>
                        </div>
                    </div>
                    <div class="text-icn-block-hor">
                        <div class="icn">
                            <i class="icon-phone"></i>
                        </div>
                        <div class="text">
                            <h4>Phone:</h4>
                            <p>215-714-2076<br></p>
                        </div>
                    </div>
                    <div class="text-icn-block-hor">
                        <div class="icn">
                            <i class="icon-info"></i>
                        </div>
                        <div class="text">
                            <h4>Hours:</h4>
                            <p>Hours: Monday to Friday<br>
                                09:00am to 3:00pm</p>
                        </div>
                    </div>
                    {{--<div class="text-icn-block-hor">
                        <div class="icn">
                            <i class="icon-call-center"></i>
                        </div>
                        <div class="text">
                            <h4>Quick Help:</h4>
                            <p>+3 800 555 35 35<br>+3 800 555 35 35</p>
                        </div>
                    </div>--}}
                </div>
            </div>
        </div>
    </div>
    <div class="holder">
        <div class="container">
            <div class="row vert-margin">
                <div class="col-sm-9">
                    <div class="title-wrap"><h2 class="h1-style">Get In Touch With Us</h2>
                        <div>We are happy to answer your questions. Fill out the form and we’ll be in touch as soon as possible.
                        </div>
                    </div>
                    <form  action="/contact/send" class="contact-form"  method="post">
                        @csrf
                        <div class="form-confirm">
                            <div class="success-confirm">
                                Thanks! Your message has been sent. We will get back to you soon!
                            </div>
                            <div class="error-confirm">
                                Oops! There was an error submitting form. Refresh and send again.
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row vert-margin-middle">
                                <div class="col-lg">
                                    <input type="text" name="name" class="form-control form-control--sm"
                                           placeholder="Name" required>
                                </div>
                                <div class="col-lg">
                                    <input type="text" name="lastName" class="form-control form-control--sm"
                                           placeholder="Last Name" required>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row vert-margin-middle">
                                <div class="col-lg">
                                    <input type="text" name="email" class="form-control form-control--sm"
                                           placeholder="Email" required>
                                </div>
                                <div class="col-lg">
                                    <input type="text" name="phone" class="form-control form-control--sm"
                                           placeholder="Phone" required>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                                <textarea class="form-control form-control--sm textarea--height-200" name="message"
                                          placeholder="Message" required></textarea>
                        </div>
                        <button class="btn" type="submit">Send Message</button>
                    </form>
                </div>
                <div class="col-sm-9">
                    <div class="contact-map">
                        <iframe width="600" height="500" id="gmap_canvas" src="https://maps.google.com/maps?q=00%20Worcester,%20PA%2019490&t=&z=13&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{--<div class="holder holder-subscribe-full holder-subscribe--compact">
        <div class="container">
            <div class="row">
                <div class="col-auto">
                    <div class="subscribe-form-title-md">Newsletter</div>
                    <div class="subscribe-form-title-xs">Subscribe to our weekly newsletter.</div>
                </div>
                <div class="col">
                    <div class="subscribe-form">
                        <form action="#">
                            <div class="form-inline">
                                <div class="form-control-wrap">
                                    <input type="text" class="form-control" placeholder="Type your e-mail...">
                                    <span class="bottom"></span>
                                    <span class="right"></span>
                                    <span class="top"></span>
                                    <span class="left"></span>
                                </div>
                                <button type="submit" class="btn btn--lg">subscribe</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>--}}
@endsection
