@extends('layouts.teacher')
@section('page-content')
<div class="custom-container">
    <h2>Edit Chapter Title</h2>
    <div class="bread-crumb">
        <a href="/">Home</a>
        <div>/</div>
        <a href="{{route('teacher.qbank.index')}}">Q.bank</a>
        <div>/</div>
        <a href="{{route('teacher.grades.subjects.index',$subject->grade)}}">{{$subject->grade->roman_name}}</a>
        <div>/</div>
        <a href="{{route('teacher.subjects.chapters.index',$subject)}}">{{$subject->name}}</a>
        <div>/</div>
        <div>Ch.{{$chapter->chapter_no}}</div>
        <div>/</div>
        <div>Edit</div>
    </div>


    <div class="content-section">
        <label for="">Please fill in the name of subject and submit</label>
        <div class="divider my-3"></div>

        <div class="flex flex-col justify-center items-center w-full md:w-1/2 mx-auto">

            <div class="w-full">
                <!-- page message -->
                @if($errors->any())
                <x-message :errors='$errors'></x-message>
                @else
                <x-message></x-message>
                @endif
            </div>
            <form action="{{route('teacher.subjects.chapters.update',[$subject, $chapter])}}" method='post' class="w-full mt-4" onsubmit="return validate(event)">
                @csrf
                @method('PATCH')
                <div class="flex flex-col">
                    <label class="">Ch #</label>
                    <!-- <h2>{{$chapter->chapter_no}}</h2> -->
                    <input type="number" name='chapter_no' class="custom-input py-2 w-24" placeholder="Chapter #" value="{{$chapter->chapter_no}}">
                </div>
                <div class="flex flex-col mt-1">
                    <label class="">Title</label>
                    <input type="text" name='name' class="custom-input py-2" placeholder="Chapter title" value="{{$chapter->name}}">
                </div>
                <div class="my-4">
                    <button type="submmit" class="btn-teal rounded px-4 py-2">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection