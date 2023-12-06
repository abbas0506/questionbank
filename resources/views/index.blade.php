@extends('layouts.basic')

@section('header')
<x-header></x-header>
@endsection

@section('body')
<style>
    .hero {
        background-image: linear-gradient(rgba(0, 0, 0, 0.5),
            rgba(0, 0, 50, 0.5)),
        url("{{asset('/images/bg/office.png')}}");
        background-position: center;
        background-repeat: no-repeat;
        background-size: cover;
        background-clip: border-box;
        position: relative;
    }
</style>
<div class="hero h-screen max-w-screen">
    <div class="flex flex-col gap-y-2 w-full h-full justify-center items-center">
        <div class="text-slate-200 text-5xl">We Build the Nation</div>
        <p class="md:w-1/2 text-center text-slate-300">Welcome to our vibrant school community, where curiosity meets knowledge, and every student is encouraged to thrive academically, socially, and creatively. </p>
        <button class="btn-orange mt-5">Click Here <i class="bi-arrow-right"></i></button>
    </div>
</div>

<!-- features section -->
<section id='features' class="mt-12">


    <h2 class="text-4xl text-center">We Provide</h2>

    <div class="feature container grid grid-cols-1 md:grid-cols-3 space-x-0 md:space-x-8 space-y-4 md:space-y-0">
        <div class="flex flex-col justify-center items-center p-8 shadow-lg border border-transparent hover:border hover:border-pink-300">
            <div class="flex items-center justify-center bg-pink-100 rounded-full w-16 h-16">
                <i class="bi-book text-2xl text-pink-400"></i>
            </div>
            <h3 class="mt-3 text-lg">Free Education</h3>
            <p class="text-sm text-center">Voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident</p>
        </div>
        <div class="flex flex-col justify-center items-center p-8 shadow-lg border border-transparent hover:border hover:border-cyan-200 box-border">
            <div class="flex items-center justify-center bg-cyan-100 rounded-full w-16 h-16">
                <i class="bi bi-palette text-2xl text-cyan-400"></i>
            </div>
            <h3 class="mt-3 text-lg">Practical Labs</h3>
            <p class="text-sm text-center">Voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident</p>
        </div>
        <div class="flex flex-col justify-center items-center p-8 shadow-lg border border-transparent hover:border hover:border-green-200">
            <div class="flex items-center justify-center bg-green-100 rounded-full w-16 h-16">
                <i class="bx bx-run text-2xl text-green-400"></i>
            </div>
            <h3 class="mt-3 text-lg">Sports Playgrounds</h3>
            <p class="text-sm text-center">Voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident</p>
        </div>
        <div class="flex flex-col justify-center items-center p-8 shadow-lg border border-transparent hover:border hover:border-pink-300">
            <div class="flex items-center justify-center bg-pink-100 rounded-full w-16 h-16">
                <i class="bi-book text-2xl text-pink-400"></i>
            </div>
            <h3 class="mt-3 text-lg">IT Skills</h3>
            <p class="text-sm text-center">Voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident</p>
        </div>
        <div class="flex flex-col justify-center items-center p-8 shadow-lg border border-transparent hover:border hover:border-cyan-200 box-border">
            <div class="flex items-center justify-center bg-cyan-100 rounded-full w-16 h-16">
                <i class="bi bi-palette text-2xl text-cyan-400"></i>
            </div>
            <h3 class="mt-3 text-lg">Quiz Competitions</h3>
            <p class="text-sm text-center">Voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident</p>
        </div>
        <div class="flex flex-col justify-center items-center p-8 shadow-lg border border-transparent hover:border hover:border-green-200">
            <div class="flex items-center justify-center bg-green-100 rounded-full w-16 h-16">
                <i class="bx bx-run text-2xl text-green-400"></i>
            </div>
            <h3 class="mt-3 text-lg">Day Celebrations</h3>
            <p class="text-sm text-center">Voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident</p>
        </div>
    </div>


</section>
<div class="mt-24 bg-slate-100">
    <div class="grid grid-cols-1 md:grid-cols-2 gap-8 p-8">
        <div class="flex flex-1">
            <img src="{{url('images/sports/trophy.png')}}" alt="sat" class="">
        </div>
        <div class="flex flex-col flex-1">
            <h2 class="text-xl">Our Distinction</h2>
            <p class="leading-relaxed">
                Thanks to Almighty Allah, for blessing us with the honour of wining All Punjab Qirat Competition and Division Level Hockey Tournament.
            </p>
        </div>
    </div>
</div>
<!-- testimonial section -->
<section class="testimonials pt-0" data-aos="fade-up">
    <div class="container">

        <div class="section-title">
            <h2>Our Team</h2>
            <p class="text-gray-900">
                We are focusing on four major areas of research, development and capacity building:
                Developing Remote Sensing and GIS applications, models, tools,
                technologies, and scientific approaches to support sustainable
                developments in the fields of food security, agriculture, and
                environment, air and water pollution assessment and solutions, efficient management of natural
                resources and urban areas, and a pathway towards a blue economy.

            </p>
        </div>
        <div class="testimonials-carousel swiper w-full mt-4">
            <div class="swiper-wrapper">
                <div class="testimonial-item swiper-slide">
                    <img src="images/dr/1.png" class="testimonial-img" alt="">
                    <h3>Dr. Zia ul Haq</h3>
                    <h4>Principal Investigator/Director</h4>
                    <p>
                        <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                        Remote Sensing of Atmosphere, Sustainable Development, Atmospheric Reactive and
                        Greenhouse Gases, Air Pollution Impact linkage with Climate Chang, Socioeconomics of Climate Change, Climate Projections and Adaptation
                        <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                    </p>
                </div>

                <div class="testimonial-item swiper-slide">
                    <img src="images/dr/3.png" class="testimonial-img" alt="">
                    <h3>Dr. Syeda Adila Batool</h3>
                    <h4>Co-Principal Investigator</h4>
                    <p>
                        <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                        Sustainable Development, Urban Climate, Climate Projections and Adaptation, Solid Waste Management, Life Cycle Assessment, Greenhouse Gases Emissions and Impact on Ecology,
                        Climate and Human Health
                        <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                    </p>
                </div>
                <div class="testimonial-item swiper-slide">
                    <img src="images/dr/6.png" class="testimonial-img" alt="">
                    <h3>Dr. Asim Daud Rana</h3>
                    <h4>Team Lead/Lab Member</h4>
                    <p>
                        <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                        Passion driven scientist with distinguished academic career and having almost 20 years’
                        experience of imparting and sharing knowledge of satellite remote sensing through university
                        education, multi-national and semi government organisations.
                        <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                    </p>
                </div>

                <div class="testimonial-item swiper-slide">
                    <img src="images/dr/2.png" class="testimonial-img" alt="">
                    <h3>Dr. Khalid Mahmood</h3>
                    <h4>Co-Principal Investigator</h4>
                    <p>
                        <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                        Satellite Based Environmental Indices, Hazards Assessment, Geospatial Economical
                        Alternatives, Multi Criteria Decision Support Systems, Geographic Information Science (GISc) Development,
                        Anthropogenic Emissions, Ecology and Climate Change
                        <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                    </p>
                </div>

                <div class="testimonial-item swiper-slide">
                    <img src="images/dr/4.png" class="testimonial-img" alt="">
                    <h3>Dr. Salman Tariq</h3>
                    <h4>Co-Principal Investigator</h4>
                    <p>
                        <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                        Remote Sensing of Atmosphere and Air Pollution, Climate Modelling, Sustainable Development, Transboundary Aerosols, Radiative
                        Forcing of Aerosols, Coastal Environments
                        <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                    </p>
                </div>

                <div class="testimonial-item swiper-slide">
                    <img src="images/dr/5.png" class="testimonial-img" alt="">
                    <h3>Dr. Shahid Pervaiz</h3>
                    <h4>Team Lead/Lab Member</h4>
                    <p>
                        <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                        Satellite Based Environmental Indices, Hazards Assessment, Geospatial Economical
                        Alternatives, Multi Criteria Decision Support Systems, Geographic Information Science (GISc) Development,
                        Anthropogenic Emissions, Ecology and Climate Change
                        <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                    </p>
                </div>

            </div>
            <div class="swiper-pagination"></div>
        </div>

    </div>
</section><!-- End Ttstimonials Section -->




<!-- Team section -->
<!-- <section class="bg-cover bg-center py-12" style="background-image: url('images/path7.png');">
    <div class="container">
        <div class="section-title">
            <h2>Team</h2>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-16 mt-8 w-full place-items-center">
            <div class="flip-card bg-transparent">
                <div class="inner">
                    <div class="front">
                        <img src="images/dr/1.png" alt="" class="w-20 h-20 rounded-full">
                        <h3 class="mt-3">Dr. Zia Ul Haq</h3>
                        <p>Co-Principal Investigator</p>
                        <p>aadila.spsc@pu.edu.pk</p>
                    </div>
                    <div class="back">
                        <p>Co-Principal Investigator</p>
                        <p>aadila.spsc@pu.edu.pk</p>
                        <a href="" class="mt-5 hyper">See profile</a>
                    </div>
                </div>
            </div>
            <div class="flip-card bg-transparent">
                <div class="inner">
                    <div class="front">
                        <img src="images/dr/1.png" alt="" class="w-20 h-20 rounded-full">
                        <h3 class="mt-3">Dr. Zia Ul Haq</h3>
                        <p>Co-Principal Investigator</p>
                        <p>aadila.spsc@pu.edu.pk</p>
                    </div>
                    <div class="back">
                        <p>Co-Principal Investigator</p>
                        <p>aadila.spsc@pu.edu.pk</p>
                    </div>
                </div>
            </div>
            <div class="flip-card bg-transparent">
                <div class="inner">
                    <div class="front">
                        <img src="images/dr/1.png" alt="" class="w-20 h-20 rounded-full">
                        <h3 class="mt-3">Dr. Zia Ul Haq</h3>
                        <p>Co-Principal Investigator</p>
                        <p>aadila.spsc@pu.edu.pk</p>
                    </div>
                    <div class="back">
                        <p>Co-Principal Investigator</p>
                        <p>aadila.spsc@pu.edu.pk</p>
                    </div>
                </div>
            </div>

            <div class="flip-card bg-transparent">
                <div class="inner">
                    <div class="front">
                        <img src="images/dr/1.png" alt="" class="w-20 h-20 rounded-full">
                        <h3 class="mt-3">Dr. Zia Ul Haq</h3>
                        <p>Co-Principal Investigator</p>
                        <p>aadila.spsc@pu.edu.pk</p>
                    </div>
                    <div class="back">
                        <p>Co-Principal Investigator</p>
                        <p>aadila.spsc@pu.edu.pk</p>
                    </div>
                </div>
            </div>
            <div class="flip-card bg-transparent">
                <div class="inner">
                    <div class="front">
                        <img src="images/dr/1.png" alt="" class="w-20 h-20 rounded-full">
                        <h3 class="mt-3">Dr. Zia Ul Haq</h3>
                        <p>Co-Principal Investigator</p>
                        <p>aadila.spsc@pu.edu.pk</p>
                    </div>
                    <div class="back">
                        <p>Co-Principal Investigator</p>
                        <p>aadila.spsc@pu.edu.pk</p>
                    </div>
                </div>
            </div>
            <div class="flip-card bg-transparent">
                <div class="inner">
                    <div class="front">
                        <img src="images/dr/1.png" alt="" class="w-20 h-20 rounded-full">
                        <h3 class="mt-3">Dr. Zia Ul Haq</h3>
                        <p>Co-Principal Investigator</p>
                        <p>aadila.spsc@pu.edu.pk</p>
                    </div>
                    <div class="back">
                        <p>Co-Principal Investigator</p>
                        <p>aadila.spsc@pu.edu.pk</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section> -->


<section id='services' class="mt-12">
    <div class="bg-fixed bg-cover py-16 bg-origin-border hover:bg-origin-padding" style="background-image: url('images/mini/globe-2.png');">
        <h1 class="text-center text-white">Our Services</h1>
    </div>
    <div class="container">
        <div class="flex flex-col md:flex-row mt-8 w-full justify-between">
            <div class="w-full p-5 md:w-1/2">
                <h2>Academics</h2>
                <p class="mt-3 text-lg">Capacity Building of professionals and researchers through courses, trainings, workshops, seminars etc. (GIS, Climate Change, Satellites, Drones, RADARs, LiDARs, Optical/Thermal/Microwave Imagery)</p>
            </div>
            <div class="custom-cell w-1/2">
                <img src="images/mini/academics.png" alt="" class="w-60">
            </div>
        </div>
    </div>
    <div class="container">
        <div class="flex flex-col-reverse md:flex-row mt-8 w-full justify-between">
            <div class="custom-cell w-1/2">
                <img src="images/mini/research.png" alt="" class="w-60">
            </div>
            <div class="w-full p-5 md:w-1/2">
                <h2>Research & Development</h2>
                <p class="mt-3 text-lg">Development of GIS & Space Applications to be shared with internatinoal organizations and
                    help in improving living standards of Pakistan through sustainable solution for healthy environment, better urban planning,
                    saving of natural resources, etc. </p>
            </div>

        </div>
    </div>
    <div class="container">
        <div class="flex flex-col md:flex-row mt-8 w-full justify-between">
            <div class="w-full p-5 md:w-1/2">
                <h2>Consultancy Services</h2>
                <p class="mt-3 text-lg">Mapping and analyzing for identifying problems, monitoring changes, managing and
                    responding to events, perform forecasting, setting priorities and understanding trends
                </p>
            </div>
            <div class="custom-cell w-1/2">
                <img src="images/consultancy.png" alt="" class="w-52">
            </div>
        </div>
    </div>

</section>

<section id='events' class="mt-16">
    <!-- <div class="container"> -->
    <div class="section-title">
        <h2>Events</h2>
    </div>
    <div class="bg-slate-100 p-12 mt-16">
        <p class="italic text-center text-2xl">We arrange wonderful and supportive events full of knowledge and experience for students and professionals. We are very concerned about enhancing your professional capacities.</p>
        <div class="flex flex-col md:flex-row space-x-4 md:space-x-0 mt-12">

            <div class="flex flex-1">
                <div id="default-carousel" class="relative w-full" data-carousel="slide">
                    <!-- Carousel wrapper -->
                    <div class="relative h-48 md:h-80 overflow-hidden  bg-slate-600">
                        <!-- Item 1 -->
                        <div class="hidden duration-700 ease-in-out h-full" data-carousel-item>
                            <img src="images/events/1.jpg" class="absolute block w-full h-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2 opacity-50" alt="...">
                            <p class="absolute top-20 left-0 text-center w-full h-full opacity-80 text-white text-lg z-30">It is description of the event</p>
                        </div>
                        <div class="hidden duration-700 ease-in-out" data-carousel-item>
                            <img src="images/events/2.jpg" class="absolute block w-full h-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
                        </div>
                        <div class="hidden duration-700 ease-in-out" data-carousel-item>
                            <img src="images/events/3.jpg" class="absolute block w-full h-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
                        </div>
                        <div class="hidden duration-700 ease-in-out" data-carousel-item>
                            <img src="images/events/4.jpg" class="absolute block w-full h-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
                        </div>
                        <div class="hidden duration-700 ease-in-out" data-carousel-item>
                            <img src="images/events/5.jpg" class="absolute block w-full h-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
                        </div>
                        <div class="hidden duration-700 ease-in-out" data-carousel-item>
                            <img src="images/events/6.jpg" class="absolute block w-full h-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
                        </div>
                        <div class="hidden duration-700 ease-in-out" data-carousel-item>
                            <img src="images/events/7.jpg" class="absolute block w-full h-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">

                        </div>
                        <div class="hidden duration-700 ease-in-out" data-carousel-item>
                            <img src="images/events/8.jpg" class="absolute block w-full h-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
                        </div>
                        <div class="hidden duration-700 ease-in-out" data-carousel-item>
                            <img src="images/events/9.jpg" class="absolute block w-full h-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
                        </div>
                        <div class="hidden duration-700 ease-in-out" data-carousel-item>
                            <img src="images/events/10.jpg" class="absolute block w-full h-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
                        </div>
                    </div>
                    <!-- Slider indicators -->
                    <div class="absolute z-30 flex space-x-3 -translate-x-1/2 bottom-5 left-1/2">
                        <button type="button" class="w-3 h-3 rounded-full" aria-current="true" aria-label="Slide 1" data-carousel-slide-to="0"></button>
                        <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 2" data-carousel-slide-to="1"></button>
                        <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 3" data-carousel-slide-to="2"></button>
                        <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 4" data-carousel-slide-to="3"></button>
                        <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 5" data-carousel-slide-to="4"></button>
                        <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 6" data-carousel-slide-to="5"></button>
                        <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 7" data-carousel-slide-to="6"></button>
                        <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 8" data-carousel-slide-to="7"></button>
                        <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 9" data-carousel-slide-to="8"></button>
                        <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 10" data-carousel-slide-to="9"></button>
                    </div>
                    <!-- Slider controls -->
                    <button type="button" class="absolute top-0 left-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-prev>
                        <span class="inline-flex items-center justify-center w-8 h-8 rounded-full sm:w-10 sm:h-10 bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                            <svg aria-hidden="true" class="w-5 h-5 text-white sm:w-6 sm:h-6 dark:text-gray-800" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                            </svg>
                            <span class="sr-only">Previous</span>
                        </span>
                    </button>
                    <button type="button" class="absolute top-0 right-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-next>
                        <span class="inline-flex items-center justify-center w-8 h-8 rounded-full sm:w-10 sm:h-10 bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                            <svg aria-hidden="true" class="w-5 h-5 text-white sm:w-6 sm:h-6 dark:text-gray-800" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                            </svg>
                            <span class="sr-only">Next</span>
                        </span>
                    </button>
                </div>
            </div>
            <div class="flex flex-1 flex-col justify-center items-center p-5">
                <!-- <h4 class="w-full underline underline-offset-8 text-cyan-800">Upcoming</h4> -->
                <div class="">
                    <div class="upcoming-event flex">
                        <div class="flex justify-center items-start">
                            <a href="" class="flex-centered bg-cyan-50 w-12 h-12">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-7 h-7 text-slate-500">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M14.857 17.082a23.848 23.848 0 005.454-1.31A8.967 8.967 0 0118 9.75v-.7V9A6 6 0 006 9v.75a8.967 8.967 0 01-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a24.255 24.255 0 01-5.714 0m5.714 0a3 3 0 11-5.714 0" />
                                </svg>
                            </a>
                        </div>
                        <div class="pl-5">
                            <h4>Seminars</h4>
                            <p>We have great seminars for you. Click here to read which seminars are waiting for your click</p>
                        </div>
                    </div>
                    <div class="upcoming-event flex mt-5">
                        <div class="flex justify-center items-start">
                            <a href="" class="flex-centered bg-cyan-50 w-12 h-12">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-7 h-7 text-slate-500">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M14.857 17.082a23.848 23.848 0 005.454-1.31A8.967 8.967 0 0118 9.75v-.7V9A6 6 0 006 9v.75a8.967 8.967 0 01-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a24.255 24.255 0 01-5.714 0m5.714 0a3 3 0 11-5.714 0" />
                                </svg>
                            </a>
                        </div>
                        <div class="pl-5">
                            <h4>Workshops</h4>
                            <p>We have great seminars for you. Click here to read which seminars are waiting for your click</p>
                        </div>
                    </div>
                    <div class="upcoming-event flex mt-5">
                        <div class="flex justify-center items-start">
                            <a href="" class="flex-centered bg-cyan-50 w-12 h-12">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-7 h-7 text-slate-500">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M14.857 17.082a23.848 23.848 0 005.454-1.31A8.967 8.967 0 0118 9.75v-.7V9A6 6 0 006 9v.75a8.967 8.967 0 01-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a24.255 24.255 0 01-5.714 0m5.714 0a3 3 0 11-5.714 0" />
                                </svg>
                            </a>
                        </div>
                        <div class="pl-5">
                            <h4>Trainings</h4>
                            <p>We have great seminars for you. Click here to read which seminars are waiting for your click</p>
                        </div>
                    </div>


                </div>

            </div>
        </div>
    </div>

</section>

<section class="container mt-12">
    <div class="section-title">
        <h2>FAQ</h2>
    </div>
    <div class="flex flex-col md:flex-row w-full space-y-4 md:space-x-4 my-12">
        <div class="flex flex-1">
            <ul class="list-disk space-y-2">
                <li class="flex items-center">
                    <svg class="w-4 h-4 mr-1.5 text-green-500 dark:text-green-400 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                    </svg>
                    What is your question yweyreiuwyrywie
                </li>
                <li class="flex items-center">
                    <svg class="w-4 h-4 mr-1.5 text-green-500 dark:text-green-400 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                    </svg>
                    What is your question yweyreiuwyrywie
                </li>
                <li class="flex items-center">
                    <svg class="w-4 h-4 mr-1.5 text-green-500 dark:text-green-400 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                    </svg>
                    What is your question yweyreiuwyrywie
                </li>
                <li class="flex items-center">
                    <svg class="w-4 h-4 mr-1.5 text-green-500 dark:text-green-400 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                    </svg>
                    What is your question yweyreiuwyrywie
                </li>
                <li class="flex items-center">
                    <svg class="w-4 h-4 mr-1.5 text-green-500 dark:text-green-400 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                    </svg>
                    What is your question yweyreiuwyrywie
                </li>
            </ul>

        </div>
        <div class="flex-1 overflow-x-hidden">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3535.6559355793825!2d74.29039268428063!3d31.49414510119047!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3919031d2ee1bf09%3A0x1727a9182c585b6e!2sRemote%20Sensing%2C%20GIS%20and%20Climatic%20Research%20Lab%20(RSGCRL)!5e0!3m2!1sen!2s!4v1682359604140!5m2!1sen!2s" width="450" height="300" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>

    </div>
    <div class="flex flex-col md:flex-row justify-center md:items-center w-full mt-12 space-y-3 md:space-x-4">
        <img src="{{url('images/mini/email-5.png')}}" alt="" class="w-16 -rotate-6">
        <input type="text" placeholder="Enter your mailing address" class="w-full md:w-3/4 px-3">
        <button class="btn-teal py-2 px-4">Submit</button>

    </div>


</section>
<!-- footer -->
<x-footer></x-footer>
@endsection

@section('script')
<script lang="javascript">
    alert();
    import {
        Carousel
    }
    from 'flowbite';
    const options = {
        defaultPosition: 1,
        interval: 3000,

        indicators: {
            activeClasses: 'bg-white dark:bg-gray-800',
            inactiveClasses: 'bg-white/50 dark:bg-gray-800/50 hover:bg-white dark:hover:bg-gray-800',
            items: [{
                    position: 0,
                    el: document.getElementById('carousel-indicator-1')
                },
                {
                    position: 1,
                    el: document.getElementById('carousel-indicator-2')
                },
                {
                    position: 2,
                    el: document.getElementById('carousel-indicator-3')
                },
                {
                    position: 3,
                    el: document.getElementById('carousel-indicator-4')
                },
            ]
        }
    }

    const carousel = new Carousel(items, options);

    // const $prevButton = document.getElementById('data-carousel-prev');
    // const $nextButton = document.getElementById('data-carousel-next');


    // $prevButton.addEventListener('click', () => {
    //     carousel.prev();
    // });

    // $nextButton.addEventListener('click', () => {
    //     carousel.next();
    // });
    animateSlide()
    setTimeout(animateSlide, 3000);

    function animateSlide() {

        // slide1 = document.getElementById('slide1');
        // slide1.toggleClass('active')
        $('#slide1').toggleClass('active');
    }
</script>
@endsection