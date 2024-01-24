@extends('layouts.teacher')
@section('page-content')

<div class="custom-container">
    <h1>Test Draft</h1>
    <div class="bread-crumb">
        <a href="/">Home</a>
        <div>/</div>
        <div>Draft</div>
    </div>

    <div class="content-section">
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
                    <label>Max marks: &nbsp</label>
                    <label>{{$test->totalMarks()}}</label>
                </div>
                <!-- can edit only if some question exists -->
                @if($test->questions->count()>0)
                <div class="flex items-center">
                    <label>Suggested Time: &nbsp</label>
                    <label>{{$test->getDuration()}}</label>
                </div>
                @endif
            </div>
        </div>
        <div class="divider my-3"></div>
        @if($test->questions->count()>0)
        <div class="collapsible">
            <div class="head mt-8">
                <div class="flex items-center w-full">
                    <i class="bx bxs-chevron-down"></i>
                    <label class="flex-1 ml-3">Click here to see print options</label>
                    <span class="bi-printer"></span>
                </div>
            </div>

            <div class="body">
                <!-- 2nd grid starts here -->

                <div class="flex flex-wrap gap-4 bg-white">
                    <!-- grid 1x1  -->
                    <a href="{{route('teacher.tests.pdf',[$test,1,1])}}" class="bg-slate-50 hover:bg-slate-100" target="_blank">
                        <div class="grid grid-cols-1 w-16">
                            <div class="h-24 border"></div>
                        </div>
                    </a>
                    <!-- grid 1x2 -->
                    <a href="{{route('teacher.tests.pdf',[$test,1,2])}}" class="bg-slate-50 hover:bg-slate-100" target="_blank">
                        <div class="grid grid-cols-2 w-16">
                            <div class="h-24 border"></div>
                            <div class="h-24 border"></div>
                        </div>
                    </a>
                    <!-- grid 1x3 -->
                    <a href="{{route('teacher.tests.pdf',[$test,1,3])}}" class="bg-slate-50 hover:bg-slate-100" target="_blank">
                        <div class="grid grid-cols-3 w-16">
                            <div class="h-24 border"></div>
                            <div class="h-24 border"></div>
                            <div class="h-24 border"></div>
                        </div>
                    </a>
                    <!-- grid 2x1 -->
                    <a href="{{route('teacher.tests.pdf',[$test,2,1])}}" class="bg-slate-50 hover:bg-slate-100" target="_blank">
                        <div class="grid grid-cols-1 w-16">
                            <div class="h-12 border"></div>
                            <div class="h-12 border"></div>
                        </div>
                    </a>
                    <!-- grid 2x2 -->
                    <a href="{{route('teacher.tests.pdf',[$test,2,2])}}" class="bg-slate-50 hover:bg-slate-100" target="_blank">
                        <div class="grid grid-cols-2 w-16">
                            <div class="h-12 border"></div>
                            <div class="h-12 border"></div>
                            <div class="h-12 border"></div>
                            <div class="h-12 border"></div>
                        </div>
                    </a>
                    <!-- grid 2x3 -->
                    <a href="{{route('teacher.tests.pdf',[$test,2,3])}}" class="bg-slate-50 hover:bg-slate-100" target="_blank">
                        <div class="grid grid-cols-3 w-16">
                            <div class="h-12 border"></div>
                            <div class="h-12 border"></div>
                            <div class="h-12 border"></div>
                            <div class="h-12 border"></div>
                            <div class="h-12 border"></div>
                            <div class="h-12 border"></div>
                        </div>
                    </a>
                    <!-- grid 3x1 -->
                    <a href="{{route('teacher.tests.pdf',[$test,3,1])}}" class="bg-slate-50 hover:bg-slate-100" target="_blank">
                        <div class="grid grid-cols-1 w-16">
                            <div class="h-8 border"></div>
                            <div class="h-8 border"></div>
                            <div class="h-8 border"></div>
                        </div>
                    </a>
                    <!-- grid 3x2 -->
                    <a href="{{route('teacher.tests.pdf',[$test,3,2])}}" class="bg-slate-50 hover:bg-slate-100" target="_blank">
                        <div class="grid grid-cols-2 w-16">
                            <div class="h-8 border"></div>
                            <div class="h-8 border"></div>
                            <div class="h-8 border"></div>
                            <div class="h-8 border"></div>
                            <div class="h-8 border"></div>
                            <div class="h-8 border"></div>
                        </div>
                    </a>

                    <!-- grid 3x3 -->
                    <a href="{{route('teacher.tests.pdf',[$test,3,3])}}" class="bg-slate-50 hover:bg-slate-100" target="_blank">
                        <div class="grid grid-cols-3 w-16">
                            <div class="h-8 border"></div>
                            <div class="h-8 border"></div>
                            <div class="h-8 border"></div>
                            <div class="h-8 border"></div>
                            <div class="h-8 border"></div>
                            <div class="h-8 border"></div>
                            <div class="h-8 border"></div>
                            <div class="h-8 border"></div>
                            <div class="h-8 border"></div>
                        </div>
                    </a>
                    <!-- grid 4x1 -->
                    <a href="{{route('teacher.tests.pdf',[$test,4,1])}}" class="bg-slate-50 hover:bg-slate-100" target="_blank">
                        <div class="grid grid-cols-1 w-16">
                            <div class="h-6 border"></div>
                            <div class="h-6 border"></div>
                            <div class="h-6 border"></div>
                            <div class="h-6 border"></div>
                        </div>
                    </a>
                    <!-- grid 4x2 -->
                    <a href="{{route('teacher.tests.pdf',[$test,4,2])}}" class="bg-slate-50 hover:bg-slate-100" target="_blank">
                        <div class="grid grid-cols-2 w-16">
                            <div class="h-6 border"></div>
                            <div class="h-6 border"></div>
                            <div class="h-6 border"></div>
                            <div class="h-6 border"></div>
                            <div class="h-6 border"></div>
                            <div class="h-6 border"></div>
                            <div class="h-6 border"></div>
                            <div class="h-6 border"></div>
                        </div>
                    </a>
                    <!-- grid 4x3 -->
                    <a href="{{route('teacher.tests.pdf',[$test,4,3])}}" class="bg-slate-50 hover:bg-slate-100" target="_blank">
                        <div class="grid grid-cols-3 w-16">
                            <div class="h-6 border"></div>
                            <div class="h-6 border"></div>
                            <div class="h-6 border"></div>
                            <div class="h-6 border"></div>
                            <div class="h-6 border"></div>
                            <div class="h-6 border"></div>
                            <div class="h-6 border"></div>
                            <div class="h-6 border"></div>
                            <div class="h-6 border"></div>
                            <div class="h-6 border"></div>
                            <div class="h-6 border"></div>
                            <div class="h-6 border"></div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
        <div class="divider my-3"></div>
        <form action="{{route('teacher.tests.pdf.store',$test)}}" method="post">
            @csrf
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-x-4 gap-y-2">
                <div>
                    <label for="">Page Orientation</label>
                    <select name="page_orientation" id="" class="w-full custom-input">
                        <option value="portrait">Portrait</option>
                        <option value="landscape">Landscape</option>
                    </select>
                </div>
                <div>
                    <label for="">Page Size</label>
                    <select name="page_size" id="" class="w-full custom-input">
                        <option value="a4">A4</option>
                        <option value="legal">Legal</option>
                    </select>
                </div>
                <div>
                    <label for="">Font Size</label>
                    <select name="font_size" id="" class="w-full custom-input">
                        <option value="text-base">Normal</option>
                        <option value="text-sm">Medium</option>
                        <option value="text-xs">Small</option>
                        <option value="text-xxs">Extra Small</option>
                    </select>
                </div>
            </div>
            <div class="divider my-3"></div>
            <div class="flex gap-x-4 gap-y-2 items-center">
                <h2>How many rows x colums?</h2>
                <div>
                    <!-- <label for="">How Many Rows?</label> -->
                    <input type="number" name="rows" id="" min=1 class="custom-input w-12">
                </div>
                <div>x</div>
                <div>
                    <!-- <label for="">How Many Rows?</label> -->
                    <input type="number" name="cols" id="" min=1 class="custom-input w-12">
                </div>
            </div>
            <button type="submit" class="btn-green">Generate PDF</button>
        </form>
        @endif

    </div>
</div>
@endsection