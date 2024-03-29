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

    @if($test->questions->count())
    <div class="divider my-3"></div>
    <h2 class="text-left">Page Setting <i class="bi bi-gear"></i></h2>
    <p class="text-left w-full mx-auto mt-1 mb-3 text-sm text-gray-600">Do you know that a careful selction of the following options can save your printing cost by more than 50%. Choose the most appropriate options and optimize your printing cost.</p>
    <div class="divider my-3"></div>
    @endif
    @if($test->questions->count()>0)
    <form action="{{route('question-paper.pdf.store',$test)}}" method="post">
        @csrf
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 justify-items-center justify-center p-6 w-4/5 mx-auto">
            <div class="w-full h-full bg-teal-100 place-content-center md:rounded-lg relative">
                Page Size
                <div class="absolute w-4 h-4 hidden md:block md:-right-2 md:top-[40%]  bg-teal-100 transform rotate-45"></div>
            </div>
            <div class="w-full h-full  flex justify-start items-start space-x-4">
                <div class="w-16 h-20 flex justify-center items-center bg-orange-50 border  border-gray-200 relative">
                    <input type="checkbox" name="page_size" value="a4" class="absolute top-1 left-1 page-size" checked>
                    <div class="text-xs">A4</div>
                </div>
                <div class="w-16 h-24 flex justify-center items-center bg-orange-50 border border-gray-200 relative">
                    <input type="checkbox" name="page_size" value="legal" class="absolute top-1 left-1 page-size">
                    <div class="text-xs">Legal</div>
                </div>
            </div>

            <div class="w-full h-full bg-teal-100 place-content-center md:rounded-lg relative">
                Page Orientation
                <div class="absolute w-4 h-4 hidden md:block md:-right-2 md:top-[40%]  bg-teal-100 transform rotate-45"></div>
            </div>
            <div class="w-full h-full  flex justify-start items-start space-x-4">
                <div class="flex justify-center items-start gap-x-4">
                    <div class="w-16 h-20 flex justify-center items-center bg-green-50 border border-gray-200 relative">
                        <input type="checkbox" name="page_orientation" value="portrait" class="absolute top-1 left-1 page-orientation">
                        <div class="text-xs">Portrait</div>
                    </div>
                    <div class="w-24 h-16 flex justify-center items-center bg-green-50 border border-gray-200 relative">
                        <input type="checkbox" name="page_orientation" value="landscape" class="absolute top-1 left-1 page-orientation" checked>
                        <div class="text-xs">Landscape</div>
                    </div>
                </div>
            </div>
            <div class="w-full h-full bg-teal-100 place-content-center md:rounded-lg relative">
                Font Size
                <div class="absolute w-4 h-4 hidden md:block md:-right-2 md:top-[40%]  bg-teal-100 transform rotate-45"></div>
            </div>
            <div class="w-full h-full flex justify-start items-start space-x-4">
                <div class="bg-orange-50 rounded p-4">
                    <h3 class="pb-4">Font Size</h3>
                    <div class="flex justify-center gap-x-4">
                        <div class="flex flex-col gap-2">
                            <div class="flex items-center space-x-2">
                                <input type="checkbox" name="font_size" value="text-base" class="font-size">
                                <div class="text-base">Normal</div>
                            </div>
                            <div class="flex items-center space-x-2">
                                <input type="checkbox" name="font_size" value="text-sm" class="font-size">
                                <div class="text-sm">Medium</div>
                            </div>
                            <div class="flex items-center space-x-2">
                                <input type="checkbox" name="font_size" value="text-xs" class="font-size" checked>
                                <div class="text-xs">Small</div>
                            </div>
                            <div class="flex items-center space-x-2">
                                <input type="checkbox" name="font_size" value="text-xxs" class="font-size">
                                <div class="text-xxs">Extra Small</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="w-full h-full bg-teal-100 place-content-center md:rounded-lg relative">
                Question Papers Per Page
                <div class="absolute w-4 h-4 hidden md:block md:-right-2 md:top-[40%]  bg-teal-100 transform rotate-45"></div>
            </div>
            <!-- 60 25 852 0000 -->

            <div class="flex flex-col md:flex-row-reverse items-center">
                <div class="flex flex-col items-center justify-center p-2 w-36">
                    <p class="text-xs">For example</p>
                    <div class="grid grid-cols-3 w-24">
                        <div class="h-8 border"></div>
                        <div class="h-8 border"></div>
                        <div class="h-8 border"></div>
                        <div class="h-8 border"></div>
                        <div class="h-8 border"></div>
                        <div class="h-8 border"></div>
                    </div>
                    <p class="text-xs">3x2</p>
                </div>
                <div class="flex flex-1 justify-center items-center gap-x-4">
                    <input type="number" name="cols" id="" value="2" min=1 max=6 class="custom-input w-16" required>
                    <div>x</div>
                    <input type="number" name="rows" id="" value="1" min=1 max=6 class="custom-input w-16" required>
                </div>
            </div>


        </div>

        <div class="text-center mt-8">
            <button type="submit" class="btn-green">Generate PDF</button>
        </div>
    </form>
    @endif

</div>
</div>
@endsection
@section('script')
<script type="module">
    $('.page-size').change(function() {
        $('.page-size').not(this).prop('checked', false);
    });
    $('.page-orientation').change(function() {
        $('.page-orientation').not(this).prop('checked', false);
    });
    $('.font-size').change(function() {
        $('.font-size').not(this).prop('checked', false);
    });
</script>
@endsection