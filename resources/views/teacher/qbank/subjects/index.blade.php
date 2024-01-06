@extends('layouts.teacher')
@section('page-content')

<div class="custom-container">
    <h1>Q.Bank | Subjects</h1>
    <div class="bread-crumb">
        <a href="/">Home</a>
        <div>/</div>
        <a href="{{route('teacher.qbank.index')}}">Grade Selection</a>
        <div>/</div>
        <div>{{$grade->roman_name}}</div>
    </div>
    <div class="md:w-3/4 mx-auto mt-24">
        <div class="grid grid-cols-2 sm:grid-cols-4 gap-2">
            @foreach($grades as $cell)
            @if($cell->id==$grade->id)
            <a href="{{route('teacher.grades.subjects.index', $cell)}}" class="flex bg-teal-300 h-16 justify-center items-center">{{$cell->roman_name}}</a>
            @else
            <a href="{{route('teacher.grades.subjects.index', $cell)}}" class="flex bg-teal-100 hover:bg-teal-300 h-16 justify-center items-center">{{$cell->roman_name}}</a>
            @endif
            @endforeach
        </div>

        @if($grade->subjects->count()>0)
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-2 text-gray-60 text-sm mt-3">
            @foreach($grade->subjects as $subject)

            <div class="flex items-center justify-between w-full bg-sky-100 ">
                <a href="{{route('teacher.subjects.chapters.index', $subject)}}" class="flex flex-1 items-center p-3"><i class="bx bx-book mr-2"></i>{{$subject->name}} <span class="text-gray-600 text-xs ml-1">({{$subject->questions->count()}})</span></a>
                @if($subject->questions->count()>0)
                <a href="{{route('teacher.grades.subjects.edit', [$grade, $subject])}}" class="w-8 text-center"><i class="bx bx-pencil text-gray-500 hover:text-gray-600 text-xs"></i></a>
                @else
                <form action="{{route('teacher.grades.subjects.destroy',[$grade, $subject])}}" method="post" class="w-8 text-center" onsubmit="return confirmDel(event)">
                    @csrf
                    @method('DELETE')
                    <button><i class="bi-x text-red-600"></i></button>
                </form>
                @endif
            </div>

            @endforeach
            <a href="{{route('teacher.grades.subjects.create',$grade)}}" class="flex justify-center items-center border border-sky-200 hover:bg-sky-300 p-3">New Subject +</a>
        </div>
        @else
        <div class="grid place-content-center h-32 text-center">
            <p class="text-slate-500">Currently no subject found</p>
            <a href="{{route('teacher.grades.subjects.create',$grade)}}">Click here <i class="bi-plus-circle"></i> to start</a>
        </div>
        @endif
    </div>
    @endsection
    @section('script')
    <script type="text/javascript">
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