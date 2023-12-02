@extends('layouts.library.incharge')
@section('page-content')
<div class="container">
    <h2>Return Policy</h2>
    <div class="bread-crumb">
        <a href="{{url('library/incharge')}}">Home</a>
        <div>/</div>
        <div>Return Policy</div>
    </div>
    <div class="h-96 flex justify-center items-center">


        <div class="w-full md:w-1/2 mx-auto">
            <!-- page message -->
            @if($errors->any())
            <x-message :errors='$errors'></x-message>
            @else
            <x-message></x-message>
            @endif

            <form action="{{route('library.incharge.book-return-policy.update', $bookReturnPolicy)}}" method='post' class="mt-4" onsubmit="return validate(event)">
                @csrf
                @method('PATCH')
                <div class="border rouned-lg flex justify-between items-center p-5 mt-1">
                    <div class="flex-1">Max Days <span class="text-sm text-slate-600">(Student can possess a book)</span></div>
                    <input type="text" name='max_days' value="{{$bookReturnPolicy->max_days}}" class="w-12 h-8 custom-input text-center">
                </div>
                <div class="border rouned-lg flex justify-between items-center p-5">
                    <div class="flex-1">Fine / Day <span class="text-sm text-slate-600">(After due date)</span></div>
                    <input type="text" name='fine_per_day' value="{{$bookReturnPolicy->fine_per_day}}" class="w-12 h-8 custom-input text-center">
                </div>
                <button type="submit" class="btn-blue mt-4">Update Now</button>
            </form>
        </div>
    </div>
</div>
@endsection