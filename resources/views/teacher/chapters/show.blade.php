@extends('layouts.teacher')
@section('page-content')

<div class="container">
    <h1>Create Question</h1>
    <div class="bread-crumb">
        <a href="/">Home</a>
        <div>/</div>
        <a href="{{route('teacher.grades.index')}}">Grade Selection</a>
        <div>/</div>
        <div>{{$chapter->subject->grade->roman_name}}</div>
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
                <label>{{$chapter->subject->grade->roman_name}} - {{$chapter->subject->name}}</label>
                <h2>Ch. # {{$chapter->chapter_no}} | {{$chapter->name}}</h2>
            </div>
            <div class="flex justify-center items-center space-x-3">
                <a href="{{route('teacher.chapters.edit', $chapter)}}">
                    <i class="bi bi-pencil-square text-green-600"></i>
                </a>
                <form action="{{route('teacher.chapters.destroy',$chapter)}}" method="POST" onsubmit="return confirmDel(event)">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="bg-transparent p-0 border-0">
                        <i class="bi bi-trash3 text-red-600"></i>
                    </button>
                </form>
            </div>

        </div>

        <div class="grid grid-cols-1 sm:grid-cols-3 gap-2 mt-8">
            <a href="{{route('teacher.questions.view',[$chapter,'short'])}}" class="pallet">
                <label for="">Short</label>
                <h3 class="mt-1">{{$chapter->questions()->short()->count()}}</h3>
            </a>
            <a href="{{route('teacher.questions.view',[$chapter,'long'])}}" class="pallet">
                <label for="">Long</label>
                <h3 class="mt-1">{{$chapter->questions()->long()->count()}}</h3>
            </a>
            <a href="{{route('teacher.questions.view',[$chapter,'mcq'])}}" class="pallet">
                <label for="">MCQs</label>
                <h3 class="mt-1">{{$chapter->questions()->mcqs()->count()}}</h3>
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