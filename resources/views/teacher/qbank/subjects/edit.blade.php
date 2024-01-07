@extends('layouts.teacher')
@section('page-content')
<div class="custom-container">
    <h2>Edit Subject</h2>
    <div class="bread-crumb">
        <a href="/">Home</a>
        <div>/</div>
        <a href="{{route('teacher.qbank.index')}}">Q.bank</a>
        <div>/</div>
        <a href="{{route('teacher.grades.subjects.index',$grade)}}">{{$grade->roman_name}}</a>
        <div>/</div>
        <div>Edit Subject</div>
    </div>
    <div class="content-section">
        <label for="">Please fill in the name of subject and submit</label>
        <div class="divider my-3"></div>

        <div class="flex flex-col justify-center items-center w-full md:w-1/2 mx-auto">
            <div class="w-full my-5">
                <!-- page message -->
                @if($errors->any())
                <x-message :errors='$errors'></x-message>
                @else
                <x-message></x-message>
                @endif
            </div>
            <form action="{{route('teacher.grades.subjects.update',[$grade,$subject])}}" method='post' class="w-full">
                @csrf
                @method('PATCH')
                <div class="flex flex-col mt-1">
                    <label>Subject</label>
                    <input type="text" name='name' class="custom-input py-2" placeholder="Subject name" value="{{$subject->name}}">
                </div>
                <div class="mt-4">
                    <button type="submit" class="btn-teal rounded px-4 py-2">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection