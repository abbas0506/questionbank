@extends('layouts.teacher')
@section('page-content')
<div class="custom-container">
    <h2>New Chapter</h2>
    <div class="bread-crumb">
        <a href="/">Home</a>
        <div>/</div>
        <a href="{{route('teacher.qbank.index')}}">Q.bank</a>
        <div>/</div>
        <a href="{{route('teacher.grades.subjects.index',$subject->grade)}}">{{$subject->grade->roman_name}}</a>
        <div>/</div>
        <a href="{{route('teacher.subjects.chapters.index',$subject)}}">{{$subject->name}}</a>
        <div>/</div>
        <div>New Chapter</div>
    </div>

    <div class="content-section">
        <label>Please fill in the name and submit</label>
        <div class="divider my-3"></div>

        <div class="w-full md:w-2/3 mx-auto py-8 md:py-12">
            <!-- page message -->
            @if($errors->any())
            <x-message :errors='$errors'></x-message>
            @else
            <x-message></x-message>
            @endif
            <form action="{{route('teacher.subjects.chapters.store', $subject)}}" method='post' class="w-full" onsubmit="return validate(event)">
                @csrf
                <div class="flex flex-wrap md:items-center gap-2">
                    <div class="flex flex-col w-24">
                        <label class="">Ch #</label>
                        <input type="number" name='chapter_no' class="custom-input" value="{{$chapterNo}}" min=1>
                    </div>
                    <div class="flex flex-col w-full md:flex-1">
                        <label class="">Title</label>
                        <input type="text" name='name' class="custom-input" placeholder="Chapter title" value="">
                    </div>
                </div>

                <div class="mt-4 text-right">
                    <button type="submmit" class="btn-teal">Create</button>
                </div>
            </form>

        </div>
    </div>
</div>
@endsection