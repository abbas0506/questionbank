@extends('layouts.basic')

@section('header')
<x-header></x-header>
@endsection
@section('body')
<div class="w-full md:w-2/3 mx-auto text-center mt-32 px-5">

    <h1 class="text-3xl">PAPER GENERATION</h1>
    <p class="mt-3"><span class="text-xs bg-cyan-300 px-2 py-1 rounded-full">Free Version</span></p>
    <p class="text-slate-600 leading-relaxed mt-6">Free version is bit limited, however, you can generate paper upto 20 marks without any other restriction. Try it and see how well we can save your time, effort and cost of paper. </p>
    <div class="h-1 w-24 bg-teal-800 mx-auto mt-6"></div>

    <!-- page message -->
    @if($errors->any())
    <x-message :errors='$errors'></x-message>
    @else
    <x-message></x-message>
    @endif

    <h3 class="text-lg mt-8">Grades</h3>
    <div class="flex items-center justify-center gap-x-4 mt-5">
        @foreach($grades as $grade)
        <div id='{{$grade->id}}' bound='tab{{$grade->id}}' class="grade-tab">{{$grade->roman_name}}</div>
        @endforeach
    </div>
    <div id='messageBeforeGradeSelection' class="flex justify-center items-center text-center p-2 border mt-8">
        Please select a grade
    </div>

    @foreach($grades as $grade)
    <div id="tab{{$grade->id}}" class="subject-container hidden">
        <div class="flex relative mt-4">
            <p class="bg-teal-100 text-teal-800 px-4 py-2 rounded-md">Please select a subject</p>
            <div class="w-4 h-4 bg-teal-100 rotate-45 absolute -bottom-1 left-4"></div>
        </div>

        @foreach($grade->subjects as $subject)
        <a href="{{route('papers.setting.create',$subject)}}" class="paper-subject">
            <div>{{$subject->name}}</div>
            <i class="bi-arrow-right"></i>
        </a>
        @endforeach
    </div>
    @endforeach

</div>
@endsection
@section('footer')
<x-footer></x-footer>
@endsection
@section('script')
<script type="module">
    $('.grade-tab').click(function() {
        var obj = $(this);
        $('.grade-tab').not(this).removeClass('active')

        // make grade tab active and show related subjects
        $(this).addClass('active');
        $('#messageBeforeGradeSelection').hide();
        $('.subject-container').hide();
        $('#' + $(this).attr('bound')).show()
    })
</script>
@endsection