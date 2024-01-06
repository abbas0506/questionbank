@extends('layouts.dep')
@section('page-content')

<div class="custom-container">
    <h1>Objection</h1>
    <div class="bread-crumb">
        <a href="/">Home</a>
        <div>/</div>
        <a href="{{route('dep.applications.index')}}">Applications</a>
        <div>/</div>
        <div>{{ $application->matric_rollno }}</div>
        <div>/</div>
        <div>Objection</div>
    </div>

    <div class="mt-8">
        <!-- page message -->
        @if($errors->any())
        <x-message :errors='$errors'></x-message>
        @else
        <x-message></x-message>
        @endif
        <div class="flex flex-col w-full">
            <form action="{{route('dep.objections.update', $application)}}" method='post' class="mt-4">
                @csrf
                @method('PATCH')
                <div class="grid grid-cols-2 gap-y-2">
                    <div>
                        <h3>Name</h3>
                        <label>{{$application->name}}</label>
                    </div>
                    <div>
                        <h3>Roll #</h3>
                        <label>{{$application->matric_rollno}}</label>
                    </div>
                    <div>
                        <h3>Marks</h3>
                        <label>{{$application->matric_marks}}</label>
                    </div>
                    <div>
                        <h3>Group</h3>
                        <label>{{$application->group->short}}</label>
                    </div>

                    <div class="md:col-span-2 mt-8">
                        <h3>Objection <span class="text-sm">(if any)</span></h3>
                        <textarea type="text" name='objection' class="custom-input" placeholder="NOC missing / below criteria / under consideration">{{ $application->objection ?? ''}}</textarea>
                    </div>

                    <button type="submmit" class="btn-teal rounded p-2 mt-4 w-32">Update Now</button>
                </div>
            </form>



        </div>
    </div>
    @endsection