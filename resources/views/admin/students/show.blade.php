@extends('layouts.admin')
@section('page-content')
<div class="container">
    <div class="flex flex-col md:flex-row items-center">
        <div class="flex-1">
            <h2>{{ $student->name }}</h2>
            <p>{{ $student->clas->roman() }} ({{ $student->rollno }})</p>
        </div>
        <div class="flex-1 space-x-4 text-center text-sm">
            <a href="{{route('admin.students.edit', $student)}}" class="text-green-600">Edit <i class="bx bx-pencil"></i></a>
            <a href="{{route('admin.classes.show',$student->clas)}}" class="text-blue-600">Cancel</a>

        </div>
    </div>
    <div class="mt-8">
        <label for="">Student</label>
        <h2 class="p-4 border border-dashed border-slate-200">{{ $student->name }} s/o {{ $student->father }}</h2>

    </div>

    <div class="grid grid-cols-1 md:grid-cols-3 mt-8">

        <div class="col-span-2 border p-4">
            <div class="grid grid-cols-2 gap-x-4 gap-y-1">
                <!-- <div></div> -->
                <label for="">Class</label>
                <div>{{$student->clas->roman()}}</div>
                <label>Roll No</label>
                <div>{{$student->rollno}}</div>
                <label>B Form</label>
                <div>{{$student->cnic}}</div>
                <label>Phone</label>
                <div>{{$student->phone}}</div>
                <label>Address</label>
                <div>{{$student->address}}</div>

            </div>
        </div>
        <div class="flex justify-center items-center border bg-slate-100 p-4">
            {!! DNS2D::getBarcodeHTML($student->cnic, 'QRCODE',4,4) !!}
        </div>
    </div>
</div>
@endsection