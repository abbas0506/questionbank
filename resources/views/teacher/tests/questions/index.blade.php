@extends('layouts.teacher')
@section('page-content')

<div class="container">
    <h1>Test Draft</h1>
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

        <div class="flex justify-between mt-4">
            <div>
                <label>{{$test->title}}</label>
                <h2>{{$test->subject->grade->roman_name}} - {{$test->subject->name}}</h2>
            </div>
            <div class="flex flex-col justify-center">
                <div class="flex items-center">
                    <label>Max marks:</label>
                    <label>{{$test->totalMarks()}}</label>
                </div>
                <div class="flex items-center">
                    <label>Suggested Time:</label>
                    <div class="flex items-center space-x-2">
                        @if($test->duration>0)
                        <label>{{$test->duration}}</label>
                        @else
                        <label>{{$test->totalMarks()*1.5}} min</label>
                        @endif
                        <a href="{{route('teacher.tests.edit',$test)}}" class="btn-sky flex justify-center items-center rounded-full p-0 w-5 h-5"><i class="bx bx-pencil text-xs"></i></a>
                    </div>


                </div>
            </div>
        </div>
        <div class="divider my-3"></div>
        @if($test->questions->count()>0)
        <div class="flex flex-col gap-2 mt-3">
            @foreach($test->questions as $testQuestion)

            @if($testQuestion->question_type=='mcq')
            <div class="flex items-center justify-between">
                <div class="flex items-baseline space-x-1">
                    <h3>Q.{{$testQuestion->question_no}}</h3>
                    <h3>Answer any {{$testQuestion->necessary_parts}} questions</h3>
                </div>
                <div class="text-sm">
                    {{$testQuestion->necessary_parts}}x1={{$testQuestion->necessary_parts}}
                </div>
            </div>
            <ol class="list-[lower-roman] list-outside text-sm pl-6">
                @foreach($testQuestion->parts as $part)
                <li>
                    {{$part->question->question}}
                    <div class="grid grid-cols-1 md:grid-cols-4">
                        <div>a. {{$part->question->mcq->option_a}}</div>
                        <div>b. {{$part->question->mcq->option_b}}</div>
                        <div>c. {{$part->question->mcq->option_c}}</div>
                        <div>d. {{$part->question->mcq->option_d}}</div>
                    </div>
                </li>
                @endforeach
            </ol>
            @elseif($testQuestion->question_type=='short')
            <div class="flex items-center justify-between">
                <div class="flex items-baseline space-x-1">
                    <h3>Q.{{$testQuestion->question_no}}</h3>
                    <h3>Answer any {{$testQuestion->necessary_parts}} questions</h3>
                </div>
                <div class="text-sm">
                    {{$testQuestion->necessary_parts}}x2={{$testQuestion->necessary_parts*2}}
                </div>
            </div>
            <ol class="list-[lower-roman] list-outside text-sm pl-6">
                @foreach($testQuestion->parts as $part)
                <li>{{$part->question->question}}</li>
                @endforeach
            </ol>
            @else
            <div class="flex items-center justify-between">
                <div class="flex items-baseline space-x-1">
                    <h3>Q.{{$testQuestion->question_no}}</h3>
                    <h3>Answer the following</h3>
                </div>
                <div class="text-sm">
                </div>
            </div>
            <ol class="list-[lower-alpha] list-outside text-sm pl-6">
                @foreach($testQuestion->parts as $part)
                <li class="my-1">
                    <div class="flex justify-between">
                        <div>{{$part->question->question}}</div>
                        <div class="flex items-center space-x-2">
                            <div>{{$part->marks}}</div>
                            <a href="{{route('teacher.question-parts.edit',$part)}}" class="btn-sky flex justify-center items-center rounded-full p-0 w-5 h-5"><i class="bx bx-pencil text-xs"></i></a>
                        </div>
                    </div>
                </li>

                @endforeach
            </ol>
            @endif
            @endforeach
        </div>

        @endif
        <div class="divider my-8"></div>
        <div class="flex flex-col justify-center items-center gap-4">
            <i class="bi-plus-circle text-2xl text-slate-400"></i>
            <div class="flex space-x-2">
                <a href="{{route('teacher.tests.questions.add', 'mcq')}}" class="btn-teal rounded-full px-4 py-1 text-xs">MCQs</a>
                <a href="{{route('teacher.tests.questions.add', 'short')}}" class="btn-orange rounded-full px-4 py-1 text-xs">Short</a>
                <a href="{{route('teacher.tests.questions.add', 'long')}}" class="btn-sky rounded-full px-4 py-1 text-xs">Long</a>
            </div>
        </div>
    </div>
</div>
@endsection