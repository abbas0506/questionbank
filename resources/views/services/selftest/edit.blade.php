@extends('layouts.basic')

@section('header')
<x-header></x-header>
@endsection

@section('body')
<style>
    .hero {
        background-image: linear-gradient(rgba(0, 100, 100, 1.0),
            rgba(128, 128, 128, 0)),
        url("{{asset('/images/bg/exams1-01.svg')}}");
        background-position: center;
        background-repeat: no-repeat;
        background-size: contain;
        background-clip: border-box;
        position: relative;
    }
</style>
<div class="w-full md:w-2/3 mx-auto text-center mt-32 px-5">

    <h1 class="text-3xl">SELF TEST</h1>
    <p class="text-slate-600 leading-relaxed mt-6">Optimize your performance by selecting appropriate number of questions from each chapter. By default one minute per question time is set, however, you can adjust timer as you wish.</p>
    <div class="h-1 w-24 bg-teal-800 mx-auto mt-6"></div>
    <div class="flex items-center justify-center gap-4 mt-4">
        <div class="flex flex-col text-left">
            <label for="">Questions</label>
            <input type="number" class="custom-input w-24" value="20">
        </div>
        <div class="flex flex-col text-left">
            <label for="">Time (min)</label>
            <input type="number" class="custom-input w-24 " value="20">
        </div>
    </div>

    <h3 class="text-lg mt-8">Please select chapter(s) for test</h3>
    <!-- page message -->
    @if($errors->any())
    <x-message :errors='$errors'></x-message>
    @else
    <x-message></x-message>
    @endif

    <form id='start-test-form' action="{{route('selftest.store')}}" method='post' onsubmit="return validate(event)">
        @csrf
        <div class="mt-8">
            @foreach($chapters->sortBy('chapter_no') as $chapter)
            <div class="flex items-center justify-between space-x-2 border-b">
                <label for="chapter{{$chapter->chapter_no}}" class="hover:cursor-pointer text-base text-slate-800 text-left py-3 flex-1">{{$chapter->chapter_no}}. &nbsp {{$chapter->name}}</label>
                <input type="checkbox" id='chapter{{$chapter->chapter_no}}' name='chapter_id_array[]' class="custom-input w-4 h-4" value="{{ $chapter->id }}">
            </div>
            @endforeach
        </div>
        <input type="hidden" name='subject_id' value="{{$subject->id}}">
        <div class="border-b border-slate-100 my-12"></div>

        <button type="submit" class="fixed bottom-6 right-6 w-12 h-12 rounded-full btn-teal flex justify-center items-center" @disabled($chapters->count()==0)> <i class="bi-caret-right"></i></button>
    </form>
</div>
@endsection
@section('footer')
<x-footer></x-footer>
@endsection
@section('script')
<script type="module">
    $('document').ready(function() {
        $('#start-test-form').submit(function(e) {
            var anyChecked = 0
            $('.custom-input').each(function() {
                if ($(this).is(':checked'))
                    anyChecked++;
            })
            if (anyChecked == 0) {
                event.preventDefault();
                Swal.fire({
                    icon: 'warning',
                    title: 'Please select a chapter',
                    showConfirmButton: false,
                    timer: 1000,
                })

            }
        })
    })
</script>
@endsection