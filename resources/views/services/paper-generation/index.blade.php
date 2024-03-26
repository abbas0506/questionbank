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

    <h3 class="text-lg mt-8">Please tell us the grade and subject</h3>
    <div class="flex items-center justify-center gap-x-4 mt-5">
        @foreach($grades as $grade)
        <div id='{{$grade->id}}' class="tab grade-tab">{{$grade->roman_name}}</div>
        @endforeach
    </div>
    <div id='messageBeforeGradeSelection' class="flex justify-center items-center text-center p-6 border mt-8">
        Subjects will be displayed after you select a grade
    </div>

    @foreach($grades as $grade)
    <div id="tab{{$grade->id}}" class="subject-div hidden">
        <div class="flex justify-center items-center text-center p-6 border mt-8">
            Please select one of the following subjects
        </div>
        @foreach($grade->subjects as $subject)
        <a href="{{route('papergeneration-demo.edit',$subject)}}" class="flex py-3 px-6 border-b">{{$subject->name}}</a>
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

        $('#messageBeforeGradeSelection').hide();
        var gradeId = $(this).attr('id');
        $('.subject-div').each(function() {
            $(this).hide()
            if ('tab' + gradeId == $(this).attr('id'))
                $(this).show();

        })

    })
</script>
@endsection