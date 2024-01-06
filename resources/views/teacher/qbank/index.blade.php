@extends('layouts.teacher')
@section('page-content')

<div class="container">
    <h1>Q. Bank</h1>
    <div class="bread-crumb">
        <a href="/">Home</a>
        <div>/</div>
        <div>Q.Bank</div>
        <div>/</div>
        <div>Grades</div>
    </div>
    <div class="md:w-3/4 mx-auto mt-24">

        <div class="grid grid-cols-2 sm:grid-cols-4 gap-2">
            @foreach($grades as $grade)
            <a href="{{route('teacher.grades.subjects.index',$grade)}}" class="bg-teal-100 hover:bg-teal-300 flex h-16 justify-center items-center">{{$grade->roman_name}}</a>
            @endforeach
        </div>

    </div>
    @endsection