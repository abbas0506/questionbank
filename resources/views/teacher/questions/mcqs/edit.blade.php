@extends('layouts.teacher')
@section('page-content')

<div class="container">
    <h1>Edit MCQ</h1>
    <div class="bread-crumb">
        <a href="{{route('teacher.questions.view',[$question->chapter, 'mcq'])}}">Cancel & Go Back</a>
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
                <label>{{$question->chapter->subject->grade->roman_name}} - {{$question->chapter->subject->name}}</label>
                <h2>Ch. # {{$question->chapter->chapter_no}} | {{$question->chapter->name}}</h2>
            </div>
            <div class="flex items-center space-x-4">
                <div class="text-center">
                    <i class="bx bx-pencil text-xl text-green-600"></i>
                </div>
            </div>
        </div>

        <form action="{{route('teacher.mcqs.update', $question)}}" method='post' class="mt-4" onsubmit="return validate(event)">
            @csrf
            @method('PATCH')
            <div class="flex items-center gap-2">
                <input type="checkbox" id='is_from_exercise' name='is_from_exercise' class="w-6 h-6 chk bg-blue-100 border-blue-300 text-blue-500 focus:ring-blue-200" value='1' @checked($question->is_from_exercise==1)>
                <label for="">From Exercise?</label>
            </div>
            <textarea type="text" name="question" class="custom-input py-2 mt-2" rows='1' placeholder="Question">{{$question->question}}</textarea>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-x-12 gap-y-2 mt-3 p-4 border">
                <div class="flex items-center space-x-2">
                    <input type="checkbox" name='answer_a' class="answer w-6 h-6 bg-blue-100 border-blue-300 text-blue-500 focus:ring-blue-200 ml-3" value='1' @checked($question->answer=='a')>
                    <input type="text" name='option_a' class="flex-1 custom-input" placeholder="a." value="{{$question->mcq->option_a}}">
                </div>
                <div class="flex items-center space-x-2">
                    <input type="checkbox" name='answer_b' class="answer w-6 h-6 bg-blue-100 border-blue-300 text-blue-500 focus:ring-blue-200 ml-3" value='1' @checked($question->answer=='b')>
                    <input type="text" name='option_b' class="flex-1 custom-input" placeholder="b." value="{{$question->mcq->option_b}}">
                </div>
                <div class="flex items-center space-x-2 mt-3">
                    <input type="checkbox" name='answer_c' class="answer w-6 h-6 bg-blue-100 border-blue-300 text-blue-500 focus:ring-blue-200 ml-3" value='1' @checked($question->answer=='c')>
                    <input type="text" name='option_c' class="flex-1 custom-input" placeholder="c." value="{{$question->mcq->option_c}}">
                </div>
                <div class="flex items-center space-x-2">
                    <input type="checkbox" name='answer_d' class="answer w-6 h-6 bg-blue-100 border-blue-300 text-blue-500 focus:ring-blue-200 ml-3" value='1' @checked($question->answer=='d')>
                    <input type="text" name='option_d' class="flex-1 custom-input" placeholder="d." value="{{$question->mcq->option_d}}">
                </div>
            </div>
            <div class="flex items-center justify-between mt-2">
                <label for="">Bise Frequency</label>
                <input type="text" name="bise_frequency" value="{{$question->bise_frequency}}" class="custom-input w-16 text-center ml-3 py-0">
            </div>
            <div class="divider my-3"></div>
            <div class="flex justify-end">
                <button type="submit" class="btn-teal rounded p-2">Update Now</button>
            </div>
        </form>

    </div>
    @endsection
    @section('script')
    <script type="module">
        $('.answer').change(function() {
            $('.answer').not(this).prop('checked', false);
            $(this).prop('checked', true)
        });
    </script>
    @endsection