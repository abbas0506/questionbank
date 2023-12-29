@extends('layouts.teacher')
@section('page-content')

<div class="container">
    <h1>Edit Test Setting</h1>
    <div class="bread-crumb">
        <a href="/">Home</a>
        <div>/</div>
        <div>Draft</div>
    </div>
    <div class="md:w-3/4 mx-auto mt-12">
        <!-- page message -->
        @if($errors->any())
        <x-message :errors='$errors'></x-message>
        @else
        <x-message></x-message>
        @endif


        <div>
            <label>{{$test->title}}</label>
            <h2>{{$test->subject->grade->roman_name}} - {{$test->subject->name}}</h2>
        </div>

        <div class="divider my-8"></div>
        <form action="{{route('teacher.tests.update', $test)}}" method='post' class="mt-4" onsubmit="return validate(event)">
            @csrf
            @method('PATCH')

            <div class="flex flex-col gap-2">
                <div class="flex flex-col flex-1">
                    <label for="">Title</label>
                    <input name="title" class="custom-input" value="{{$test->title}}">
                </div>

                <div class="flex flex-col">
                    <label for="">Duration</label>
                    <input type="number" name="duration" class="w-16 custom-input text-center p-0" value="{{$test->duration}}">
                </div>
            </div>
            <div class="divider my-8"></div>
            <div class="text-right">
                <button type="submit" class="btn-teal rounded px-4">Save Now</button>
            </div>
        </form>

    </div>
</div>
@endsection