@extends('layouts.app')

@section('style_css')
<style>
.carousel-item {
    /* width: 50%; */
  height: 50vh;
  min-height: 100px;
  background: no-repeat center center scroll;
  -webkit-background-size: cover;
  -moz-background-size: cover;
  -o-background-size: cover;
  background-size: cover
  }
</style>
@endsection

@section('content')
<div class="jumbotron jumbotron-fluid">
    <div class="container">
      <h1 class="display-4"><p class="mb-0" style="font-family: 'Quicksand', sans-serif; font-weight: bold;">Home / Contact Us</p></h1>/
    </div>
  </div>


        <div class="row heading justify-content-center ">

<!--Section: Contact v.2-->
<section class="mb-4">

    <p class="text-center w-responsive mx-auto mb-5">Do you have any questions? Please do not hesitate to contact us directly. Our team will come back to you within
        a matter of hours to help you.</p>

    <div class="row">

        <!--Grid column-->
        <div class="col-md-12 mb-md-0 mb-5">
            <form id="contact-form" name="contact-form" action="#" method="POST">

                <!--Grid row-->
                <div class="row">

                    <!--Grid column-->
                    <div class="col-md-6">
                        <div class="md-form mb-0">
                            <input type="text" id="name" name="name" placeholder="Your Name" class="form-control">

                        </div>
                    </div>
                    <!--Grid column-->

                    <!--Grid column-->
                    <div class="col-md-6">
                        <div class="md-form mb-0">
                            <input type="text" id="email" placeholder="Your Email" name="email" class="form-control">
                            <label for="email" class="">We'll Never share your Email</label>
                        </div>
                    </div>
                    <!--Grid column-->

                </div>
                <!--Grid row-->

                <!--Grid row-->
                <div class="row">
                    <div class="col-md-12">
                        <div class="md-form mb-0">
                            <input type="text" id="subject" placeholder="subject" name="subject" class="form-control">
                        </div>
                    </div>
                </div>
                <!--Grid row-->
<p></p>
                <!--Grid row-->
                <div class="row">
                    <!--Grid column-->
                    <div class="col-md-12">
                        <div class="md-form">
                            <textarea type="text" placeholder="Your Message" id="message" name="message" rows="2" class="form-control md-textarea"></textarea>
                        </div>
                    </div>
                </div>
                <!--Grid row-->
                <p></p>
                <div class="text-center text-md-left">
                    <a class="btn btn-primary btn-block">Send</a>
                </div>
            </form>


            <div class="status"></div>
        </div>
        <!--Grid column-->



    </div>

</section>
<!--Section: Contact v.2-->

        </div>
        </div>

    </div>
@endsection
