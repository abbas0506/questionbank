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
    <div class="flex flex-col w-full h-full justify-center items-center">
        <div class="text-gray-900 text-3xl md:text-4xl text-center">Self Test</div>

        <div class="border-y py-4 mt-6 text-2xl text-center text-slate-100">Grade {{$grade->roman_name}}</div>
        <h2 class="mt-4">Please choose a subject</h2>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mt-6">
            @foreach($subjects as $subject)
            <a href="{{route('student.services.selftest.chapters', $subject)}}" class="flex justify-center items-center btn-orange">{{$subject->name}}</a>
            @endforeach
        </div>
    </div>
</div>
<x-footer></x-footer>
@endsection