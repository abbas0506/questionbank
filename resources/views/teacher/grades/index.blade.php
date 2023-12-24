@extends('layouts.teacher')
@section('page-content')

<div class="container">
    <h1>Create Question</h1>
    <div class="bread-crumb">
        <a href="{{url('teacher')}}">Home</a>
        <div>/</div>
        <div>Grade Selection</div>
    </div>
    <div class="md:w-3/4 mx-auto mt-24">

        <div class="grid grid-cols-3 sm:grid-cols-4 md:grid-cols-6 gap-2">
            @foreach($grades as $grade)
            <a href="{{route('teacher.grades.show', $grade)}}" class="flex bg-orange-100 h-16 justify-center items-center">{{$grade->roman_name}}</a>
            @endforeach
        </div>

    </div>
    @endsection