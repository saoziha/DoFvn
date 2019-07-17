@extends('templates.user.master')
@section('content')
<section class="ftco-section bg-light ftco-bread">
    <div class="container">
        <div class="row no-gutters slider-text align-items-center">
            <div class="col-md-9 ftco-animate">
                <p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home</a></span> <span>Contact
                        Us</span></p>
                <h1 class="mb-3 bread">Contact Us</h1>
                <p>A small river named Duden flows by their place and supplies it with the necessary
                    regelialia. It is a paradisematic country, in which roasted parts of sentences fly into
                    your mouth.</p>
            </div>
        </div>
    </div>
</section>
<section class="ftco-section contact-section">
    <div class="container">
        <div class="row d-flex mb-5 contact-info">
            <div class="col-md-12 mb-4">
                <h2 class="h3">Contact Information</h2>
            </div>
            <div class="w-100"></div>
            <div class="col-md-3 d-flex">
                <div class="info bg-light p-4">
                <p><span>Address:</span> {{$about->address}}</p>
                </div>
            </div>
            <div class="col-md-3 d-flex">
                <div class="info bg-light p-4">
                    <p><span>Phone:</span> <a href="tel://1234567920">+ {{$about->phone}}</a></p>
                </div>
            </div>
            <div class="col-md-3 d-flex">
                <div class="info bg-light p-4">
                    <p><span>Email:</span> <a href="mailto:info@yoursite.com">{{$about->email}}</a></p>
                </div>
            </div>
            <div class="col-md-3 d-flex">
                <div class="info bg-light p-4">
                    <p><span>Website</span> <a href="#">{{$about->website}}</a></p>
                </div>
            </div>
        </div>
        <div class="row block-9">
            <div class="col-md-6 order-md-last d-flex">
                @if (session('alert'))
                   <?php
                    echo "<script> setTimeout(function(){
                            alert('".session('alert')."')
                    },2000)</script>";
                   ?>
                @endif
                <form action="{{url('contact/send')}}" method="POST" class="bg-light p-5 contact-form">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <input type="text" name="name" required='true' minlength="5" class="form-control" placeholder="Your Name">
                    </div>
                    <div class="form-group">
                        <input type="email"  name="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$"  required='true' class="form-control"  placeholder="Your Email">
                    </div>
                    <div class="form-group">
                        <input type="text" name="subject" minlength="5" required='true' class="form-control" placeholder="Subject">
                    </div>
                    <div class="form-group">
                        <textarea name="description" data-validation="required" minlength="5" required='true' cols="30" rows="7" class="form-control"
                            placeholder="Message"></textarea>
                    </div>
                    <div class="form-group">
                        <input type="submit" value="Send Message" class="btn btn-primary py-3 px-5">
                    </div>
                </form>

            </div>

            <div class="col-md-6 d-flex">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3833.8118997546017!2d108.2177543147929!3d16.0752478888772!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3142183754d24c71%3A0xbc169a4a26be67db!2zMTA4IEzDqiBM4bujaSwgVGjhuqFjaCBUaGFuZywgUS4gSOG6o2kgQ2jDonUsIMSQw6AgTuG6tW5nIDU1MDAwMCwgVmlldG5hbQ!5e0!3m2!1sen!2s!4v1563288138814!5m2!1sen!2s" width="600" height="550" frameborder="0" style="border:0" allowfullscreen></iframe>
            </div>
        </div>
    </div>
</section>
<!-- loader -->

@endsection
