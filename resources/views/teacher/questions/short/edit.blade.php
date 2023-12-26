@extends('layouts.teacher')
@section('page-content')

<div class="container">
    <h1>Edit Short Q</h1>
    <div class="bread-crumb">
        <a href="/">Home</a>
        <div>/</div>
        <a href="{{route('teacher.grades.index')}}">Grade Selection</a>
        <div>/</div>
        <div>{{$question->chapter->subject->grade->roman_name}}</div>
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
                <label>{{$question->chapter->subject->grade->roman_name}} - {{$question->chapter->subject->name}}</label>
                <h2>Ch. # {{$question->chapter->chapter_no}} | {{$question->chapter->name}}</h2>
            </div>
            <div class="flex items-center space-x-4">
                <div class="text-center">
                    <label for="">Short</label>
                </div>
            </div>
        </div>

        <form action="{{route('teacher.short-questions.update', $question)}}" method='post' class="mt-4" onsubmit="return validate(event)">
            @csrf
            @method('PATCH')
            <input type="text" name="question" class="custom-input py-2" placeholder="Question" value="{{$question->question}}">
            <textarea type="text" name="answer" class="custom-input mt-2" rows="3" placeholder="Answer">{{$question->answer}}</textarea>
            <div class="flex flex-wrap items-center justify-between mt-2 gap-2">
                <div>
                    <label for="">Marks</label>
                    <input type="text" name="marks" value="{{$question->marks}}" class="custom-input w-16 text-center ml-3 py-0">
                </div>
                <div>
                    <label for="">From Exercise?</label>
                    <input type="checkbox" id='is_from_exercise' name='is_from_exercise' class="w-6 h-6 chk bg-blue-100 border-blue-300 text-blue-500 focus:ring-blue-200 ml-3" value='1' @checked($question->is_from_exercise==1)>
                </div>
                <div>
                    <label for="">Bise Frequency</label>
                    <input type="text" name="bise_frequency" value="{{$question->bise_frequency}}" class="custom-input w-16 text-center ml-3 py-0">
                </div>
            </div>

            <div class="mt-6">
                <button type="submit" class="btn-teal rounded p-2 w-full">Update Now</button>
            </div>
        </form>

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

        function validate(event) {
            var validated = true;

            // var isFromEx = $('#is_from_exercise').prop('checked');
            // $("[name=is_from_exercise]").val(isFromEx)

            // if (role == '') {
            //     validated = false;
            //     event.preventDefault();
            //     Swal.fire({
            //         icon: 'warning',
            //         title: 'Please select a role',
            //         showConfirmButton: false,
            //         timer: 1500,
            //     })

            // } else if (role == 'hod' || role == 'teacher') {
            //     //semester required for both
            //     if (semester == '') {
            //         validated = false;
            //         event.preventDefault();
            //         Swal.fire({
            //             icon: 'warning',
            //             title: 'Please select a semester',
            //             showConfirmButton: false,
            //             timer: 1500,
            //         })
            //     }
            //     //department required for only hod
            //     if (role == 'hod' && department == '') {
            //         validated = false;
            //         event.preventDefault();
            //         Swal.fire({
            //             icon: 'warning',
            //             title: 'Please select a department',
            //             showConfirmButton: false,
            //             timer: 1500,
            //         })
            //     }

            return validated;
            // return false;

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