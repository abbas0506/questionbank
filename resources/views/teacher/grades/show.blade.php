@extends('layouts.teacher')
@section('page-content')

<div class="container">
    <h1>Create Question</h1>
    <div class="bread-crumb">
        <a href="{{url('teacher')}}">Home</a>
        <div>/</div>
        <a href="{{route('teacher.grades.index')}}">Grade Selection</a>
        <div>/</div>
        <div>{{$grade->roman_name}}</div>
    </div>
    <div class="md:w-3/4 mx-auto mt-24">

        <div class="grid grid-cols-4 sm:grid-cols-6 md:grid-cols-12 gap-2">
            @foreach($grades as $cell)
            @if($cell->id==$grade->id)
            <a href="{{route('teacher.grades.show', $cell)}}" class="flex bg-orange-300 h-8 justify-center items-center">{{$cell->roman_name}}</a>
            @else
            <a href="{{route('teacher.grades.show', $cell)}}" class="flex bg-orange-100 h-8 justify-center items-center">{{$cell->roman_name}}</a>
            @endif
            @endforeach
        </div>
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-2 mt-3">
            @foreach($grade->subjects as $subject)
            <a href="{{route('teacher.subjects.show', $subject)}}" class="flex bg-sky-100 h-16 justify-center items-center">{{$subject->name}}</a>
            @endforeach
        </div>

    </div>
    @endsection