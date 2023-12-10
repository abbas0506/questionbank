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

        @if($book_issuance)
        <form action="{{route('library.assistant.book-return.confirm.post',$book_issuance)}}" method='post' class="mt-4" onsubmit="return validate(event)">
            @csrf
            @method('PATCH')

            <div class="p-5 border relative">

                <!-- iff book exists -->
                <input type="hidden" name='book_issuance_id' value="{{$book_issuance->id}}">
                <h1>{{$book_issuance->book->title}}</h1>
                <p class="text-slate-600 font-thin">{{$book_issuance->book->reference()}}-{{$book_issuance->copy_no}}</p>
                <p>{{$book_issuance->book->author}}, {{$book_issuance->book->publish_year}}</p>
                <p class="text-slate-600 font-thin">Issued On {{$book_issuance->created_at}}</p>
                <div class="absolute -top-1 -left-8"><i class="bi bi-book"></i></div>
            </div>

            <div class="p-5 border mt-6 relative">
                <div class="absolute -top-1 -left-8"><i class="bi bi-person"></i></div>
                <div class="flex flex-wrap justify-between items-center">
                    <div>
                        <h2>{{$book_issuance->reader->name}}</h2>
                        <p>{{ $book_issuance->reader->clas->roman()}} ({{$book_issuance->reader->rollno}})</p>
                    </div>
                    <h3 class="w-24 text-red-800 text-center">
                        @if($book_issuance->fine()>0)
                        Fine: {{$book_issuance->fine()}}
                        @endif
                    </h3>

                </div>
            </div>

            <div class="flex mt-4 float-right">
                <button type="submit" class="btn-teal rounded px-4">Return Book</button>
            </div>

        </form>
        @else
        <div class="flex h-16 px-5 md:px-0 md:h-40 items-center justify-center border rounded-sm">
            <h2 class="text-red-800">The book reference found incorrect! <a href="{{route('library.assistant.book-return.scan')}}" class="link ml-8">Go back</a></h2>
        </div>
        @endif

    </div>
</div>
@endsection