@extends('layouts.teacher')
@section('page-content')

<div class="container">
    <h1>Question Structure</h1>
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

        <div class="flex justify-between items-center">
            <div>
                <label>{{$test->title}}</label>
                <h2>{{$test->subject->grade->roman_name}} - {{$test->subject->name}}</h2>
            </div>
            <div class="text-center w-16">
                <h2>{{ucwords($questionType)}}</h2>
                <label for="">Q. Type</label>
            </div>
        </div>
        <div class="divider my-3"></div>
        <form action="{{route('teacher.test-questions.store')}}" method='post' onsubmit="return validate(event)">
            @csrf
            <input type="hidden" name="test_id" value="{{$test->id}}">
            <input type="hidden" name="question_no" value="{{$test->questions->count()+1}}">
            <input type="hidden" name="question_type" value="{{$questionType}}">
            <label>Question # {{$test->questions->count()+1}}</label>
            <div class="divider my-3"></div>
            <h3>Please mention chapter wise distribution of parts / questions.</h3>

            @foreach($chapters as $chapter)
            <div class="flex items-baseline justify-between space-x-4">
                <label for="">Ch #{{$chapter->chapter_no}}. &nbsp {{$chapter->name}}</label>
                <input type="hidden" name='chapter_id_array[]' value="{{$chapter->id}}">
                <input type="text" name='num_of_parts_array[]' class="num-of-parts custom-input w-16 h-8 text-center px-0" value="0">
            </div>
            @endforeach
            <div class="divider my-3"></div>
            <div class="flex items-baseline justify-between space-x-4">
                <label class="font-bold">Total parts:</label>
                <h3 id='total_parts' class="flex justify-center items-center bg-red-50 w-16 h-8 text-center px-0">0</h3>
            </div>
            <div class="flex items-baseline justify-between space-x-4">
                <label for="">How many parts to attempt at least?</label>
                <input type="text" id='necessary_parts' name='necessary_parts' class="custom-input w-16 h-8 text-center px-0" value="0">
            </div>
            <div class="divider my-3"></div>
            <div class="text-right">
                <button type="submit" class="btn-teal rounded px-4">Save Now</button>
            </div>
        </form>

    </div>
</div>
@endsection
@section('script')
<script type="module">
    $('.num-of-parts').change(function() {
        var sumOfParts = 0;
        $('.num-of-parts').each(function() {
            if ($(this).val() == '')
                $(this).addClass('border-red-500');
            else if ($.isNumeric($(this).val())) {
                if ($(this).val() < 0 || $(this).val() > 100)
                    $(this).addClass('border-red-500');
                else {
                    // correct value, add and clear if any previous error
                    sumOfParts += parseInt($(this).val());
                    $('#total_parts').html(sumOfParts);
                    $('#necessary_parts').val(sumOfParts);
                    // clear error
                    if ($(this).hasClass('border-red-500'))
                        $(this).removeClass('border-red-500');
                }
            } else {
                $(this).addClass('border-red-500');
            }
        });
    });
</script>
@endsection