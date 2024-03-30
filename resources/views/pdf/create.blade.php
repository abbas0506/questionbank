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
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 justify-items-center justify-center p-6 md:w-4/5 mx-auto">
            <div class="callable">
                Page Size
                <div class="right-pointer"></div>
            </div>
            <div class="w-full h-full  flex justify-start items-start space-x-4">
                <div class="page-size-container w-16 h-20 active">
                    <input type="checkbox" name="page_size" value="a4" class="page-size" checked>
                    <div class="text-xs">A4</div>
                </div>
                <div class="page-size-container w-16 h-24">
                    <input type="checkbox" name="page_size" value="legal" class="page-size">
                    <div class="text-xs">Legal</div>
                </div>
            </div>

            <div class="callable">
                Orientation
                <div class="right-pointer"></div>
            </div>
            <div class="w-full h-full  flex justify-start items-start space-x-4">
                <div class="flex justify-center items-start gap-x-4">
                    <div class="page-orientation-container w-16 h-20">
                        <input type="checkbox" bound='portrait' name="page_orientation" value="portrait" class="page-orientation">
                        <div class="text-xs">Portrait</div>
                    </div>
                    <div class="page-orientation-container w-24 h-16 active">
                        <input type="checkbox" bound='landscape' name="page_orientation" value="landscape" class="page-orientation" checked>
                        <div class="text-xs">Landscape</div>
                    </div>
                </div>
            </div>
            <div class="callable">
                Font Size
                <div class="right-pointer"></div>
            </div>
            <div class="w-full h-full flex justify-start items-start space-x-4">
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

            <div class="callable">
                Papers Per Page
                <div class="right-pointer"></div>
            </div>
            <div class="w-full h-full flex flex-col justify-start items-start">
                <!-- portrait options -->
                <div id='portrait' class="hidden grid grid-cols-3 gap-2 w-full">
                    <!-- portrait -->
                    <div row='1' col='1' class="page grid grid-cols-1 w-12">
                        <div class="paper w-12 h-16 border"></div>
                        <div class="text-xs">1x1</div>
                    </div>
                    <div row='2' col='1' class="page grid grid-cols-1 w-12">
                        <div class="paper h-8 border"></div>
                        <div class="paper h-8 border"></div>
                        <div class="text-xs">2x1</div>
                    </div>
                    <div row='3' col='1' class="page grid grid-cols-1 w-12">
                        <div class="paper h-6 border"></div>
                        <div class="paper h-6 border"></div>
                        <div class="paper h-6 border"></div>
                        <div class="text-xs">3x1</div>
                    </div>
                    <div row='1' col='2' class="page grid grid-cols-2 w-12">
                        <div class="paper w-6 h-16 border"></div>
                        <div class="paper w-6 h-16 border"></div>
                        <div class="text-xs col-span-2">1x2</div>
                    </div>
                    <div row='2' col='2' class="page grid grid-cols-2 w-12">
                        <div class="w-6 paper h-8 border"></div>
                        <div class="w-6 paper h-8 border"></div>
                        <div class="w-6 paper h-8 border"></div>
                        <div class="w-6 paper h-8 border"></div>
                        <div class="text-xs col-span-2">2x2</div>
                    </div>
                    <div row='3' col='2' class="page grid grid-cols-2 w-12">
                        <div class="w-6 paper h-5 border"></div>
                        <div class="w-6 paper h-5 border"></div>
                        <div class="w-6 paper h-5 border"></div>
                        <div class="w-6 paper h-5 border"></div>
                        <div class="w-6 paper h-5 border"></div>
                        <div class="w-6 paper h-5 border"></div>
                        <div class="text-xs col-span-2">3x2</div>
                    </div>
                </div>

                <!-- landscapre options -->
                <div id='landscape' class="grid grid-cols-3 gap-2 w-full">
                    <!-- portrait -->
                    <div row='1' col='1' class="page grid grid-cols-1 w-16">
                        <div class="paper h-12 border"></div>
                        <div class="text-xs">1x1</div>
                    </div>
                    <div row='2' col='1' class="page grid grid-cols-1 w-16 active">
                        <div class="paper h-6 border"></div>
                        <div class="paper h-6 border"></div>
                        <div class="text-xs">2x1</div>
                    </div>
                    <div row='3' col='1' class="page grid grid-cols-1 w-16">
                        <div class="paper h-4 border"></div>
                        <div class="paper h-4 border"></div>
                        <div class="paper h-4 border"></div>
                        <div class="text-xs">3x1</div>
                    </div>
                    <div row='1' col='2' class="page grid grid-cols-2 w-16">
                        <div class="paper w-8 h-12 border"></div>
                        <div class="paper w-8 h-12 border"></div>
                        <div class="text-xs col-span-2">1x2</div>
                    </div>
                    <div row='2' col='2' class="page grid grid-cols-2 w-16">
                        <div class="w-8 paper h-6 border"></div>
                        <div class="w-8 paper h-6 border"></div>
                        <div class="w-8 paper h-6 border"></div>
                        <div class="w-8 paper h-6 border"></div>
                        <div class="text-xs col-span-2">2x2</div>
                    </div>
                    <div row='3' col='2' class="page grid grid-cols-2 w-16">
                        <div class="w-8 paper h-4 border"></div>
                        <div class="w-8 paper h-4 border"></div>
                        <div class="w-8 paper h-4 border"></div>
                        <div class="w-8 paper h-4 border"></div>
                        <div class="w-8 paper h-4 border"></div>
                        <div class="w-8 paper h-4 border"></div>
                        <div class="text-xs col-span-2">3x2</div>
                    </div>
                </div>
                <!-- <div class="col-span-3 divider"></div> -->
                <!-- advanced printing options collapsible -->
                <div class="collapsible mt-3 w-full">
                    <div class="head">
                        <div class="flex items-center space-x-2">
                            <i class="bx bxs-chevron-down text-blue-600"></i>
                            <h2 class=""><span class="text-slate-800 text-xs">Advanced options</span></h2>
                        </div>
                    </div>

                    <div class="body">
                        <div id='advanced' class="col-span-3 grid grid-cols-2 gap-2">
                            <div>
                                <input type="number" name="rows" id="rows" value="1" min=1 max=6 class="custom-input text-center" required>
                                <div class="text-xs">Horizontal</div>
                            </div>
                            <div>
                                <input type="number" name="cols" id="cols" value="1" min=1 max=6 class="custom-input text-center" required>
                                <div class="text-xs">Vertical</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="text-center my-8">
                <button type="submit" class="btn-green">Generate PDF</button>
            </div>
        </div>
    </form>
    @endif
</div>
@endsection
@section('script')
<script type="module">
    $('.font-size').change(function() {
        // check only one of many
        $('.font-size').not(this).prop('checked', false);
    });

    $('.page').click(function() {
        var rows = $(this).attr('row');
        var cols = $(this).attr('col');
        $('#rows').val(rows);
        $('#cols').val(cols);
        $('.page').not(this).removeClass('active');
        $(this).addClass('active');

    });

    $('.page-size-container').click(function() {
        //iterate through all first children (checkboxes) of the page szie class
        //update their check status and visibility 
        var obj = $(this).children(":first");
        $('.page-size-container').find(":first-child").each(function() {
            if (obj.is($(this))) {
                $(this).prop('checked', true);
                $(this).parent().addClass('active');

            } else {
                $(this).prop('checked', false);
                $(this).parent().removeClass('active');
            }
        });
    })


    $('.page-orientation-container').click(function() {
        //iterate through all first children (checkboxes) of the page orientation
        //update their check status and visibility 
        var obj = $(this).children(":first");
        $('.page-orientation-container').find(":first-child").each(function() {
            if (obj.is($(this))) {
                $(this).prop('checked', true);
                $('#' + $(this).attr('bound')).removeClass('hidden');
                $(this).parent().addClass('active');

            } else {
                $(this).prop('checked', false);
                $('#' + $(this).attr('bound')).addClass('hidden');
                $(this).parent().removeClass('active');
            }
        });
    })
</script>
@endsection