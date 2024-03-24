@extends('layouts.basic')

@section('header')
<x-header></x-header>
@endsection

@section('body')

<style>
    .filled-header::before {
        background-color: darkcyan;
        content: "";
        position: fixed;
        height: 40%;
        width: 100%;
        top: 0px;
        left: 0;
        z-index: -1;
        opacity: 1;
    }
</style>
<div class="flex flex-col justify-center items-center h-screen w-screen px-5 md:px-24">
    <div class="text-center">
        <h1 class="text-3xl">SERVICES</h1>
        <p class="text-slate-600 mt-6 leading-relaxed w-2/3 mx-auto">We extend our valuable services to only students, teachers and institutions. This is an integrated application that provides all in one solution for examining students and tracking their performance through statistical as well as graphical tools</p>
    </div>
    <div class="w-ful grid grid-cols-3 gap-6 mt-16">
        <div class="feature-box border-pink-300 bg-pink-50 hover:bg-pink-300" data-aos="fade-up" data-aos-duration="1500">
            <!-- <div class="flex items-center justify-center bg-pink-100 rounded-full w-16 h-16">
                <i class="bi-book text-2xl text-pink-400"></i>
            </div> -->
            <h3 class="mt-3 text-lg">Students</h3>
            <p class="text-sm text-center">Our online self-assessment tool helps you prepare for your exams in a very short time.</p>
        </div>

        <div class="feature-box border-orange-300 bg-orange-50 hover:bg-orange-300" data-aos="fade-up" data-aos-duration="1500">
            <!-- <div class="flex items-center justify-center bg-orange-100 rounded-full w-16 h-16">
                <i class="bi-laptop text-2xl text-orange-400"></i>
            </div> -->
            <h3 class="mt-3 text-lg">Teachers</h3>
            <p class="text-sm text-center">Our custom paper generation tool saves your time, effort and printing cost.</p>
        </div>

        <div class="feature-box border-cyan-200 bg-cyan-50 hover:bg-cyan-300" data-aos="fade-up" data-aos-duration="1500">
            <!-- <div class="flex items-center justify-center bg-cyan-100 rounded-full w-16 h-16">
                <i class="bi bi-palette text-2xl text-cyan-400"></i>
            </div> -->
            <h3 class="mt-3 text-lg">Institutions</h3>
            <p class="text-sm text-center">Our progress analysis tool can make your institution distinguished among others </p>
        </div>

    </div>


    <!-- <div class="filled-top-area"></div>


    <div class="filled-area absolute bottom-1/3 left-1/2 h-48 w-48 bg-teal-200 transform scale-80 scale-y-125 skew-x-12 -translate-x-[70%] -translate-y-[50%]"></div>
    <div class="absolute bottom-0 left-0 h-96 w-24 rotate-45 bg-teal-200 transform scale-150 skew-x-12 -translate-x-[50%] -translate-y-[50%]"></div>
 -->

    <!-- <div class="flex justify-center items-end flex-1">
        <img src="{{url(asset('/images/small/self-practice.jpg'))}}" alt="" class="w-[30rem]">
    </div>
    <div class="text-center flex flex-col  h-48 md:h-32">
        <div class=" text-gray-900 text-3xl md:text-4xl text-center">"Practice makes a man perfect".</div>
        <p class="md:w-1/2 text-gray-800 text-center">Do you know that you are the best mentor of your own self. Self testing lets you recognize your deficiencies and helps you become perfect to achieve high goals. <br></p>
        <a href="{{route('selftest.index')}}">
            <button class="btn-orange mt-5">Go Next <i class="bi-arrow-right"></i></button>
        </a>
    </div> -->

</div>

</section>
@endsection