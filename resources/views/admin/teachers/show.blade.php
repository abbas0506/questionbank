@extends('layouts.admin')
@section('page-content')
<div class="container">
    <div class="flex flex-col md:flex-row items-center">
        <div class="flex-1">
            <h2>Teacher Profile</h2>
            <p>{{ $teacher->designation }}</p>
        </div>
        <div class="flex-1 space-x-4 text-center text-sm">
            <a href="{{route('admin.teachers.edit', $teacher)}}" class="text-green-600">Edit <i class="bx bx-pencil"></i></a>
            <a href="{{route('admin.teachers.index')}}" class="text-blue-600">Cancel</a>

        </div>
    </div>
    <div class="mt-8">
        <label for="">Teacher</label>
        <h2 class="p-4 border border-dashed border-slate-200">{{ $teacher->name }} s/o {{ $teacher->father }}</h2>

    </div>

    <div class="grid grid-cols-1 md:grid-cols-3 mt-8">

        <div class="col-span-2 border p-4">
            <div class="grid grid-cols-2 gap-x-4 gap-y-1">
                <!-- <div></div> -->
                <label for="">Personal #</label>
                <div>{{$teacher->personal_no}}</div>
                <label for="">Designation</label>
                <div>{{$teacher->designation}}</div>
                <label for="">CNIC</label>
                <div>{{$teacher->cnic}}</div>
                <label for="">Phone</label>
                <div>{{$teacher->phone}}</div>
                <label for="">Email</label>
                <div>{{$teacher->email}}</div>



            </div>
        </div>
        <div class="flex justify-center items-center border bg-slate-100 p-4">
            {!! DNS2D::getBarcodeHTML($teacher->cnic, 'QRCODE',4,4) !!}
        </div>
    </div>
</div>
@endsection