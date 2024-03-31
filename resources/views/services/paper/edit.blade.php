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

    <h2 class="text-lg mt-8">{{$test->subject->name}} - {{$test->subject->grade->roman_name}}</h2>
    <label for="">Edit Basic Setting <i class="bi-gear"></i></label>
    <!-- page message -->
    @if($errors->any())
    <x-message :errors='$errors'></x-message>
    @else
    <x-message></x-message>
    @endif

    <div class="my-6"></div>
    <!-- <h3 class="text-lg text-left mt-8"></h3> -->
    <form action="{{route('papers.update', $test)}}" method='post'>
        @csrf
        @method('PATCH')

        <div class="flex flex-col gap-3 text-left">
            <div class="flex flex-col">
                <label for="">Paper Title</label>
                <input name="title" class="custom-input" value="{{$test->title}}" required>
            </div>
            <div class="flex flex-col">
                <label for="">Scheduled Date : {{$test->test_date->format('M d, Y')}}</label>
                <input type="date" name="test_date" class="custom-input" value="{{$test->test_date->format('Y-m-d')}}" required>
            </div>

            <div class="flex flex-col w-full md:w-1/4">
                <label for="">Paper Duration (minutes)<i class="bi-clock ml-2"></i></label>
                @if($test->duration>0)
                <input type="number" id='duration' name="duration" class="custom-input text-center" value="{{$test->duration}}">
                @else
                <input type="number" id='duration' name="duration" class="custom-input text-center" value="{{round($test->totalMarks()*1.5,0)}}" min=0>
                @endif
            </div>

        </div>
        <button type="submit" class="fixed bottom-6 right-6 w-12 h-12 rounded-full btn-teal flex justify-center items-center"> <i class="bi-caret-right"></i></button>
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