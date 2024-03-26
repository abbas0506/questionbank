@extends('layouts.basic')

@section('header')
<x-header></x-header>
@endsection

@section('body')
<div class="w-full md:w-2/3 mx-auto text-center mt-32 px-5">

    <h1 class="text-3xl">PAPER GENERATION</h1>
    <p class="mt-3"><span class="text-xs bg-cyan-300 px-2 py-1 rounded-full">Free Version</span></p>
    <p class="text-slate-600 leading-relaxed mt-6">Free version is bit limited, however, you can generate paper upto 20 marks without any other restriction. Try it and see how well we can save your time, effort and cost of paper. </p>
    <div class="h-1 w-24 bg-teal-800 mx-auto mt-6"></div>

    <h2 class="text-lg mt-8">{{$subject->name}} - {{$subject->grade->roman_name}}</h2>

    <!-- page message -->
    @if($errors->any())
    <x-message :errors='$errors'></x-message>
    @else
    <x-message></x-message>
    @endif

    <div class="flex relative mt-8">
        <h2 class="bg-green-200 text-green-700 px-4 py-2 rounded-md">Please select chapter(s) for test</h2>
        <div class="w-4 h-4 bg-green-200 rotate-45 absolute -bottom-1 left-4"></div>
    </div>
    <!-- <h3 class="text-lg text-left mt-8"></h3> -->
    <form id='start-test-form' action="{{route('papergeneration-demo.store')}}" method='post' onsubmit="return validate(event)">
        @csrf
        <div class="mt-2">
            @foreach($chapters->sortBy('chapter_no') as $chapter)
            <div class="flex items-center justify-between space-x-2 border-b">
                <label for="chapter{{$chapter->chapter_no}}" class="hover:cursor-pointer text-base text-slate-800 text-left py-3 flex-1">{{$chapter->chapter_no}}. &nbsp {{$chapter->name}}</label>
                <input type="checkbox" id='chapter{{$chapter->chapter_no}}' name='chapter_id_array[]' class="custom-input w-4 h-4" value="{{ $chapter->id }}">
            </div>
            @endforeach
        </div>


        <h2 class="text-lg mt-8 text-left">Additional Setting <span class="text-sm text-salte-600 ml-4">(optional)</span></h2>
        <!-- <div class="h-1 w-24 bg-teal-800 mx-auto mt-6"></div> -->
        <div class="flex flex-col gap-x-4 gap-y-2 text-left mt-5">
            <label for="">Institution Name</label>
            <input type="text" name="title" value='' placeholder="Your institution name" class="custom-input">

            <div class="flex flex-col gap-4">
                <div class="">
                    <label for="">Test Date</label>
                    <input type="date" id='test_date' name="test_date" class="custom-input" value="{{ date('Y-m-d') }}">
                </div>
                <div class="flex items-center space-x-2 border-b">
                    <label for="exercise_only" class="flex-1 py-2 text-base hover:cursor-pointer">Questions form exercise only</label>
                    <input type="checkbox" id='exercise_only' name="exercise_only" class="custom-input w-5 h-5">
                </div>
                <div class="flex items-center space-x-2 border-b">
                    <label for="frequent_only" class="flex-1 py-2 text-base hover:cursor-pointer">Most frequent questions only</label>
                    <input type="checkbox" id='frequent_only' name="frequent_only" class="custom-input w-5 h-5">
                </div>
            </div>

        </div>

        <input type="hidden" name='subject_id' value="{{$subject->id}}">
        <div class="border-b border-slate-100 my-12"></div>

        <button type="submit" class="fixed bottom-6 right-6 w-12 h-12 rounded-full btn-teal flex justify-center items-center" @disabled($chapters->count()==0)> <i class="bi-caret-right"></i></button>
    </form>
</div>
@endsection
@section('footer')
<x-footer></x-footer>
@endsection
@section('script')
<script type="module">
    $('document').ready(function() {
        $('#start-test-form').submit(function(e) {
            var anyChecked = 0
            $('.custom-input').each(function() {
                if ($(this).is(':checked'))
                    anyChecked++;
            })
            if (anyChecked == 0) {
                event.preventDefault();
                Swal.fire({
                    icon: 'warning',
                    title: 'Please select a chapter',
                    showConfirmButton: false,
                    timer: 1000,
                })

            }
        })
    })
</script>
@endsection