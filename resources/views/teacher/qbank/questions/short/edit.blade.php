@extends('layouts.teacher')
@section('page-content')

<div class="custom-container">
    <h1>Edit Short Q</h1>
    <div class="bread-crumb">
        <a href="/">Home</a>
        <div>/</div>
        <a href="{{route('teacher.qbank.index')}}">Q.bank</a>
        <div>/</div>
        <a href="{{route('teacher.grades.subjects.index',$chapter->subject->grade)}}">{{$chapter->subject->grade->roman_name}}</a>
        <div>/</div>
        <a href="{{route('teacher.subjects.chapters.index',$chapter->subject)}}">{{$chapter->subject->name}}</a>
        <div>/</div>
        <a href="{{route('teacher.subjects.chapters.show',[$chapter->subject, $chapter])}}">Ch.{{$chapter->chapter_no}}</a>
        <div>/</div>
        <a href="{{route('teacher.chapters.short.index',$chapter)}}">Short</a>
        <div>/</div>
        <div>Edit</div>
    </div>
    <div class="content-section">
        <!-- page message -->
        @if($errors->any())
        <x-message :errors='$errors'></x-message>
        @else
        <x-message></x-message>
        @endif

        <div class="flex justify-between items-center">
            <div>
                <label>{{$question->chapter->subject->grade->roman_name}} - {{$question->chapter->subject->name}}</label>
                <h2>Ch. # {{$question->chapter->chapter_no}} | {{$question->chapter->name}}</h2>
            </div>
            <div class="flex items-center space-x-4">
                <div class="text-center">
                    <i class="bx bx-pencil text-xl text-green-600"></i>
                </div>
            </div>
        </div>
        <div class="divider my-5"></div>
        <div class="md:w-3/4 mx-auto mt-8">
            <form action="{{route('teacher.chapters.short.update', [$chapter, $question])}}" method='post' class="mt-8" onsubmit="return validate(event)">
                @csrf
                @method('PATCH')
                <div class="flex items-center gap-2">
                    <input type="checkbox" id='is_from_exercise' name='is_from_exercise' class="w-6 h-6 chk bg-blue-100 border-blue-300 text-blue-500 focus:ring-blue-200" value='1' @checked($question->is_from_exercise==1)>
                    <label for="">From Exercise?</label>
                </div>
                <textarea type="text" id='question' name="question" class="custom-input py-2 mt-2" rows='1' placeholder="Question">{{$question->question}}</textarea>
                <div class="flex items-center justify-between mt-2">
                    <label for="">Bise Frequency</label>
                    <input type="text" name="bise_frequency" value="{{$question->bise_frequency}}" class="custom-input w-16 text-center ml-3 py-0">
                </div>
                <div class="divider my-3"></div>
                <div class="flex justify-end">
                    <button type="submit" class="btn-teal">Update Now</button>
                </div>
            </form>
            <div class="divider my-3"></div>
            <span id="math" class="text-left no-line-break"></span>
        </div>
    </div>
</div>
@endsection
@section('script')
<script type="module">
    $('#question').bind('input propertychange', function() {
        $('#math').html($('#question').val());
        MathJax.typeset();
    });
</script>
@endsection