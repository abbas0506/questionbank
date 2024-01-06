@extends('layouts.teacher')
@section('page-content')
<div class="container">
    <h2>Add Subject</h2>
    <div class="bread-crumb">
        <a href="/">Home</a>
        <div>/</div>
        <a href="{{route('teacher.qbank.index')}}">Q.bank</a>
        <div>/</div>
        <a href="{{route('teacher.grades.subjects.index',$grade)}}">{{$grade->roman_name}}</a>
        <div>/</div>
        <div>Add Subject</div>
    </div>
    <div class="flex flex-col h-80 justify-center items-center w-full md:w-1/2 mx-auto">
        <div class="w-full my-5">
            <!-- page message -->
            @if($errors->any())
            <x-message :errors='$errors'></x-message>
            @else
            <x-message></x-message>
            @endif
        </div>
        <form action="{{route('teacher.grades.subjects.store',$grade)}}" method='post' class="w-full" onsubmit="return validate(event)">
            @csrf
            <div class="flex flex-col mt-1">
                <label>Subject</label>
                <input type="text" name='name' class="custom-input py-2" placeholder="Subject name" value="">
            </div>
            <div class="mt-4">
                <button type="submmit" class="btn-teal rounded px-4 py-2">Create Now</button>
            </div>
        </form>
    </div>
</div>
@endsection