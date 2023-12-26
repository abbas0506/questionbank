@extends('layouts.admin')
@section('page-content')
<div class="container">
    <h2>Edit Chapter Title</h2>
    <div class="bread-crumb">
        <a href="/">Home</a>
        <div>/</div>
        <a href="{{route('teacher.grades.show',$chapter->subject->grade_id)}}">{{$chapter->subject->grade->roman_name}}</a>
        <div>/</div>
        <a href="{{route('teacher.subjects.show',$chapter->subject)}}">{{$chapter->subject->name}}</a>
        <div>/</div>
        <div>Edit</div>
    </div>


    <div class="flex flex-col h-80 justify-center items-center w-full md:w-1/2 mx-auto">

        <div class="w-full">
            <!-- page message -->
            @if($errors->any())
            <x-message :errors='$errors'></x-message>
            @else
            <x-message></x-message>
            @endif
        </div>
        <form action="{{route('teacher.chapters.update',$chapter)}}" method='post' class="w-full mt-4" onsubmit="return validate(event)">
            @csrf
            @method('PATCH')
            <div class="flex flex-row items-center space-x-2">
                <label class="">Ch #</label>
                <h2>{{$chapter->chapter_no}}</h2>
            </div>
            <div class="flex flex-col mt-1">
                <label class="">Title</label>
                <input type="text" name='name' class="custom-input py-2" placeholder="Chapter title" value="{{$chapter->name}}">
            </div>
            <div class="mt-4">
                <button type="submmit" class="btn-teal rounded px-4 py-2">Update</button>
            </div>
        </form>

    </div>
</div>
@endsection