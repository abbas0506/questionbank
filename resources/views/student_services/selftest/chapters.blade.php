@extends('layouts.basic')

@section('header')
<x-header></x-header>
@endsection

@section('body')
<style>
    .hero {
        background-image: linear-gradient(rgba(0, 100, 100, 1.0),
                rgba(128, 128, 128, 0));
        /* url("{{asset('/images/bg/quiz-0.png')}}"); */
        background-position: center;
        background-repeat: no-repeat;
        background-size: contain;
        background-clip: border-box;
        position: relative;
    }
</style>
<div class="hero min-h-screen max-w-screen">
    <div class="pt-40 flex flex-col w-full h-full justify-center items-center">
        <div class="text-orange-200 text-3xl md:text-4xl text-center">Self Test</div>
        <div class="border-y py-4 mt-6 text-xl text-center text-slate-100">Grade {{$subject->grade->roman_name}}, {{$subject->name}}</div>
        <h2 class="mt-4">Please choose a chapter</h2>

        <!-- page message -->
        @if($errors->any())
        <x-message :errors='$errors'></x-message>
        @else
        <x-message></x-message>
        @endif

        <form id='start-test-form' action="{{route('selftest.store')}}" method='post' onsubmit="return validate(event)">
            @csrf
            <div class="grid grid-cols-1 md:grid-cols-2 gap-x-12 gap-y-4 mt-8">
                @foreach($chapters->sortBy('chapter_no') as $chapter)
                <div class="flex items-center space-x-2">
                    <input type="checkbox" id='chapter{{$chapter->chapter_no}}' name='chapter_id_array[]' class="custom-input w-4 h-4" value="{{ $chapter->id }}">
                    <label for="chapter{{$chapter->chapter_no}}" class="hover:cursor-pointer text-base text-slate-800">{{$chapter->chapter_no}}. {{$chapter->name}}</label>
                </div>
                @endforeach
            </div>
            <input type="hidden" name='subject_id' value="{{$subject->id}}">
            <div class="border-b border-slate-100 my-12"></div>
            <!-- <div class=""> -->
            <button type="submit" class="fixed bottom-6 right-6 w-12 h-12 rounded-full btn-teal flex justify-center items-center" @disabled($chapters->count()==0)> <i class="bi-caret-right"></i></button>
            <!-- </div> -->

        </form>
    </div>
</div>
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