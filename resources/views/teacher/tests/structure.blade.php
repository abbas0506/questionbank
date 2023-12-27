@extends('layouts.teacher')
@section('page-content')

<div class="container">
    <h1>New Test</h1>
    <div class="bread-crumb">
        <a href="/">Home</a>
        <div>/</div>
        <div>New Test</div>
    </div>
    <div class="md:w-3/4 mx-auto mt-12">
        <!-- page message -->
        @if($errors->any())
        <x-message :errors='$errors'></x-message>
        @else
        <x-message></x-message>
        @endif

        <form action="{{route('teacher.tests.create')}}" method='post' class="mt-4" onsubmit="return validate(event)">
            @csrf
            <div class="flex flex-col gap-x-4 gap-y-1">
                <input type="text" placeholder="Test Title" class="custom-input">
                <input type="date" class="custom-input">
                <div class="flex items-center space-x-2">
                    <input type="checkbox" class="custom-input w-8 h-8">
                    <label>Exercise Only</label>
                </div>
                <div class="flex items-center space-x-2">
                    <input type="checkbox" class="custom-input w-8 h-8">
                    <label>Most Frequent Only</label>
                </div>
            </div>
            <div class="mt-6">
                <button type="submit" class="btn-teal rounded p-2 w-full">Create Now</button>
            </div>
        </form>
    </div>
</div>
@endsection