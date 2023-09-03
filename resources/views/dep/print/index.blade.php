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
            <a href="{{url('dep/pdf/underprocess')}}" target='_blank' class="pallet-box">
                <div class="flex-1">
                    <div class="title">Under Process</div>
                    <div class="h2">{{ $session->applications()->underprocess()->count() }}</div>
                </div>
                <div class="ico bg-blue-100">
                    <i class="bi bi-activity text-blue-600"></i>
                </div>
            </a>
            <a href="{{url('dep/pdf/objectioned')}}" target='_blank' class="pallet-box">
                <div class="flex-1">
                    <div class="title">Objection Over</div>
                    <div class="h2">{{ $session->applications()->objectioned()->count() }}</div>
                </div>
                <div class="ico bg-orange-100">
                    <i class="bi bi-file-earmark-x text-orange-400"></i>
                </div>
            </a>
            <a href="{{url('dep/pdf/feepaid')}}" target='_blank' class="pallet-box">
                <div class="flex-1">
                    <div class="title">Fee Paid</div>
                    <div class="h2">{{ $session->applications()->feepaid()->count() }}</div>
                </div>
                <div class="ico bg-pink-100">
                    <i class="bi bi-currency-rupee text-pink-600"></i>
                </div>
            </a>
            <a href="{{url('dep/pdf/recommended')}}" target='_blank' class="pallet-box">
                <div class="flex-1">
                    <div class="title">Recommendation List</div>
                    <div class="h2">{{ $session->applications()->underprocess()->count() }}</div>
                </div>
                <div class="ico bg-green-100">
                    <i class="bi bi-check-lg text-green-600"></i>
                </div>
            </a>
            <a href="{{url('dep/pdf/finalized')}}" target='_blank' class="pallet-box">
                <div class="flex-1">
                    <div class="title">Finalized List</div>
                    <div class="h2">{{ $session->applications()->feepaid()->count() }}</div>
                </div>
                <div class="ico bg-teal-100">
                    <i class="bi bi-check-all text-teal-600"></i>
                </div>
            </a>

        </div>
    </div>
</div>
@endsection