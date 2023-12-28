@extends('layouts.teacher')
@section('page-content')

<div class="container">
    <h1>Test Draft</h1>
    <div class="bread-crumb">
        <a href="/">Home</a>
        <div>/</div>
        <div>Draft</div>
    </div>
    <div class="md:w-3/4 mx-auto mt-12">
        <!-- page message -->
        @if($errors->any())
        <x-message :errors='$errors'></x-message>
        @else
        <x-message></x-message>
        @endif

        <div class="flex justify-between items-center">
            <div>
                <label>{{$test->title}}</label>
                <h2>{{$test->subject->grade->roman_name}} - {{$test->subject->name}}</h2>
            </div>
            <div class="flex items-center space-x-4">
                <div class="text-center">
                    <h2>{{$test->questions->count()}}</h2>
                    <label for="">Total Questions</label>
                </div>
            </div>
        </div>
        <div class="divider my-3"></div>
        @if($test->questions->count()>0)
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-2 mt-3 place-content-center">


        </div>
        @endif
        <div class="divider my-8"></div>
        <div class="flex flex-col justify-center items-center gap-4">
            <i class="bi-plus-circle text-2xl text-slate-400"></i>
            <div class="flex space-x-2">
                <a href="{{route('teacher.tests.questions.add', 'short')}}" class="btn-teal rounded-full px-4 py-1 text-xs">Sort</a>
                <a href="{{route('teacher.tests.questions.add', 'long')}}" class="btn-orange rounded-full px-4 py-1 text-xs">Long</a>
                <a href="{{route('teacher.tests.questions.add', 'mcq')}}" class="btn-sky rounded-full px-4 py-1 text-xs">MCQs</a>
            </div>
        </div>
    </div>
</div>
@endsection