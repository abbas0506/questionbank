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

    <h2 class="text-lg mt-8">{{$test->subject->name}} - {{$test->subject->grade->roman_name}}</h2>

    <div class="grid grid-cols-1 md:grid-cols-3 px-6 py-2 text-left w-full border border-dashed border-slate-200 mt-6 relative">
        <div>
            <label for="">Paper Title</label>
            <h3>{{$test->title}}</h3>
        </div>
        <div>
            <label for="">Scheduled Date</label>
            <h3>{{$test->test_date->format('M d, Y')}}</h3>
        </div>
        <div>
            <label for="">Duration</label>
            <h3>{{$test->getDuration()}}</h3>
        </div>
        <a href="{{route('papers.edit',$test)}}" class="absolute top-2 right-2 btn-sky flex justify-center items-center rounded-full p-0 w-5 h-5"><i class="bx bx-pencil text-xs"></i></a>
    </div>

    <!-- show print button only if test has some questions -->


    <!-- page message -->
    @if($errors->any())
    <x-message :errors='$errors'></x-message>
    @else
    <x-message></x-message>
    @endif


    @if($test->questions->count())
    <div class="flex flex-row justify-between items-center w-full mt-6">
        <!-- can edit only if some question exists -->
        <label>Total Qs: {{$test->questions->count()}}, Marks: {{$test->totalMarks()}}</label>
        @if($test->questions->count()>0)

        <div class="btn-red">
            <a href="{{route('question-paper.pdf.create',$test)}}">Print <i class="bi-printer ml-1"></i></a>
        </div>


        <!-- <div class="flex justify-end w-full">
            <div class="flex w-12 h-12 items-center justify-center rounded-full bg-orange-100 hover:bg-orange-200">
                <a href="{{route('question-paper.pdf.create',$test)}}"><i class="bi-printer"></i></a>
            </div>
        </div> -->
        @endif
    </div>

    <div class="flex flex-col gap-2">
        @php
        $roman=new Roman;
        $questionSr=1;
        @endphp

        <!-- MCQs -->
        @foreach($test->questions()->mcqs()->get() as $testQuestion)
        @php
        $i=1;
        @endphp
        <div class="question mcq">
            <div class="head">
                <div class="sr">Q.{{$questionSr++}}</div>
                <div class="statement">
                    @if($testQuestion->parts->count()==$testQuestion->necessary_parts)
                    <span>Encircle the correct option</span>
                    @else
                    <span>Encircle the correct option. (any {{SpellNumber::value($testQuestion->necessary_parts)->toLetters()}})</span>
                    @endif

                    <span>{{$testQuestion->necessary_parts}}x1={{$testQuestion->necessary_parts*1}}</span>
                </div>
                <div class="action border border-green-200 rounded bg-green-50">
                    <a modal-id='{{$testQuestion->id}}' class="show-modal text-cyan-600"><i class="bx bx-pencil"></i></a>
                    <a href="{{route('paper-questions.refresh',$testQuestion)}}"><i class="bi-arrow-repeat"></i></a>
                    <form action="{{route('paper-questions.destroy',$testQuestion)}}" method="post">
                        @csrf
                        @method('DELETE')
                        <button><i class="bx bx-trash text-red-600 show-confirm"></i></button>
                    </form>
                </div>
            </div>
            <div class="body">
                @foreach($testQuestion->parts as $part)
                <div class="sub">
                    <div class="sr">{{Str::lower($roman->filter($i++))}}</div>
                    <div class="statement">{{$part->question->question}}</div>
                    <div class="action">
                        <a href="{{route('paper.question.parts.refresh',$part)}}"><i class="bi-arrow-repeat"></i></a>
                        <form action="{{route('paper-question-parts.destroy',$part)}}" method="post">
                            @csrf
                            @method('DELETE')
                            <button><i class="bx bx-x text-red-600 show-confirm"></i></button>
                        </form>
                    </div>
                </div>
                <div class="choices">
                    <div class="choice">
                        <div class="sr">a.</div>
                        <div class="desc">{{$part->question->mcq->option_a}}</div>
                    </div>
                    <div class="choice">
                        <div class="sr">b.</div>
                        <div class="desc">{{$part->question->mcq->option_b}}</div>
                    </div>
                    <div class="choice">
                        <div class="sr">c.</div>
                        <div class="desc">{{$part->question->mcq->option_c}}</div>
                    </div>
                    <div class="choice">
                        <div class="sr">d.</div>
                        <div class="desc">{{$part->question->mcq->option_d}}</div>
                    </div>

                </div>
                @endforeach
            </div>
        </div>

        <!-- edit necessary parts modal -->
        <!-- modal showing question types -->
        <div id='modal-{{$testQuestion->id}}' class="modal bg-teal-100 p-6 rounded w-1/2 md:w-1/4">
            <form action="{{route('paper-questions.update', $testQuestion)}}" method="post" class="flex flex-col w-full">
                @csrf
                @method('PATCH')
                <p class="text-teal-600">Edit necessary parts</p>
                <div class="divider w-full my-3"></div>
                <input type="number" name="necessary_parts" value="{{$testQuestion->necessary_parts}}" min='0' max='{{$testQuestion->parts->count()}}' class="custom-input w-full">
                <button type="submit" class="btn-teal mt-4">Update</button>
            </form>
            <button class="close-modal absolute -top-4 -right-4 flex justify-center items-center rounded-full border border-slate-50 bg-gray-600  w-6 h-6"><i class="bi bi-x text-orange-300 hover:text-orange-400 text-base"></i></button>
        </div>
        @endforeach

        <!-- Short -->
        @foreach($test->questions()->short()->get() as $testQuestion)
        @php
        $i=1;
        @endphp
        <div class="question">
            <div class="head">
                <div class="sr">Q.{{$questionSr++}}</div>
                <div class="statement">
                    @if($testQuestion->parts->count()==$testQuestion->necessary_parts)
                    <span>Answer the following.</span>
                    @else
                    <span>Answer any {{SpellNumber::value($testQuestion->necessary_parts)->toLetters()}} questions.</span>
                    @endif

                    <span>{{$testQuestion->necessary_parts}}x2={{$testQuestion->necessary_parts*2}}</span>
                </div>
                <div class="action border border-green-200 rounded bg-green-50">
                    <a modal-id='{{$testQuestion->id}}' class="show-modal text-cyan-600"><i class="bx bx-pencil"></i></a>
                    <a href="{{route('paper-questions.refresh',$testQuestion)}}"><i class="bi-arrow-repeat"></i></a>
                    <form action="{{route('paper-questions.destroy',$testQuestion)}}" method="post">
                        @csrf
                        @method('DELETE')
                        <button><i class="bx bx-trash text-red-600 show-confirm"></i></button>
                    </form>
                </div>
            </div>
            <div class="body">
                @foreach($testQuestion->parts as $part)
                <div class="sub">
                    <div class="sr">{{Str::lower($roman->filter($i++))}}</div>
                    <div class="statement">{{$part->question->question}}</div>
                    <div class="action">
                        <a href="{{route('paper.question.parts.refresh',$part)}}"><i class="bi-arrow-repeat"></i></a>
                        <form id='formDel{{$part->id}}' action="{{route('paper-question-parts.destroy',$part)}}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit"><i class="bx bx-x text-red-600 show-confirm"></i></button>
                        </form>
                    </div>
                </div>
                @endforeach
            </div>
        </div>

        <!-- edit necessary parts modal -->
        <div id='modal-{{$testQuestion->id}}' class="modal bg-teal-100 p-6 rounded w-1/2 md:w-1/4">
            <form action="{{route('paper-questions.update', $testQuestion)}}" method="post" class="flex flex-col w-full">
                @csrf
                @method('PATCH')
                <p class="text-teal-600">Edit necessary parts</p>
                <div class="divider w-full my-3"></div>
                <input type="number" name="necessary_parts" value="{{$testQuestion->necessary_parts}}" min='0' max='{{$testQuestion->parts->count()}}' class="custom-input w-full">
                <button type="submit" class="btn-teal mt-4">Update</button>
            </form>
            <button class="close-modal absolute -top-4 -right-4 flex justify-center items-center rounded-full border border-slate-50 bg-gray-600  w-6 h-6"><i class="bi bi-x text-orange-300 hover:text-orange-400 text-base"></i></button>
        </div>
        @endforeach

        <!-- Long -->
        @foreach($test->questions()->long()->get() as $testQuestion)
        @php
        $i=1;
        @endphp
        <div class="question">
            <div class="head">
                <div class="sr">Q.{{$questionSr++}}</div>
                <div class="statement">

                    @if($testQuestion->parts->count()==$testQuestion->necessary_parts)
                    <span>Answer the following.</span>
                    @else
                    <span>Answer any {{SpellNumber::value($testQuestion->necessary_parts)->toLetters()}} questions.</span>
                    @endif

                </div>
                <div class="action border border-green-200 rounded bg-green-50">
                    <a modal-id='{{$testQuestion->id}}' class="show-modal text-cyan-600"><i class="bx bx-pencil"></i></a>
                    <a href="{{route('paper-questions.refresh',$testQuestion)}}"><i class="bi-arrow-repeat"></i></a>
                    <form action="{{route('paper-questions.destroy',$testQuestion)}}" method="post">
                        @csrf
                        @method('DELETE')
                        <button><i class="bx bx-trash text-red-600 show-confirm"></i></button>
                    </form>
                </div>
            </div>
            <div class="body">
                @foreach($testQuestion->parts as $part)
                <div class="sub">
                    <div class="sr">{{Str::lower($roman->filter($i++))}}</div>
                    <div class="statement">{{$part->question->question}}</div>
                    <div class="action">
                        <a href="{{route('paper.question.parts.refresh',$part)}}"><i class="bi-arrow-repeat"></i></a>
                        <form id='formDel{{$part->id}}' action="{{route('paper-question-parts.destroy',$part)}}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit"><i class="bx bx-x text-red-600 show-confirm"></i></button>
                        </form>
                    </div>
                </div>
                @endforeach
            </div>
        </div>

        <!-- edit necessary parts modal -->
        <div id='modal-{{$testQuestion->id}}' class="modal bg-teal-100 p-6 rounded w-1/2 md:w-1/4">
            <form action="{{route('paper-questions.update', $testQuestion)}}" method="post" class="flex flex-col w-full">
                @csrf
                @method('PATCH')
                <p class="text-teal-600">Edit necessary parts</p>
                <div class="divider w-full my-3"></div>
                <input type="number" name="necessary_parts" value="{{$testQuestion->necessary_parts}}" min='0' max='{{$testQuestion->parts->count()}}' class="custom-input w-full">
                <button type="submit" class="btn-teal mt-4">Update</button>
            </form>
            <button class="close-modal absolute -top-4 -right-4 flex justify-center items-center rounded-full border border-slate-50 bg-gray-600  w-6 h-6"><i class="bi bi-x text-orange-300 hover:text-orange-400 text-base"></i></button>
        </div>
        @endforeach

    </div>
    @else
    <!-- Empty Test -->
    <div class="divider my-3"></div>
    <div class="h-full flex flex-col justify-center items-center py-4 gap-3">
        <i class="bi-emoji-smile text-4xl"></i>
        <p class="text-center">Start adding questions</p>
    </div>
    @endif

    <!-- Add Question Button -->
    <div modal-id='add-question' class="show-modal fixed right-6 bottom-6 h-14 w-14 flex  justify-center items-center rounded-full btn-green hover:cursor-pointer">
        <i class="bi bi-plus-lg"></i>
    </div>

    <!-- modal showing question types -->
    <div id='modal-add-question' class="modal bg-gray-600 rounded w-1/2 md:w-1/4">
        <div class="flex flex-col  p-5 rounded gap-4 text-green-400 text-sm w-full relative">
            <a href="{{route('paper-questions.add',[$test, 'mcq'])}}" class="hover:text-slate-100">MCQ</a>
            <a href="{{route('paper-questions.add',[$test, 'short'])}}" class="hover:text-slate-100">Short</a>
            <a href="{{route('paper-questions.add',[$test, 'long'])}}" class="hover:text-slate-100">Long</a>

            <button class="close-modal absolute -top-4 -right-4 flex justify-center items-center rounded-full border border-slate-50 bg-gray-600  w-6 h-6"><i class="bi bi-x text-orange-300 hover:text-orange-400 text-base"></i></button>
        </div>
    </div>

</div>
@endsection
@section('footer')
<x-footer></x-footer>
@endsection
@section('script')
<script type="module">
    $('#add-question-btn').click(function() {
        $('#add-modal').addClass('shown');
    });

    $('.show-modal').click(function() {
        $('#modal-' + $(this).attr('modal-id')).addClass('shown');
    });

    $('.close-modal').click(function() {
        $(this).closest('.modal').removeClass('shown');
    })

    $('.show-confirm').click(function(event) {
        var form = $(this).closest("form");
        // var name = $(this).data("name");
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
                form.submit();
            }
        });
    });
</script>
@endsection