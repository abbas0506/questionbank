@extends('layouts.basic')

@section('header')
<x-header></x-header>
@endsection

@section('body')
<style>
    .hero {
        background-image: linear-gradient(rgba(0, 100, 100, 1.0),
            rgba(128, 128, 128, 0)),
        url("{{asset('/images/bg/exams1-01.svg')}}");
        background-position: center;
        background-repeat: no-repeat;
        background-size: contain;
        background-clip: border-box;
        position: relative;
    }
</style>
<div class="hero h-screen max-w-screen">
    <div class="flex flex-col gap-y-2 px-5 w-full h-full justify-center items-center">
        <div class="text-gray-900 text-3xl md:text-4xl text-center">Become High Achiever</div>
        <p class="md:w-1/2 text-gray-800 text-center">Do you know that you are the best mentor of your own self. Self testing lets you recognize your deficiencies and helps you become perfect to achieve high goals. <br>"Practice makes a man perfect".</p>
        <a href="{{route('selftest.index')}}">
            <button class="btn-orange mt-5">Start Test <i class="bi-arrow-right"></i></button>
        </a>
    </div>
</div>

<div class="flex flex-col md:flex-row justify-center md:items-center w-full mt-12 space-y-3 md:space-x-4">
    <img src="{{url('images/mini/email-5.png')}}" alt="" class="w-16 -rotate-6">
    <input type="text" placeholder="Enter your mailing address" class="w-full md:w-3/4 px-3 custom-input">
    <button class="btn-teal py-2 px-4">Submit</button>

</div>


</section>
<!-- footer -->
<x-footer></x-footer>
@endsection

@section('script')
<script lang="javascript">
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