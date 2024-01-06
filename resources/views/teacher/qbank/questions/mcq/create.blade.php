@extends('layouts.teacher')
@section('page-content')

<div class="container">
    <h1>New MCQ</h1>
    <div class="bread-crumb">
        <a href="/">Home</a>
        <div>/</div>
        <a href="{{route('teacher.qbank.index')}}">Q.bank</a>
        <div>/</div>
        <a href="{{route('teacher.grades.subjects.index',$chapter->subject->grade)}}">{{$chapter->subject->grade->roman_name}}</a>
        <div>/</div>
        <a href="{{route('teacher.subjects.chapters.index',$chapter->subject)}}">{{$chapter->subject->name}}</a>
        <div>/</div>
        <a href="{{route('teacher.subjects.chapters.show',[$chapter->subject, $chapter])}}">Ch.{{$chapter->chapter_no}}</a>
        <div>/</div>
        <a href="{{route('teacher.chapters.mcq.index',$chapter)}}">MCQ</a>
        <div>/</div>
        <div>New</div>
    </div>
    <div class="md:w-3/4 mx-auto mt-12">


        <div class="flex justify-between items-center">
            <div>
                <label>{{$chapter->subject->grade->roman_name}} - {{$chapter->subject->name}}</label>
                <h2>Ch. # {{$chapter->chapter_no}} | {{$chapter->name}}</h2>
            </div>
            <div class="flex items-center space-x-4">
                <div class="text-center">
                    <h2># {{$chapter->questions()->mcqs()->count()+1}}</h2>
                    <label for="">MCQ</label>
                </div>
            </div>
        </div>
        <!-- page message -->
        @if($errors->any())
        <x-message :errors='$errors'></x-message>
        @else
        <x-message></x-message>
        @endif
        <form action="{{route('teacher.chapters.mcq.store', $chapter)}}" method='post' class="mt-4" onsubmit="return validate(event)">
            @csrf
            <div class="flex items-center gap-2">
                @php
                $isFromExercise=session('isFromExercise');
                @endphp
                <input type="checkbox" id='is_from_exercise' name='is_from_exercise' class="w-6 h-6 chk bg-blue-100 border-blue-300 text-blue-500 focus:ring-blue-200" value='1' @checked($isFromExercise)>
                <label for="">From Exercise?</label>

            </div>
            <textarea type="text" name="question" class="custom-input py-2 mt-2" rows='1' placeholder="Question"></textarea>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-x-12 gap-y-2 mt-3 p-4 border bg-slate-100">
                <div class="flex items-center space-x-2">
                    <input type="checkbox" name='answer_a' class="answer w-6 h-6 bg-blue-100 border-blue-300 text-blue-500 focus:ring-blue-200 ml-3" value='1' checked>
                    <input type="text" name='option_a' class="flex-1 custom-input" placeholder="a.">
                </div>
                <div class="flex items-center space-x-2">
                    <input type="checkbox" name='answer_b' class="answer w-6 h-6 bg-blue-100 border-blue-300 text-blue-500 focus:ring-blue-200 ml-3" value='1'>
                    <input type="text" name='option_b' class="flex-1 custom-input" placeholder="b.">
                </div>
                <div class="flex items-center space-x-2 mt-3">
                    <input type="checkbox" name='answer_c' class="answer w-6 h-6 bg-blue-100 border-blue-300 text-blue-500 focus:ring-blue-200 ml-3" value='1'>
                    <input type="text" name='option_c' class="flex-1 custom-input" placeholder="c.">
                </div>
                <div class="flex items-center space-x-2">
                    <input type="checkbox" name='answer_d' class="answer w-6 h-6 bg-blue-100 border-blue-300 text-blue-500 focus:ring-blue-200 ml-3" value='1'>
                    <input type="text" name='option_d' class="flex-1 custom-input" placeholder="d.">
                </div>
            </div>
            <div class="flex items-center justify-between mt-2">
                <label for="">Bise Frequency</label>
                <input type="text" name="bise_frequency" value="2" class="custom-input w-16 text-center ml-3 py-0">
            </div>

            <div class="mt-4">
                <button type="submit" class="btn-teal rounded p-2 w-full">Create Now</button>
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