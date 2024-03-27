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

    <h2 class="text-lg my-8">{{$test->subject->name}} - {{$test->subject->grade->roman_name}}</h2>

    <!-- page message -->
    @if($errors->any())
    <x-message :errors='$errors'></x-message>
    @else
    <x-message></x-message>
    @endif

    <div class="divider mt-3"></div>
    <form action="{{route('papers.questions.store',$test->id)}}" method='post' onsubmit="return validate(event)">
        @csrf
        <!-- <input type="hidden" name="test_id" value="{{$test->id}}"> -->
        <input type="hidden" name="question_no" value="{{$test->questions->count()+1}}">
        <input type="hidden" name="question_type" value="{{$questionType}}">

        <h2 class="text-left bg-slate-100 py-3">@if($questionType!='mcq'){{ucwords($questionType)}} questions @else MCQs @endif</h2>
        <div class="divider mb-3"></div>

        @foreach($chapters as $chapter)
        <div class="flex items-baseline justify-between space-x-4">
            <label for="">Ch #{{$chapter->chapter_no}}. &nbsp {{$chapter->name}}</label>
            <input type="hidden" name='chapter_id_array[]' value="{{$chapter->id}}">
            <input type="number" name='num_of_parts_array[]' autocomplete="off" class="num-of-parts custom-input w-16 h-8 text-center px-0" min='0' value="0" oninput="syncNumOfParts()">
        </div>
        @endforeach

        <div class="divider my-3"></div>
        <div class="flex items-baseline justify-between space-x-4">
            <h3>How many compulsory out of <span id='total_parts'></span>? <span class="text-red-600">*</span></h3>
            <input type="number" id='necessary_parts' name='necessary_parts' class="custom-input w-16 h-8 text-center px-0" value="0" min='0'>
        </div>

        <button type="submit" class="fixed right-6 bottom-6 h-12 w-12 flex  justify-center items-center rounded-full bg-teal-400 hover:bg-teal-600"><i class="bi bi-caret-right"></i></button>

    </form>
    <a href="{{route('papers.show',$test)}}" class="btn-sky float-left my-6"><i class="bi-arrow-left"></i> Go back </a>

</div>
</div>
@endsection
@section('script')
<script type="module">
    $(document).ready(function() {
        $('.num-of-parts').click(function() {
            $(this).select();
        })
        $('.num-of-parts').keyup(function() {
            var sumOfParts = 0;
            // var currentInput = $(this).val();
            // remove spaces from around
            // currentInput = $.trim(currentInput);
            $('.num-of-parts').each(function() {

                // alert($(this).val())
                // cellvalue = $.trim(this.val());
                if ($(this).val() == '') {
                    sumOfParts += 0;
                    $('#total_parts').html(sumOfParts);
                    $('#necessary_parts').val(sumOfParts);
                } else {
                    if ($.isNumeric($(this).val())) {
                        sumOfParts += parseInt($(this).val());
                        $('#total_parts').html(sumOfParts);
                        $('#necessary_parts').val(sumOfParts);
                    } else {
                        $(this).addClass('border-red-500');
                        $('#total_parts').html('');
                        $('#necessary_parts').val('');

                    }
                }

                // if ($.isNumeric(currentInput)) {
                //     $('.num-of-parts').each(function() {
                //         // update fields
                //         sumOfParts += parseInt($(this).val());
                //         $('#total_parts').html(sumOfParts);
                //         $('#necessary_parts').val(Math.ceil(2 / 3 * sumOfParts));
                //     });
                //     //clear previous error if any
                //     if ($(this).hasClass('border-red-500'))
                //         $(this).removeClass('border-red-500');
                // } else {
                //     // if (currentInput == '')
                //     // $(this).val(0)
                //     if (currentInput != '') {
                //         $(this).addClass('border-red-500');
                //         // $('#necessary_parts').val(0);
                //         $('#total_parts').html('');
                //     }
                // }
            });
        });

        $('form').submit(function(event) {
            var validated = true;
            var numOfNecessaryParts = $('#necessary_parts').val();

            if ($('#total_parts').html() == '')
                validated = false
            else if ($.isNumeric(numOfNecessaryParts)) {
                var totalParts = parseInt($('#total_parts').html())
                if (numOfNecessaryParts <= 0 || numOfNecessaryParts > totalParts)
                    validated = false
            } else {
                validated = false
            }

            if (!validated) {
                event.preventDefault();
                Swal.fire({
                    title: "Warning",
                    text: "Review number of parts carefully!",
                    icon: "warning",
                    showConfirmButton: false,
                    timer: 1500

                });

            }
            return validated;
        });

        // $('.numOfParts').change(function() {

        // })
    });
</script>
@endsection