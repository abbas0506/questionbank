@extends('layouts.teacher')
@section('page-content')

<div class="container">
    <h1>Create Question</h1>
    <div class="bread-crumb">
        <a href="/">Home</a>
        <div>/</div>
        <a href="{{route('teacher.grades.index')}}">Grade Selection</a>
        <div>/</div>
        <div>{{$chapter->subject->grade->roman_name}}</div>
    </div>
    <div class="md:w-3/4 mx-auto mt-12">

        <label>{{$chapter->subject->grade->roman_name}} - {{$chapter->subject->name}}</label>
        <h2>Ch. # {{$chapter->chapter_no}} | {{$chapter->name}}</h2>

        <div class="grid grid-cols-1 sm:grid-cols-3 gap-2 mt-8">
            <div class="flex flex-col rounded border border-slate-200 p-3">
                <label for="">Short</label>
                <h3 class="mt-1">{{$chapter->subject->name}}</h3>
            </div>
            <div class="flex flex-col rounded border border-slate-200 p-3">
                <label for="">Long</label>
                <h3 class="mt-1">{{$chapter->subject->name}}</h3>
            </div>
            <div class="flex flex-col rounded border border-slate-200 p-3">
                <label for="">MCQs</label>
                <h3 class="mt-1">{{$chapter->subject->name}}</h3>
            </div>
        </div>


    </div>
    @endsection