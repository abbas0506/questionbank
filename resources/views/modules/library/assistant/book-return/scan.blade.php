@extends('layouts.library.assistant')
@section('page-content')
<div class="container">
    <h2>Issue Book</h2>
    <div class="bread-crumb">
        <a href="{{url('library/assistant')}}">Home</a>
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

            <form action="{{route('library.assistant.book-return.scan')}}" method='post' class="mt-4" onsubmit="return validate(event)">
                @csrf
                <div class="flex flex-col gap-y-1">

                    <label class="w-32 text-sm">Book Ref.</label>
                    <input type="text" id='book_ref' name='book_ref' class="custom-input" placeholder="Scan here" value="">

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
        var bookRegex = /^[A-Z][0-9]-[0-9]{4}-[0-9]{2}$/;

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