@extends('layouts.library.assistant')
@section('page-content')
<div class="container">
    <h2>Book Rack: {{$book_rack->label}}</h2>
    <div class="bread-crumb">
        <a href="{{url('library/assistant')}}">Home</a>
        <div>/</div>
        <div>Book Racks</div>
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

        @php $sr=1; @endphp
        <table class="table-auto w-full mt-8">
            <thead>
                <tr class="border-b border-slate-200">
                    <th>Sr</th>
                    <th>Title/Author</th>
                    <th>Domain</th>
                    <th>Published</th>
                    <th>Copies</th>
                </tr>
            </thead>
            <tbody>

                @foreach($book_rack->books->sortByDesc('updated_at') as $book)
                <tr class="tr">

                    <!-- <td class="w-12 h-12">{!! DNS2D::getBarcodeHTML($book->reference_no, 'QRCODE',3,3) !!}</td> -->
                    <td>{{$sr++}}</td>
                    <td class="text-left">
                        <a href="{{route('library.assistant.books.show', $book)}}" class="link">{{$book->title}}</a>
                        <br>
                        <span class="text-xs text-slate-600">{{$book->author}}</span>
                    </td>
                    <td>{{$book->domain->name}}</td>
                    <td>{{$book->publish_year}}</td>
                    <td>{{$book->num_of_copies}}</td>
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