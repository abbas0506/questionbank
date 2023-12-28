@extends('layouts.teacher')
@section('page-content')

<div class="container">
    <h1>Question Structure</h1>
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
                    <h2>{{$test->questions->count()+1}}</h2>
                    <label for="">Question #</label>
                </div>
            </div>
        </div>
        <div class="divider my-3"></div>
        <form action="{{route('teacher.test.question.parts.store')}}" method='post' class="mt-4" onsubmit="return validate(event)">
            @csrf
            <input type="hidden" name="test_id" value="{{$test->id}}">
            <input type="hidden" name="question_type" value="{{$questionType}}">
            <div class="flex items-baseline space-x-4">
                <label for="">Question Type :</label>
                <h3>{{ucwords($questionType)}}</h3>
            </div>
            <div class="divider my-3"></div>
            <h3>Please mention chapter wise distribution of parts / questions.</h3>


            @foreach($chapters as $chapter)
            <div class="flex items-baseline justify-between space-x-4">
                <label for="">{{$chapter->chapter_no}}. &nbsp {{$chapter->name}}</label>
                <input type="hidden" name='chapter_id[]' value="1">
                <input type="number" name='necessary_parts[]' class="custom-input w-16 h-8 text-center px-0" value="0">
            </div>
            @endforeach
            <div class="divider my-3"></div>
            <div class="flex items-baseline justify-between space-x-4">
                <label for="">How many parts / question to answer at least?</label>
                <input type="number" class="custom-input w-16 h-8 text-center px-0" value="0">
            </div>
            <div class="divider my-3"></div>
            <div class="text-right">
                <button type="submit" class="btn-teal rounded px-4">Save Now</button>
            </div>
        </form>

    </div>
</div>
@endsection