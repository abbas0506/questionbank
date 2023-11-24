@extends('layouts.library.assistant')
@section('page-content')
<div class="container">
    <h2>Books Catalog</h2>
    <div class="bread-crumb">
        <a href="{{url('library/assistant')}}">Home</a>
        <div>/</div>
        <div>Books</div>
        <div>/</div>
        <div>All</div>
    </div>

    <div class="mt-8">
        <div class="flex items-center flex-wrap justify-between mt-8">
            <!-- search -->
            <div class="flex relative w-full md:w-1/3">
                <input type="text" id='searchby' placeholder="Search ..." class="search-indigo w-full" oninput="search(event)">
                <i class="bx bx-search absolute top-2 right-2"></i>
            </div>

            <!-- <a href="" class="btn-teal rounded">Create New</a> -->
        </div>
        <!-- page message -->
        @if($errors->any())
        <x-message :errors='$errors'></x-message>
        @else
        <x-message></x-message>
        @endif

        <h4 class="mt-8 mb-2">{{$book_racks->count()}} racks found</h4>
        <table class="table-auto w-full">
            <thead>
                <tr class="border-b border-slate-200">
                    <th>Rack</th>
                    <th>Books Count</th>
                    <th>Print</th>
                </tr>
            </thead>
            <tbody>

                @foreach($book_racks as $book_rack)
                <tr class="tr">
                    <td><a href="{{route('library.assistant.book_racks.show',$book_rack)}}" class="link">{{$book_rack->label}}</a></td>
                    <td>{{$book_rack->books->sum('num_of_copies')}}</td>
                    <td>
                        <a href="{{route('library.assistant.qrcodes.preview', $book_rack)}}" target="_blank">
                            <i class="bi bi-qr-code text-lg"></i>
                        </a>
                    </td>
                </tr>
                @endforeach

            </tbody>
        </table>
    </div>
</div>
@endsection
@section('script')
<script type="text/javascript">
    function search(event) {
        var searchtext = event.target.value.toLowerCase();
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
</script>

@endsection