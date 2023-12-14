@extends('layouts.admin')
@section('page-content')
<div class="container">
    <h2>Edit Teacher</h2>
    <div class="bread-crumb">
        <a href="{{url('assistant')}}">Home</a>
        <div>/</div>
        <a href="{{route('admin.teachers.index')}}">Teacher</a>
        <div>/</div>
        <div>Edit</div>
    </div>

    <div class="w-full md:w-3/4 mx-auto mt-12">
        <!-- page message -->
        @if($errors->any())
        <x-message :errors='$errors'></x-message>
        @else
        <x-message></x-message>
        @endif

        <form action="{{route('admin.teachers.update', $teacher)}}" method='post' class="mt-4" onsubmit="return validate(event)">
            @csrf
            @method('PATCH')
            <div class="grid grid-cols-2 gap-x-4 gap-y-1">
                <div class="md:col-span-2">
                    <label>Name *</label>
                    <input type="text" name='name' class="custom-input" placeholder="Type here" value="{{$teacher->name}}">
                </div>
                <div class="">
                    <label>Father *</label>
                    <input type="text" name='father' class="custom-input" placeholder="Type here" value="{{$teacher->father}}">
                </div>
                <div class="">
                    <label>Personal # *</label>
                    <input type="text" name='personal_no' class="custom-input" placeholder="Type here" value="{{$teacher->personal_no}}">
                </div>
                <div class="">
                    <label>Designation *</label>
                    <input type="text" name='designation' class="custom-input" placeholder="Type here" value="{{$teacher->designation}}">
                </div>
                <div class="">
                    <label>CNIC *</label>
                    <input type="text" name='cnic' class="custom-input" placeholder="Type here" value="{{$teacher->cnic}}">
                </div>
                <div class="">
                    <label>Phone *</label>
                    <input type="text" name='phone' class="custom-input" placeholder="Type here" value="{{$teacher->phone}}">
                </div>
                <div class="">
                    <label>Email *</label>
                    <input type="text" name='email' class="custom-input" placeholder="Type here" value="{{$teacher->email}}">
                </div>
                <div class="">
                    <label>Qualification</label>
                    <input type="text" name='qualification' class="custom-input" placeholder="Type here" value="{{$teacher->qualification}}">
                </div>
                <div class="">
                    <label>Address</label>
                    <input type="text" name='address' class="custom-input" placeholder="Type here" value="{{$teacher->address}}">
                </div>
                <div class="">
                    <label>Birth Date</label>
                    <input type="date" name='dob' class="custom-input" placeholder="Type here" value="@if($teacher->dob){{$teacher->dob->format('Y-m-d')}}@endif">
                </div>
                <div class="">
                    <label>Join Date</label>
                    <input type="date" name='join_date' class="custom-input" placeholder="Type here" value="@if($teacher->join_date){{$teacher->join_date->format('Y-m-d')}}@endif">
                </div>

                <div class="flex mt-4">
                    <button type="submit" class="btn-teal rounded p-2">Update Now</button>
                </div>
        </form>

    </div>
</div>
@endsection