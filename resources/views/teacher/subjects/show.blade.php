@extends('layouts.teacher')
@section('page-content')

<div class="container">
    <h1>Create Question</h1>
    <div class="bread-crumb">
        <a href="{{url('teacher')}}">Home</a>
        <div>/</div>
        <a href="{{route('teacher.grades.index')}}">Grade Selection</a>
        <div>/</div>
        <div>{{$subject->grade->roman_name}}</div>
    </div>
    <div class="md:w-3/4 mx-auto mt-24">

        <div class="grid grid-cols-1 sm:grid-cols-2 gap-2">
            <div class="flex flex-col rounded border border-slate-200 p-3">
                <label for="">Grade</label>
                <h3 class="mt-1">{{$subject->grade->roman_name}}</h3>
            </div>
            <div class="flex flex-col rounded border border-slate-200 p-3">
                <label for="">Subject</label>
                <h3 class="mt-1">{{$subject->name}}</h3>
            </div>
        </div>

        @if($subject->chapters->count()>0)
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-2 mt-3 place-content-center">

            @foreach($subject->chapters->sortBy('chapter_no') as $chapter)
            <a href="{{route('teacher.chapters.show', $chapter)}}" class="flex bg-sky-100 hover:bg-sky-300 h-16 justify-center items-center">{{$chapter->name}}</a>
            @endforeach
            <a href="{{route('teacher.chapter.create',$subject)}}" class="flex justify-center items-center h-16 border border-sky-200 hover:bg-sky-300">New Chapter +</a>
        </div>
        @else
        <div class="grid place-content-center h-32 text-center">
            <p class="text-slate-500">Currently no chapter found</p>
            <a href="{{route('teacher.chapter.create',$subject)}}">Click here <i class="bi-plus-circle"></i> to start</a>
        </div>
        @endif

    </div>
    @endsection