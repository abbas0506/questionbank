@extends('layouts.librarian')
@section('page-content')
<div class="container">
    <h2>Print Books Qr</h2>
    <div class="bread-crumb">
        <a href="{{url('librarian')}}">Home</a>
        <div>/</div>
        <div>Book Racks</div>
        <div>/</div>
        <div>All</div>
    </div>

    <div class="mt-8">
        <div class="flex items-center flex-wrap gap-4">
            <form action="{{route('librarian.qr.range.create')}}" method="post" class="flex items-center flex-wrap gap-x-4">
                @csrf
                <input type="number" name='from' placeholder="From" class="custom-input text-center w-16 lg:w-24 text-xs py-2">
                <input type="number" name='to' placeholder="To" class="custom-input text-center w-16 lg:w-24 text-xs py-2">
                <button type="submit" class="btn-orange py-1"><i class="bi-qr-code"></i></button>
            </form>
            <div class="px-6 text-slate-400 hidden md:flex">|</div>
            <form action="{{route('librarian.qr.specific.create')}}" method="post" class="flex items-center flex-wrap gap-x-4">
                @csrf
                <input type="text" name='qr' placeholder="Exact Qr Code" class="custom-input text-center w-36 lg:w-40 text-xs py-2">
                <button type="submit" class="btn-orange py-1"><i class="bi-qr-code"></i></button>
            </form>
        </div>
        <!-- page message -->
        @if($errors->any())
        <x-message :errors='$errors'></x-message>
        @else
        <x-message></x-message>
        @endif

        @php $sr=1; @endphp
        <div class="overflow-x-auto w-full mt-4">
            <table class="table-fixed w-full">
                <thead>
                    <tr class="border-b border-slate-200">
                        <th class="w-12">Sr</th>
                        <th class="w-16">Rack Label</th>
                        <th class="w-16">Books</th>
                        <th class="w-16">Copies</th>
                        <th class="w-32">Range</th>
                        <th class="w-16">QR</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($bookRacks as $bookRack)
                    <tr>
                        <td>{{$sr++}}</td>
                        <td><a href="{{route('librarian.book-racks.show', $bookRack)}}" class="link">{{$bookRack->label}}</a></td>
                        <td>{{$bookRack->books->count()}}</td>
                        <td>{{$bookRack->books->sum('num_of_copies')}}</td>
                        <td>{{$bookRack->rangeOfQr()}}</td>
                        <td>
                            <a href="{{route('librarian.qrcodes.books.preview', $bookRack)}}" target="_blank"><i class="bi-qr-code text-blue-600"></i></a>
                        </td>
                    </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
@section('script')
<script type="text/javascript">
    function search(event) {
        // var searchtext = event.target.value.toLowerCase();
        var searchtext = $('#searchby').val().toLowerCase();
        var str = 0;
        $('.tr').each(function() {
            if (!(
                    $(this).children().eq(1).prop('outerText').toLowerCase().includes(searchtext)
                )) {
                $(this).addClass('hidden');
            } else {
                $(this).removeClass('hidden');
            }
        });
    }

    function confirmDel(event) {
        event.preventDefault(); // prevent form submit
        var form = event.target; // storing the form

        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.value) {
                form.submit();
            }
        })
    }

    function toggleFilterSection() {
        $('#filterSection').slideToggle().delay(500);
    }
</script>
@endsection