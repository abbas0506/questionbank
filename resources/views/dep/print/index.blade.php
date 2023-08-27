@extends('layouts.dep')
@section('page-content')
<div class="container bg-slate-100">
    <h2>Print / Download</h2>
    <div class="bread-crumb">
        <a href="/">Home</a>
        <div>/</div>
        <div>Print or download</div>
    </div>

    <div class="flex justify-center items-center w-full h-[60vh]">
        <div class="grid grid-cols-1 md:grid-cols-2 md:w-2/3 gap-4">
            <div class="md:col-span-2 p-4 text-center">
                <i class="bi-printer text-2xl"></i>
            </div>
            <a href="{{url('dep/pdf/recommended')}}" target='_blank' class="pallet-box">
                <div class="flex-1">
                    <div class="title">Recommended List</div>
                    <div class="h2">{{ $session->applications()->underprocess()->count() }}</div>
                </div>
                <div class="ico bg-green-100">
                    <i class="bi bi-check-lg text-green-600"></i>
                </div>
            </a>
            <a href="{{url('dep/pdf/objectioned')}}" target='_blank' class="pallet-box">
                <div class="flex-1">
                    <div class="title">Objections List</div>
                    <div class="h2">{{ $session->applications()->objectioned()->count() }}</div>
                </div>
                <div class="ico bg-orange-100">
                    <i class="bi bi-file-earmark-x text-orange-400"></i>
                </div>
            </a>
        </div>
    </div>
</div>
@endsection