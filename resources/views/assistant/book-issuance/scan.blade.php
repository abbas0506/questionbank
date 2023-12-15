@extends('layouts.assistant')
@section('page-content')
<div class="container">
    <h2>Issue Book</h2>
    <div class="bread-crumb">
        <a href="{{url('assistant')}}">Home</a>
        <div>/</div>
        <div>Issue Book</div>
    </div>
    <div class="h-96 flex justify-center items-center">
        <div class="w-full md:w-1/2 mx-auto">
            <!-- page message -->
            @if($errors->any())
            <x-message :errors='$errors'></x-message>
            @else
            <x-message></x-message>
            @endif

            <form action="{{route('library.assistant.book-issuance.scan')}}" method='post' class="mt-4" onsubmit="return validate(event)">
                @csrf
                <div class="relative">
                    <i class="bx bx-book absolute right-2 top-4"></i>
                    <input type="text" id='book_ref' name='book_ref' class="custom-input" placeholder="Scan here" value="">
                </div>
                <div class="relative mt-2">
                    <i class="bx bx-user absolute right-2 top-4"></i>
                    <input type="text" id='reader_ref' name='reader_ref' class="custom-input" placeholder="Scan here" value="">
                </div>
                <div class="flex mt-4 float-right">
                    <button type="submit" class="btn-teal rounded px-4">Next</button>
                </div>
            </form>

        </div>
    </div>
</div>
@endsection
@section('script')
<script>
    function validate(event) {

        var bookRef = $('#book_ref').val();
        var bookRegex = /^[A-e][0-9]-[0-9]{4}-[0-9]{1,2}$/;

        var readerRef = $('#reader_ref').val();
        var readerRegex = /^[3][0-9]{12}$/;

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
        } else if (!readerRegex.test(readerRef)) {
            event.preventDefault();
            Swal.fire({
                title: "Student Ref?",
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