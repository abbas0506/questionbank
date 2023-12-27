@extends('layouts.teacher')
@section('page-content')

<div class="container pb-20">
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
            <div class="flex flex-col gap-x-4 gap-y-2">
                <input type="text" placeholder="Test Title" class="custom-input">
                <div class="flex flex-col md:flex-row items-center gap-2">
                    <div class="flex flex-col flex-1">
                        <label for="">Test Date?</label>
                        <input type="date" class="custom-input">
                    </div>
                    <div class="flex flex-col flex-1">
                        <label for="">How many questions overall?</label>
                        <input type="number" class="w-16 custom-input">
                    </div>
                </div>

                <div class="flex items-center space-x-2">
                    <input type="checkbox" class="custom-input w-6 h-6">
                    <label>Questions form exercise only</label>
                </div>
                <div class="flex items-center space-x-2">
                    <input type="checkbox" class="custom-input w-6 h-6">
                    <label>Most frequent questions only</label>
                </div>
            </div>
            <div class="divider my-3"></div>
            <div class="grid grid-cols-4 sm:grid-cols-8 gap-2">
                @foreach($grades as $grade)
                @if($annexedGrade && $annexedGrade->id==$grade->id)
                <a href="{{route('teacher.tests.annex.grade', $grade)}}" class="flex bg-teal-300 h-12 justify-center items-center">{{$grade->roman_name}}</a>
                @else
                <a href="{{route('teacher.tests.annex.grade', $grade)}}" class="flex bg-teal-100 h-12 justify-center items-center">{{$grade->roman_name}}</a>
                @endif
                @endforeach
            </div>
            <div class="divider my-3"></div>
            @if($annexedGrade)
            <div class="grid grid-cols-1 sm:grid-cols-4 gap-2 text-sm">
                @foreach($annexedGrade->subjects as $subject)
                @if($annexedSubject && $annexedSubject->id==$subject->id)
                <a href="{{route('teacher.tests.annex.subject', $subject)}}" class="flex bg-sky-300 h-10 justify-center items-center">{{$subject->name}}</a>
                @else
                <a href="{{route('teacher.tests.annex.subject', $subject)}}" class="flex bg-sky-100 h-10 justify-center items-center">{{$subject->name}}</a>
                @endif
                @endforeach
            </div>
            @endif
            <div class="divider my-3"></div>
            @if($annexedSubject)
            <div class="flex flex-col gap-2">
                @foreach($annexedSubject->chapters->sortBy('chapter_no') as $chapter)
                <div class="flex items-center space-x-2">
                    <input type="checkbox" class="custom-input w-6 h-6">
                    <label>{{$chapter->chapter_no}}. {{$chapter->name}}</label>
                </div>
                @endforeach
            </div>
            <div class="divider my-3"></div>
            <div class="float-right">
                <button type="submit" class="btn-teal rounded py-2 px-4">Next <i class="bi-arrow-right"></i></button>
            </div>
            @endif
        </form>
    </div>
</div>

@endsection
@section('script')
<script>

</script>
@endsection