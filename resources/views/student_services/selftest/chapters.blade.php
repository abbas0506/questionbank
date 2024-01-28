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
<div class="hero min-h-screen max-w-screen">
    <div class="pt-48 flex flex-col w-full h-full justify-center items-center">
        <div class="text-gray-900 text-3xl md:text-4xl text-center">Self Test</div>
        <div class="border-y py-4 mt-6 text-2xl text-center text-slate-100">Grade {{$subject->grade->roman_name}}, {{$subject->name}}</div>
        <h2 class="mt-4">Please choose a chapter</h2>

        <!-- page message -->
        @if($errors->any())
        <x-message :errors='$errors'></x-message>
        @else
        <x-message></x-message>
        @endif

        <form action="{{route('selftest.store')}}" method='post' onsubmit="return validate(event)">
            @csrf
            <div class="grid grid-cols-1 md:grid-cols-1 gap-4 mt-6">
                @foreach($chapters->sortBy('chapter_no') as $chapter)
                <div class="flex items-center space-x-2">
                    <input type="checkbox" name='chapter_id_array[]' class="custom-input w-6 h-6" value="{{ $chapter->id }}">
                    <p>{{$chapter->chapter_no}}. {{$chapter->name}}</p>
                </div>
                @endforeach
            </div>
            <input type="hidden" name='subject_id' value="{{$subject->id}}">
            <div class="border-b border-orange-300 my-3"></div>
            <div class="text-center">
                <button type="submit" class="btn-teal rounded py-2 px-4" @disabled($chapters->count()==0)> Start Test <i class="bi-arrow-right"></i></button>
            </div>

        </form>
    </div>
</div>
<x-footer></x-footer>
@endsection