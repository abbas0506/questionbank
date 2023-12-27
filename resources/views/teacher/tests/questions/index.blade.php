@extends('layouts.teacher')
@section('page-content')

<div class="container">
    <h1>Test Draft</h1>
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

        <h2 class="text-center">{{ $test->title }}</h2>
        <h3 class="text-sm text-center">{{$test->subject->grade->roman_name}}-{{$test->subject->name}}</h3>
        <div class="divider my-1"></div>
        @php $i=0; @endphp
        <div class="divide-y">
            @for($i=1; $i<=$test->num_of_questions; $i++) <div class='flex justify-between py-2'>
                    <div>Q.{{$i}}</div>
                    <a href="{{route('teacher.test-questions.create')}}"><i class="bx bx-pencil"></i></a>

                </div>
                @endfor
        </div>

    </div>
</div>
@endsection