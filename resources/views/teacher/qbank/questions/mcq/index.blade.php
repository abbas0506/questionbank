@extends('layouts.teacher')
@section('page-content')

<div class="custom-container">
    <h1>MCQs</h1>
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
        <div>MCQs</div>
    </div>
    <div class="content-section">
        <div class="flex justify-between items-center">
            <div>
                <label>{{$chapter->subject->grade->roman_name}} - {{$chapter->subject->name}}</label>
                <h2>Ch. # {{$chapter->chapter_no}} | {{$chapter->name}}</h2>
            </div>
            <a href="{{route('teacher.chapters.mcq.create', $chapter)}}" class="btn-teal">New +</a>
        </div>

        <div class="divider my-5"></div>
        <!-- page message -->
        @if($errors->any())
        <x-message :errors='$errors'></x-message>
        @else
        <x-message></x-message>
        @endif
        <div class="flex flex-wrap justify-between items-end mt-5">
            <div class="flex relative">
                <input type="text" id='searchby' placeholder="Search ..." class="custom-search" oninput="search(event)">
                <i class="bx bx-search absolute top-2 right-2"></i>
            </div>
            <label>({{$chapter->questions()->mcqs()->count()}}) records found</label>
        </div>
        @php $sr=1; @endphp
        <div class="overflow-x-auto mt-4">
            <table class="table-fixed w-full text-sm">
                <thead>
                    <tr>
                        <th class="w-8">Sr</th>
                        <th class="w-48">Question</th>
                        <th class="w-24">Answer</th>
                        <th class="w-12">From Ex.</th>
                        <th class="w-12">f <sub>bise</sub></th>
                        <th class="w-12">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($chapter->questions()->mcqs()->get()->sortByDesc('updated_at') as $question)
                    <tr class="tr text-sm">
                        <td>{{$sr++}}</td>
                        <td class="text-left"><a href="{{route('teacher.chapters.mcq.show',[$chapter, $question])}}">{{$question->question}}</a></td>
                        <td class="text-left">
                            @if($question->answer=='a') {{ $question->mcq->option_a }}
                            @elseif($question->answer=='b') {{ $question->mcq->option_b }}
                            @elseif($question->answer=='c') {{ $question->mcq->option_c }}
                            @else {{ $question->mcq->option_d }}
                            @endif
                        </td>
                        <td>
                            @if($question->is_from_exercise)
                            <i class="bi-check text-green-600"></i>
                            @else
                            <i class="bi-x text-slate-600"></i>
                            @endif
                        </td>
                        <td>{{$question->bise_frequency}}</td>
                        <td class="text-xs">
                            <div class="flex justify-center items-center space-x-3">
                                <a href="{{route('teacher.chapters.mcq.edit', [$chapter, $question])}}">
                                    <i class="bi bi-pencil-square text-green-600"></i>
                                </a>
                                {{-- <span class="text-slate-400">|</span>
                                <form action="{{route('teacher.chapters.mcq.destroy',[$chapter, $question])}}" method="POST" onsubmit="return confirmDel(event)">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="bg-transparent p-0 border-0">
                                        <i class="bi bi-trash3 text-red-600"></i>
                                    </button>
                                </form> --}}
                            </div>

                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
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