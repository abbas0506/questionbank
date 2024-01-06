@extends('layouts.basic')

@section('header')
<x-header></x-header>
@endsection
@section('body')
<!-- <div class="text-center bg-sky-100 text-sm py-1">(+92 42) 99233106-7</div> -->

<section class="mt-32">
    <div class="section-title">
        <h2>About Us</h2>
    </div>
    <div class="container flex flex-col md:flex-row mt-16">
        <div class="w-full">
            <img src="{{url('images/events/8.jpg')}}" alt="sat" class="" alt="">
        </div>
        <div class="block w-full p-5 md:px-12 text-justify text-lg">
            RSGCRL has been established at University of the Punjab, Lahore as
            an affiliated National Lab with National Center of GIS and Space
            Applications (NCGSA) under Government of Pakistan's Public Sector
            Development Programme (PSDP) sponsored by Higher Education
            Commission (HEC) of Pakistan. The RSGCRL aims to promote and
            facilitate education, research activities and collaborations to study
            and develop GIS and Space Applications with particular emphases
            on climate change and sustainable development in Pakistan.


        </div>
    </div>
</section>
<section class="facts section-bg" data-aos="fade-up">
    <div class="custom-container">

        <div class="row counters">

            <div class="col-lg-3 col-6 text-center">
                <span data-purecounter-start="0" data-purecounter-end="232" data-purecounter-duration="1" class="purecounter"></span>
                <p>Clients</p>
            </div>

            <div class="col-lg-3 col-6 text-center">
                <span data-purecounter-start="0" data-purecounter-end="521" data-purecounter-duration="1" class="purecounter"></span>
                <p>Projects</p>
            </div>

            <div class="col-lg-3 col-6 text-center">
                <span data-purecounter-start="0" data-purecounter-end="1463" data-purecounter-duration="1" class="purecounter"></span>
                <p>Hours Of Support</p>
            </div>

            <div class="col-lg-3 col-6 text-center">
                <span data-purecounter-start="0" data-purecounter-end="15" data-purecounter-duration="1" class="purecounter"></span>
                <p>Hard Workers</p>
            </div>

        </div>

    </div>
</section><!-- End Facts Section -->

<!-- testimonial section -->
<section class="testimonials" data-aos="fade-up">
    <div class="custom-container">

        <div class="section-title">
            <h2>Tetstimonials</h2>
            <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia fugiat sit in iste officiis commodi quidem hic quas.</p>
        </div>

        <div class="testimonials-carousel swiper w-full">
            <div class="swiper-wrapper">
                <div class="testimonial-item swiper-slide">
                    <img src="images/dr/1.png" class="testimonial-img" alt="">
                    <h3>Saul Goodman</h3>
                    <h4>Ceo &amp; Founder</h4>
                    <p>
                        <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                        Proin iaculis purus consequat sem cure digni ssim donec porttitora entum suscipit rhoncus. Accusantium quam, ultricies eget id, aliquam eget nibh et. Maecen aliquam, risus at semper.
                        <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                    </p>
                </div>

                <div class="testimonial-item swiper-slide">
                    <img src="images/dr/1.png" class="testimonial-img" alt="">
                    <h3>Sara Wilsson</h3>
                    <h4>Designer</h4>
                    <p>
                        <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                        Export tempor illum tamen malis malis eram quae irure esse labore quem cillum quid cillum eram malis quorum velit fore eram velit sunt aliqua noster fugiat irure amet legam anim culpa.
                        <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                    </p>
                </div>

                <div class="testimonial-item swiper-slide">
                    <img src="images/dr/1.png" class="testimonial-img" alt="">
                    <h3>Jena Karlis</h3>
                    <h4>Store Owner</h4>
                    <p>
                        <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                        Enim nisi quem export duis labore cillum quae magna enim sint quorum nulla quem veniam duis minim tempor labore quem eram duis noster aute amet eram fore quis sint minim.
                        <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                    </p>
                </div>

                <div class="testimonial-item swiper-slide">
                    <img src="images/dr/1.png" class="testimonial-img" alt="">
                    <h3>Matt Brandon</h3>
                    <h4>Freelancer</h4>
                    <p>
                        <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                        Fugiat enim eram quae cillum dolore dolor amet nulla culpa multos export minim fugiat minim velit minim dolor enim duis veniam ipsum anim magna sunt elit fore quem dolore labore illum veniam.
                        <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                    </p>
                </div>

                <div class="testimonial-item swiper-slide">
                    <img src="images/dr/1.png" class="testimonial-img" alt="">
                    <h3>John Larson</h3>
                    <h4>Entrepreneur</h4>
                    <p>
                        <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                        Quis quorum aliqua sint quem legam fore sunt eram irure aliqua veniam tempor noster veniam enim culpa labore duis sunt culpa nulla illum cillum fugiat legam esse veniam culpa fore nisi cillum quid.
                        <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                    </p>
                </div>
            </div>
            <div class="swiper-pagination"></div>
        </div>

    </div>
</section><!-- End Ttstimonials Section -->

<!-- footer -->
<x-footer></x-footer>
@endsection

@section('script')