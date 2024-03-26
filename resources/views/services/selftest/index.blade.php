@extends('layouts.basic')

@section('header')
<x-header></x-header>
@endsection
@section('body')
<div class="w-full md:w-2/3 mx-auto text-center mt-32 px-5">

    <h1 class="text-3xl">SELF TEST</h1>
    <p class="text-slate-600 leading-relaxed mt-6">We extend our valuable services to only students, teachers and institutions. This is an integrated application that provides all in one solution for examining students and tracking their performance through statistical as well as graphical tools</p>
    <div class="h-1 w-24 bg-teal-800 mx-auto mt-6"></div>

    <h3 class="text-lg mt-8">Please tell us your grade and subject</h3>
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
        <a href="{{route('selftest.edit',$subject)}}" class="flex py-3 px-6 border-b">{{$subject->name}}</a>
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