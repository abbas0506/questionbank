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
        <div id='{{$grade->id}}' bound='{{$grade->id}}' class="grade-tab">{{$grade->roman_name}}</div>
        @endforeach
    </div>
    <div id='messageBeforeGradeSelection' class="flex justify-center items-center text-center p-2 border mt-8">
        Please select a grade
    </div>

    @foreach($grades as $grade)
    <div id="tab{{$grade->id}}" class="subject-container hidden">
        <div class="flex justify-center items-center text-center bg-teal-100 p-2  mt-8">
            Please select a subject
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
        $(this).addClass('active')

        // $('.grade-tab').each(function() {
        //     if (obj.is($(this))) {
        //         $(this).addClass('active');
        //     } else {
        //         $(this).removeClass('active');
        //     }

        // })
        // make grade tab active
        $(this).addClass('active');
        $('#messageBeforeGradeSelection').hide();
        var gradeId = $(this).attr('id');

        $('.subject-container').each(function() {
            $(this).hide()
            if ('tab' + gradeId == $(this).attr('id'))
                $(this).slideDown('slow');

        })

    })
</script>
@endsection