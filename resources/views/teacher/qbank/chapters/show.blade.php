@extends('layouts.teacher')
@section('page-content')

<div class="custom-container">
    <h1>Create Question</h1>
    <div class="bread-crumb">
        <a href="/">Home</a>
        <div>/</div>
        <a href="{{route('teacher.qbank.index')}}">Q.bank</a>
        <div>/</div>
        <a href="{{route('teacher.grades.subjects.index',$subject->grade)}}">{{$subject->grade->roman_name}}</a>
        <div>/</div>
        <a href="{{route('teacher.subjects.chapters.index',$subject)}}">{{$subject->name}}</a>
        <div>/</div>
        <div>New Chapter</div>
    </div>
    <div class="content-section">
        <!-- page message -->
        @if($errors->any())
        <x-message :errors='$errors'></x-message>
        @else
        <x-message></x-message>
        @endif

        <div class="flex flex-wrap justify-between items-center">
            <div>
                <label>{{$chapter->subject->grade->roman_name}} - {{$chapter->subject->name}}</label>
                <h2>Ch. # {{$chapter->chapter_no}} | {{$chapter->name}}</h2>
            </div>
            <div class=" flex flex-col justify-center items-center">
                <h2>{{$chapter->questions->count()}}</h2>
                <label for="">Total Questions</label>
            </div>

        </div>

        <div class="grid grid-cols-1 sm:grid-cols-3 gap-2 mt-8">
            <a href="{{route('teacher.chapters.mcq.index', $chapter)}}" class="pallet">
                <h1 class="text-3xl">{{$chapter->questions()->mcqs()->count()}}</h1>
                <label for="">MCQs</label>
            </a>
            <a href="{{route('teacher.chapters.short.index', $chapter)}}" class="pallet">
                <h1 class="text-3xl">{{$chapter->questions()->short()->count()}}</h1>
                <label for="">Short</label>
            </a>
            <a href="{{route('teacher.chapters.long.index', $chapter)}}" class="pallet">
                <h1 class="text-3xl">{{$chapter->questions()->long()->count()}}</h1>
                <label for="">Long</label>
            </a>
        </div>


    </div>
    @endsection
    @section('script')
    <script type="text/javascript">
        function search(event) {
            var searchtext = event.target.value.toLowerCase();
            var str = 0;
            $('.tr').each(function() {
                if (!(
                        $(this).children().eq(1).prop('outerText').toLowerCase().includes(searchtext)
                    )) {
                    $(this).addClass('hidden');
                } else {
                    $(this).removeClass('hidden');
                }
            });
        }

        function confirmDel(event) {
            event.preventDefault(); // prevent form submit
            var form = event.target; // storing the form

            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.value) {
                    form.submit();
                }
            })
        }
    </script>

    @endsection