@extends('layouts.dep')
@section('page-content')

<div class="container">
    <h1>Fee Edit</h1>
    <div class="bread-crumb">
        <a href="/">Home</a>
        <div>/</div>
        <a href="{{route('dep.fee.index')}}">Fee</a>
        <div>/</div>
        <div>{{ $application->matric_rollno }}</div>
        <div>/</div>
        <div>Edit</div>
    </div>

    <div class="md:w-2/3 mx-auto mt-8">
        <!-- page message -->
        @if($errors->any())
        <x-message :errors='$errors'></x-message>
        @else
        <x-message></x-message>
        @endif

        <div class="flex flex-col w-full">
            <form action="{{route('dep.fee.update', $application)}}" method='post' class="mt-4">
                @csrf
                @method('PATCH')
                <div class="grid grid-cols-2 gap-y-4">
                    <div>
                        <h3>Roll #</h3>
                        <label>{{$application->matric_rollno}}</label>
                    </div>
                    <div>
                        <h3>Name</h3>
                        <label>{{$application->name}}</label>
                    </div>

                    <div>
                        <h3>Marks</h3>
                        <label>{{$application->matric_marks}}</label>
                    </div>
                    <div>
                        <h3>Group</h3>
                        <label>{{$application->group->short}}</label>
                    </div>

                    <div class="md:col-span-2 mt-6">
                        <h3>Fee</h3>
                        <input type="number" name='fee' class="custom-input" placeholder="3000" value="{{ $application->fee ? $application->fee : $application->group->fee }}">
                    </div>

                    <button type="submmit" class="btn-teal rounded p-2 mt-4 w-32">Pay Now</button>
                </div>
            </form>
        </div>
    </div>
    @endsection