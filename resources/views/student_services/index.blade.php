@extends('layouts.basic')

@section('header')
<x-header></x-header>
@endsection

@section('body')

<div class="flex flex-col h-screen w-max-screen gap-y-2 items-center">
    <div class="flex justify-center items-end flex-1">
        <img src="{{url(asset('/images/small/self-practice.jpg'))}}" alt="" class="w-[30rem]">
    </div>
    <div class="text-center flex flex-col  h-48 md:h-32">
        <div class=" text-gray-900 text-3xl md:text-4xl text-center">"Practice makes a man perfect".</div>
        <!-- <p class="md:w-1/2 text-gray-800 text-center">Do you know that you are the best mentor of your own self. Self testing lets you recognize your deficiencies and helps you become perfect to achieve high goals. <br></p> -->
        <a href="{{route('selftest.index')}}">
            <button class="btn-orange mt-5">Go Next <i class="bi-arrow-right"></i></button>
        </a>
    </div>

</div>

</section>
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