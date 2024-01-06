@extends('layouts.teacher')
@section('page-content')

<div class="container">
    <h1>View MCQ</h1>
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
        <a href="{{route('teacher.chapters.mcq.index',$chapter)}}">MCQs</a>
        <div>/</div>
        <div>View</div>
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
        </div>
        <!-- <div class="divider my-3"></div> -->
        <div class="flex flex-col mt-3">
            <div class="p-5 mt-2 border border-slate-200">
                <p class="mb-5">{{$question->question}}</p>
                <div class="divider my-2"></div>
                <h2 class="">Ans.</h2>
                <ol class="list-[lower-alpha] pl-12 mt-2 text-slate-600">
                    <li @if($question->answer=='a') class='text-blue-700 font-semibold' @endif> {{$question->mcq->option_a}}</li>
                    <li @if($question->answer=='b') class='text-blue-700 font-semibold' @endif> {{$question->mcq->option_b}}</li>
                    <li @if($question->answer=='c') class='text-blue-700 font-semibold' @endif> {{$question->mcq->option_c}}</li>
                    <li @if($question->answer=='d') class='text-blue-700 font-semibold' @endif> {{$question->mcq->option_d}}</li>
                </ol>
            </div>
            <div class="flex flex-wrap justify-between items-center gap-2 mt-3">
                <label for="">From Exercise? @if($question->is_from_exercise==1) Yes @else No @endif</label>
                <div class="flex items-center">
                    <label for="">Bise Frequency: &nbsp</label>
                    <h2>{{ $question->bise_frequency }}</h2>
                </div>
            </div>
        </div>

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