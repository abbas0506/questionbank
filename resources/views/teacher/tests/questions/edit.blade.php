@extends('layouts.teacher')
@section('page-content')

<div class="container">
    <h1>Edit Marks</h1>
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
                <label>{{$testQuestionPart->testQuestion->test->title}}</label>
                <h2>{{$testQuestionPart->testQuestion->test->subject->grade->roman_name}} - {{$testQuestionPart->testQuestion->test->subject->name}}</h2>
            </div>
            <div class="flex items-center space-x-4">
                <div class="text-center">
                    <h2>{{$testQuestionPart->testQuestion->question_no}}</h2>
                    <label for="">Question #</label>
                </div>
            </div>
        </div>
        <div class="divider my-3"></div>
        <form action="{{route('teacher.question-parts.update', $testQuestionPart)}}" method='post' class="mt-4" onsubmit="return validate(event)">
            @csrf
            @method('PATCH')

            <div class="flex items-center gap-2">
                <div class="flex flex-col flex-1">
                    <label for="">Question</label>
                    <h3>{{$testQuestionPart->question->question}}</h3>
                </div>

                <div class="flex flex-col text-center">
                    <label for="">Marks</label>
                    <input type="number" name="marks" class="w-16 text-center p-0" value="{{$testQuestionPart->marks}}">
                </div>
            </div>
            <div class="divider my-3"></div>
            <div class="text-right">
                <button type="submit" class="btn-teal rounded px-4">Save Now</button>
            </div>
        </form>

    </div>
</div>
@endsection