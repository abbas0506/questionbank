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
    <label for="">Basic Setting <i class="bi-gear"></i></label>
    <!-- page message -->
    @if($errors->any())
    <x-message :errors='$errors'></x-message>
    @else
    <x-message></x-message>
    @endif

    <div class="flex flex-wrap justify-between items-center gap-2 pr-2  mt-8">
        <div class="flex relative">
            <p class="bg-green-100 text-green-700 px-4 py-2 rounded-md">Select chapter(s) for your question paper</p>
            <div class="w-4 h-4 bg-green-100 rotate-45 absolute -bottom-1 left-4"></div>
        </div>
        <div class="flex items-center space-x-2">
            <label for="check_all">Check All</label>
            <input type="checkbox" id='check_all' class="custom-input w-4 h-4 rounded">
        </div>
    </div>
    <!-- <h3 class="text-lg text-left mt-8"></h3> -->
    <form id='start-test-form' action="{{route('papers.store')}}" method='post' onsubmit="return validate(event)">
        @csrf
        <div class="mt-2">
            @foreach($chapters->sortBy('chapter_no') as $chapter)
            <div class="paper-chapter-container">
                <label for="chapter{{$chapter->chapter_no}}" class="text-base hover:cursor-pointer text-slate-800 text-left py-3 flex-1">{{$chapter->chapter_no}}. &nbsp {{$chapter->name}}</label>
                <input type="checkbox" id='chapter{{$chapter->chapter_no}}' name='chapter_id_array[]' class="custom-input w-4 h-4 rounded" value="{{ $chapter->id }}">
                <i class="bx bx-check"></i>
            </div>
            @endforeach
        </div>

        <h2 class="text-lg mt-8 text-left">Value Added Filters <span class="text-sm text-salte-600 ml-4">(optional)</span></h2>
        <div class="flex flex-col text-left mt-5">
            <div class="question-filter flex items-center space-x-2 border-b py-3">
                <label for="exercise_only" class="flex-1 text-base hover:cursor-pointer">Questions form exercise only</label>
                <input type="checkbox" id='exercise_only' name="exercise_only" class="custom-input w-4 h-4 rounded">
                <i class="bx bx-check"></i>
            </div>
            <div class="question-filter flex items-center space-x-2 border-b py-3">
                <label for="frequent_only" class="flex-1 text-base hover:cursor-pointer">Most frequent questions only</label>
                <input type="checkbox" id='frequent_only' name="frequent_only" class="custom-input w-4 h-4 rounded">
                <i class="bx bx-check"></i>
            </div>
        </div>


        <h2 class="text-lg mt-8 text-left">Additional Setting <span class="text-sm text-salte-600 ml-4">(optional)</span></h2>
        <div class="flex flex-col text-left gap-y-4 mt-5">
            <div>
                <label for="">Test Title</label>
                <input type="text" name="title" value='Sample Test' placeholder="e.g Chapter Series" class="custom-input">
            </div>

            <div>
                <label for="">Test Date</label>
                <input type="date" id='test_date' name="test_date" class="custom-input" value="{{ date('Y-m-d') }}">
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

    $('.paper-chapter-container input').change(function() {
        if ($(this).prop('checked'))
            $(this).parent().addClass('active')
        else
            $(this).parent().removeClass('active')
    })
    $('.question-filter input').change(function() {
        if ($(this).prop('checked'))
            $(this).parent().addClass('active')
        else
            $(this).parent().removeClass('active')
    })
    $('#check_all').change(function() {
        if ($(this).prop('checked')) {
            $('.paper-chapter-container input').each(function() {
                $(this).prop('checked', true)
                $(this).parent().addClass('active')
            })
        } else {
            $('.paper-chapter-container input').each(function() {
                $(this).prop('checked', false)
                $(this).parent().removeClass('active')
            })
        }
    })
</script>
@endsection