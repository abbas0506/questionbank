@extends('layouts.librarian')
@section('page-content')
<div class="container">
    <h2>Return Policy</h2>
    <div class="bread-crumb">
        <a href="{{url('librarian')}}">Home</a>
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

            <div class="text-right"><a href="{{route('librarian.book-return-policy.edit', $bookReturnPolicy)}}" class="btn-teal">Edit <i class="bx bx-pencil"></i></a></div>
            <div class="border rouned-lg flex justify-between items-center p-5 mt-1">
                <div class="flex-1">Max Days <span class="text-sm text-slate-600">(Student can possess a book)</span></div>
                <div>{{$bookReturnPolicy->max_days}}</div>
            </div>
            <div class="border rouned-lg flex justify-between items-center p-5">
                <div class="flex-1">Fine / Day <span class="text-sm text-slate-600">(After due date)</span></div>
                <div>{{$bookReturnPolicy->fine_per_day}}</div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')
<script>
    function validate(event) {

        var bookRef = $('#book_ref').val();
        var bookRegex = /^[A-E][0-9]-[0-9]{5}-[0-9]{2}$/;

        if (!bookRegex.test(bookRef)) {
            event.preventDefault();
            Swal.fire({
                title: "Book Ref?",
                text: "Invalid format",
                icon: "warning",
                showConfirmButton: false,
                timer: 1500

            });
            return false;
        } else {
            //validated
            return true;
        }
    }
</script>
@endsection