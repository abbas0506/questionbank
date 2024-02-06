@extends('layouts.teacher')
@section('page-content')

<div class="custom-container">
    <h1>New Test</h1>
    <div class="bread-crumb">
        <a href="/">Home</a>
        <div>/</div>
        <div>New Test</div>
    </div>
    <div class="content-section">
        <!-- page message -->
        @if($errors->any())
        <x-message :errors='$errors'></x-message>
        @else
        <x-message></x-message>
        @endif

        <form action="{{route('teacher.tests.store')}}" method='post' onsubmit="return validate(event)">
            @csrf
            <h1>{{$selectedGrade->roman_name}}-{{$selectedSubject->name}}</h1>
            <div class="divider my-3"></div>
            <p class="my-5">Please select one or more chapters for test!</p>
            <div class="md:pl-8 mx-auto">
                @if($selectedSubject->chapters->count()>0)
                <div class="flex flex-col gap-2">
                    @foreach($selectedSubject->chapters->sortBy('chapter_no') as $chapter)
                    <div class="flex items-center space-x-2">
                        <input type="checkbox" name='chapter_no_array[]' class="custom-input w-6 h-6" value="{{ $chapter->id }}">
                        <label>{{$chapter->chapter_no}}. {{$chapter->name}}</label>
                    </div>
                    @endforeach
                </div>
                <div class="divider my-5"></div>
                <div class="flex flex-col gap-x-4 gap-y-2">
                    <label for="">Test Title</label>
                    <input type="text" name="title" value='Sample Test' placeholder="Test Title" class="custom-input">
                    <div class="md:w-2/3">
                        <label for="">Test Date</label>
                        <input type="date" id='test_date' name="test_date" class="custom-input" value="{{ date('Y-m-d') }}">
                    </div>
                    <div class="flex items-center space-x-2">
                        <input type="checkbox" name="exercise_only" class="custom-input w-6 h-6">
                        <label>Questions form exercise only</label>
                    </div>
                    <div class="flex items-center space-x-2">
                        <input type="checkbox" name="frequent_only" class="custom-input w-6 h-6">
                        <label>Most frequent questions only</label>
                    </div>
                </div>
                <div class="divider my-3"></div>
                <input type="hidden" name="subject_id" value="{{ $selectedSubject->id }}">
                <div class="flex justify-end mt-5">
                    <button type="submit" class="btn-teal rounded py-2 px-4" @disabled($selectedSubject->chapters->count()==0)>Next <i class="bi-arrow-right"></i></button>
                </div>
                @else
                <div class="text-center">No chapters found</div>
                @endif
            </div>
        </form>

    </div>
</div>

@endsection