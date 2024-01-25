<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Auto Generated Paper</title>
    <link href="{{public_path('css/pdf_tw.css')}}" rel="stylesheet">
    <style>
        @page {
            margin: 30px 30px 30px 30px;
        }

        .footer {
            position: fixed;
            bottom: 50px;
            left: 30px;
            right: 50px;
            background-color: white;
            height: 50px;
        }

        .page-break {
            page-break-after: always;
        }

        .data tr th,
        .data tr td {
            font-size: 12px;
            text-align: center;
            /* padding-bottom: 2px; */
            border: 0.5px solid;
        }
    </style>
</head>
@php
$roman = config('global.romans');
@endphp

<body>
    <main>
        <div class="custom-container">
            <!-- <div class="relative">
                <div class="absolute"><img alt="logo" src="{{public_path('/images/logo/school_logo.png')}}" class="w-8"></div>
            </div> -->
            <table class="{{$fontSize}} w-full">

                @php
                $i=1;
                $j=1;
                @endphp
                <tbody>
                    @for($i=1; $i<=$rows;$i++) <tr>
                        @for($j=1; $j<=$cols;$j++) <td class='px-8'>
                            <table class="w-full">
                                <tbody>
                                    <tr>
                                        <td colspan="2" class="text-center font-bold m-0 p-0">{{$test->title}}</td>
                                    </tr>
                                    <tr>
                                        <td colspan="2" class="m-0 p-0">{{$test->subject->grade->roman_name}} - {{$test->subject->name}}, Dated: {{$test->test_date->format('d/m/Y')}}</td>
                                    </tr>
                                    <tr>
                                        <td colspan="2">
                                            <div style="border-style:solid; border-width:0px 0px 0.5px 0px;"></div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="text-left">Marks: {{$test->totalMarks()}}, Time: {{$test->getDuration()}}</td>
                                        <td class="text-right">Roll # ____</td>
                                    </tr>

                                </tbody>
                            </table>
                            <div style="border-style:solid; border-width:0px 0px 0.5px 0px;"></div>

                            @if($test->questions->count()>0)
                            <table class="table-auto w-full">
                                <thead>
                                    <tr>
                                        <th class=""></th>
                                        <th class="w-12"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($test->questions as $testQuestion)
                                    @if($testQuestion->question_type=='mcq')
                                    <tr>
                                        <td class="text-left font-bold">Q.{{$testQuestion->question_no}} Answer any {{$testQuestion->necessary_parts}} questions</td>
                                        <td>{{$testQuestion->necessary_parts}}x1={{$testQuestion->necessary_parts}}</td>
                                    </tr>

                                    <tr style="border-style:dotted; border-width:0px 0px 1px 0px;">
                                        <td colspan="2" class="text-left">
                                            <ol class="lower-roman ml-4">
                                                @foreach($testQuestion->parts as $part)
                                                <li>
                                                    {{$part->question->question}}
                                                    <ol class="list-horizontal lower-alpha">
                                                        <li class="text-left w-1-4">a. {{$part->question->mcq->option_a}}</li>
                                                        <li class="text-left w-1-4">b. {{$part->question->mcq->option_b}}</li>
                                                        <li class="text-left w-1-4">c. {{$part->question->mcq->option_c}}</li>
                                                        <li class="text-left w-1-4">d. {{$part->question->mcq->option_d}}</li>
                                                    </ol>
                                                </li>
                                                @endforeach
                                            </ol>
                                        </td>
                                    </tr>
                                    @elseif($testQuestion->question_type=='short')
                                    <tr>
                                        <td class="text-left font-bold">Q.{{$testQuestion->question_no}} Answer any {{$testQuestion->necessary_parts}} questions</td>
                                        <td>{{$testQuestion->necessary_parts}}x2={{$testQuestion->necessary_parts*2}}</td>
                                    </tr>

                                    <tr>
                                        <td colspan="2" class="text-left">
                                            <ol class="lower-roman ml-4">
                                                @foreach($testQuestion->parts as $part)
                                                <li>{{$part->question->question}}</li>
                                                @endforeach
                                            </ol>
                                        </td>
                                    </tr>
                                    @else
                                    <!-- long question -->
                                    @if($testQuestion->parts->count()==1)
                                    <tr>
                                        <td class="text-left" colspan="2">

                                            <ul class="list-horizontal w-full font-bold">
                                                <li style='width:90%'>Q.{{$testQuestion->question_no}} {{$testQuestion->parts->first()->question->question}}</li>
                                                <li class="w-4 text-right">{{$testQuestion->parts->first()->marks}}</li>
                                            </ul>

                                        </td>
                                    </tr>
                                    @else
                                    <tr>
                                        <td class="text-left font-bold" colspan="2">Q.{{$testQuestion->question_no}} Answer the following</td>
                                    </tr>
                                    <tr>
                                        <td colspan="2" class="text-left">
                                            <ol class="lower-alpha ml-4">
                                                @foreach($testQuestion->parts as $part)
                                                <li>
                                                    <ul class="list-horizontal w-full">
                                                        <li style='width:90%'>{{$part->question->question}}</li>
                                                        <li class="w-4 text-right">{{$part->marks}}</li>
                                                    </ul>
                                                </li>
                                                @endforeach
                                            </ol>

                                        </td>
                                    </tr>
                                    @endif
                                    @endif
                                    @endforeach
                                </tbody>
                            </table>
                            @endif

                            </td>
                            @endfor
                            </tr>
                            <!-- rowspacing between each row of papers -->
                            <tr>
                                <td class="py-4" colspan="{{$cols}}"></td>
                            </tr>
                            @endfor
                </tbody>
            </table>

        </div>

    </main>

</body>

</html>