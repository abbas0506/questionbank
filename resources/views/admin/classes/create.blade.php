@extends('layouts.admin')
@section('page-content')
<div class="container">
    <h2>Groups</h2>
    <div class="bread-crumb">
        <a href="/">Home</a>
        <div>/</div>
        <a href="{{route('admin.groups.index')}}">Groups</a>
        <div>/</div>
        <div>New</div>
    </div>

    <!-- page message -->
    @if($errors->any())
    <x-message :errors='$errors'></x-message>
    @else
    <x-message></x-message>
    @endif

    <div class="w-full md:w-3/4 mx-auto mt-8">
        <h1 class="text-teal-600 mt-8">New Clas</h1>
        <form action="{{route('admin.groups.store')}}" method='post' class="mt-4" onsubmit="return validate(event)">
            @csrf
            <div class="grid grid-cols-1 gap-2">
                <div>
                    <label>Full Name</label>
                    <input type="text" name='name' class="custom-input" placeholder="Part I" value="">
                </div>

                <div>
                    <label>Short Name <span class="text-sm">(if any)</span></label>
                    <input type="text" name='short' class="custom-input" placeholder="For example: SE" value="">
                </div>

            </div>
            <div class="flex mt-4">
                <button type="submit" class="btn-teal rounded p-2">Create Now</button>
            </div>
        </form>

    </div>
</div>
@endsection