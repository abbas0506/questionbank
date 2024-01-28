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
        <h2 class="mt-4">Select your grade</h2>
        <div class="grid grid-cols-2 md:grid-cols-4 gap-x-6 mt-6">
            @foreach($grades as $grade)
            <a href="{{route('student.services.selftest.subjects', $grade)}}" class="flex justify-center items-center btn-orange rounded-full h-16 w-16 ring-1 ring-offset-2">{{$grade->roman_name}}</a>
            @endforeach
        </div>


    </div>
</div>
<x-footer></x-footer>
@endsection