@extends('layouts.assistant')
@section('page-content')
<div class="container">
    <h2>Issue Book</h2>
    <div class="bread-crumb">
        <a href="{{url('assistant')}}">Home</a>
        <div>/</div>
        <div>Issue Book</div>
    </div>

    <div class="w-full md:w-3/4 mx-auto mt-16">
        <!-- page message -->
        @if($errors->any())
        <x-message :errors='$errors'></x-message>
        @else
        <x-message></x-message>
        @endif

        <form action="{{route('library.assistant.book-issuance.confirm')}}" method='post' class="mt-4" onsubmit="return validate(event)">
            @csrf


            <div class="p-5 border relative">
                <input type="hidden" name='book_id' value="{{$book->id}}">
                <input type="hidden" name='copy_no' value="{{$copy_no}}">
                <div class="absolute -top-1 -left-8"><i class="bi bi-book"></i></div>

                <h1>{{$book->title}}</h1>
                <p class="text-slate-600 text-sm">{{$book->reference()}}-{{$copy_no}}</p>
                <p>{{$book->author}}, {{$book->publish_year}}</p>

            </div>

            <div class="p-5 border mt-6 relative">
                <div class="absolute -top-1 -left-8"><i class="bi bi-person"></i></div>
                <input type="hidden" name='reader_id' value="{{$reader->id}}">
                <div class="flex flex-wrap justify-between items-center">

                    <h3 class="w-24 text-red-800 text-center">Fine: Rs. 20</h3>
                    <label for="">{{$reader->name}}</label>
                </div>

                <label for="" class="">Already in possession: {{$reader->readings()->inPossession()->count()}} book(s) </label>
                @if($reader->readings()->inPossession()->exists())
                <div>
                    @php $sr=1; @endphp
                    <table class="table-auto w-full mt-2 xs">
                        <thead>
                            <tr class="border-b border-slate-200">
                                <th>Sr</th>
                                <th>Title</th>
                                <th>Author</th>
                                <th>Copy #</th>
                                <th>Due Date</th>
                                <th>Latency</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($reader->readings()->inPossession()->get()->sortByDesc('created_at') as $book_issuance)
                            <tr class="tr">
                                <td class="">{{$sr++}}</td>
                                <td class="text-left">{{$book_issuance->book->title}}</td>
                                <td>{{$book_issuance->book->author}}</td>
                                <td>{{$book_issuance->copy_no}}</td>
                                <td>{{$book_issuance->due_date}}</td>
                                <td>{{$book_issuance->latency()}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                @endif
            </div>

            <div class="flex mt-4 float-right">
                <button type="submit" class="btn-teal rounded px-4">Issue Book</button>
            </div>

        </form>

    </div>
</div>
@endsection