@extends('layouts.basic')

@section('header')
<x-header></x-header>
@endsection

@section('body')
<style>
    .answer.solved .correct {
        color: green;
    }

    .hero {
        background-image: linear-gradient(rgba(0, 100, 100, 1.0),
            rgba(128, 128, 128, 0)),
        url("{{asset('/images/bg/exams1-01.svg')}}");
        background-position: top;
        background-repeat: no-repeat;
        background-size: contain;
        background-clip: border-box;
        position: relative;
    }
</style>
@php
$sr=1;
@endphp
<div class="hero h-80 flex justify-center items-center overflow-auto">
    <div class="md:w-2/3 mx-auto text-center">
        <div class="text-4xl">Self Test</div>
        <h1>{{$subject->grade->roman_name}}-{{$subject->name}} </h1>
    </div>

</div>
<div class="flex flex-col justify-center items-center pt-16 overflow-auto">

    <div class="md:w-2/3 mx-auto flex flex-col gap-y-6 px-4">

        @foreach($questions as $question)
        <div class="flex flex-col items-start justify-start border border-dashed rounded  bg-white relative">
            <p class="w-8 font-semibold text-xs text-center text-slate-100 bg-teal-600">{{$sr++}}</p>
            <div class="pt-4 pb-8 px-8 md:px-16 w-full">
                <p class="font-semibold text-sm text-gray-800">{{$question->question}}</p>
                <div class="divider my-4"></div>
                <div id='ans' class="answer flex flex-col mt-4 text-gray-600 gap-y-2">
                    <div class="flex space-x-3 items-center">
                        <input type="radio" id='radioa-{{$question->id}}' class="option @if($question->answer=='a') correct @endif">
                        <label for="radioa-{{$question->id}}" class="@if($question->answer=='a') correct @endif">{{$question->mcq->option_a}}</label>
                    </div>
                    <div class="flex space-x-3 items-center">
                        <input type="radio" id='radiob-{{$question->id}}' class="option @if($question->answer=='b') correct @endif">
                        <label for="radiob-{{$question->id}}" class=" @if($question->answer=='b') correct @endif">{{$question->mcq->option_b}}</label>
                    </div>
                    <div class="flex space-x-3 items-center">
                        <input type="radio" id='radioc-{{$question->id}}' class="option @if($question->answer=='c') correct @endif">
                        <label for="radioc-{{$question->id}}" class="@if($question->answer=='c') correct @endif">{{$question->mcq->option_c}}</label>
                    </div>
                    <div class="flex space-x-3 items-center">
                        <input type="radio" id="radiod-{{$question->id}}" class="option @if($question->answer=='d') correct @endif">
                        <label for="radiod-{{$question->id}}" class="@if($question->answer=='d') correct @endif">{{$question->mcq->option_d}}</label>
                    </div>
                </div>

            </div>

        </div>
        @endforeach

        <div class="text-center mb-8">
            <button id='finishQuizButton' class="btn-teal px-4">Finish Quiz</button>
        </div>
    </div>
    <x-footer></x-footer>
</div>

@endsection
@section('script')
<script type="module">
    $('.option').change(function() {
        var selectedOption = $(this)
        $(this).parent().parent().children().find('.option').each(function() {
            if ($(this) != selectedOption)
                $(this).prop('checked', false);
        })
        selectedOption.prop('checked', true)
    });

    $('#finishQuizButton').click(function() {
        var correctAnswers = 0;
        var unAnswered = 20;
        $('.answer').each(function() {
            $(this).children().find('.option:checked').each(function() {
                unAnswered -= 1
                if ($(this).hasClass('correct'))
                    correctAnswers += 1;
            })
        })
        if (unAnswered > 0) {
            Swal.fire({
                icon: "warning",
                title: unAnswered + " questions left",
                text: "Please complete the quiz!",
            });
        } else {

            var text = '';
            if (correctAnswers < 10) text = "Best of luck for next time!"
            else if (correctAnswers < 15) text = "Good effort..."
            else if (correctAnswers < 18) text = "Outstanding marks!"
            else text = "Outstanding!"
            Swal.fire({
                icon: "success",
                title: "Your Score: " + correctAnswers,
                text: text,
            });
            // display correct asnswers
            $('.answer').each(function() {
                $(this).addClass('solved')
            });
        }

    })
</script>
@endsection