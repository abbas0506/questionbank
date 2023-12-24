@extends('layouts.teacher')
@section('page-content')

<div class="container">
    <h1>Select Chapter</h1>
    <div class="bread-crumb">
        <a href="/">Home</a>
        <div>/</div>
        <div>Chapters</div>
        <div>/</div>
        <div>All</div>
    </div>
    <div class="md:w-3/4 mx-auto mt-12">


        <div class="flex gap-4 w-full">
            <div class="flex flex-col">
                <label for="">Grade</label>
                <select id="grade" class="w-32 custom-input" onchange="resetSubject()">
                    <option value="">Select .. </option>
                    @foreach($grades as $grade)
                    <option value="{{$grade->id}}" @selected(session('grade_id')==$grade->id) > {{ $grade->roman_name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="flex flex-col flex-1">
                <label for="">Subject</label>
                <select id="subject" class="custom-input" onchange="fetchChapters()">
                    <option value="">Select ..</option>
                    @foreach($subjects as $subject)
                    <option value="{{$subject->id}}" @selected(session('subject_id')==$subject->id)>{{$subject->name}}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="overflex-x-auto border p-3 mt-3">

            <div class="border-b">
                <h3 for="" class="p-2 bg-green-50">New Chapter</h3>
                <!-- page message -->
                @if($errors->any())
                <x-message :errors='$errors'></x-message>
                @else
                <x-message></x-message>
                @endif

                <form action="{{route('teacher.chapters.store')}}" method="post" class="w-full" onsubmit="return validate(event)">
                    @csrf
                    <div class="flex flex-wrap flex-row items-center gap-3 bg-slate-50 p-3 ">

                        <input type="hidden" id='grade_id' name="grade_id">
                        <input type="hidden" id='subject_id' name="subject_id">

                        <div class="flex items-center gap-x-2">
                            <label for="" class="">Ch. #</label>
                            <input type="number" min='1' name='chapter_no' value="1" class="custom-input w-24">
                        </div>
                        <div class="flex flex-1 items-center gap-x-2">
                            <label for="" class="">Title</label>
                            <input type="text" id='name' name='name' placeholder="Chapter title" class="custom-input">
                        </div>
                        <div class="flex justify-center items-center">
                            <button type="submit" class="btn-teal rounded"><i class="bi-plus"></i></button>
                        </div>

                    </div>
                </form>

            </div>

            @php $sr=1; @endphp
            <table class="table-auto w-full mt-3">
                <thead>
                    <tr class="border-b border-slate-200">
                        <th class="w-16">Sr</th>
                        <th>Chapter</th>
                    </tr>
                </thead>
                <tbody>
                    @if($chapters)
                    @foreach($chapters->sortBy('chapter_no') as $chapter)
                    <tr>
                        <td> {{ $chapter->chapter_no }}</td>
                        <td class="text-left">
                            <a href="{{route('teacher.chapters.show', $chapter->id)}}" class="link">
                                {{ $chapter->name }}
                            </a>
                        </td>
                    </tr>
                    @endforeach
                    @endif
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
@section('script')
<script>
    function resetSubject() {
        $("#subject").val('');
        $('tbody').html('');
    }

    function fetchChapters() {
        //token for ajax call
        var token = $("meta[name='csrf-token']").attr("content");
        var grade_id = $('#grade').val();
        var subject_id = $('#subject').val();

        //fetch concerned department by role
        $.ajax({
            type: 'post',
            url: "{{route('teacher.fetchChapters')}}",
            data: {
                "grade_id": grade_id,
                "subject_id": subject_id,
                "_token": token,
            },
            success: function(response) {
                //
                $('tbody').html(response.tr);
            },
            error: function(XMLHttpRequest, textStatus, errorThrown) {
                Swal.fire({
                    icon: 'warning',
                    title: errorThrown
                });
            }
        }); //ajax end
    }

    function validate(event) {
        var validated = true;
        var grade = $('#grade').val()
        var subject = $('#subject').val()
        var chapter = $('#name').val()

        if (grade == '' || subject == '' || chapter == '') {
            validated = false;
            event.preventDefault();
            Swal.fire({
                icon: 'warning',
                title: 'Something missing',
                showConfirmButton: false,
                timer: 1500,
            })
        } else {

            $('#grade_id').val(grade)
            $('#subject_id').val(subject)
        }

        return validated;
        // return false;

    }

    function delme(formid) {

        event.preventDefault();

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
                //submit corresponding form
                $('#del_form' + formid).submit();
            }
        });
    }

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
</script>

@endsection