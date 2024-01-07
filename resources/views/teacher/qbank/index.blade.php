@extends('layouts.teacher')
@section('page-content')

<div class="custom-container">
    <h1>Q. Bank</h1>
    <div class="bread-crumb">
        <a href="/">Home</a>
        <div>/</div>
        <div>Q.Bank</div>
        <div>/</div>
        <div>Grades</div>
    </div>
    <div class="content-section">
        <h2>Please select a grade</h2>
        <label for="">If your desired grade is missing, contant admin!</label>
        <div class="divider my-3"></div>
        <div class="flex flex-col justify-center items-center py-12">
            <div class="grid grid-cols-2 gap-2 w-full md:w-1/2">
                @foreach($grades as $grade)
                <a href="{{route('teacher.grades.subjects.index',$grade)}}" class="bg-teal-100 hover:bg-teal-300 flex h-16 justify-center items-center">{{$grade->roman_name}}</a>
                @endforeach
            </div>
        </div>



    </div>
    @endsection