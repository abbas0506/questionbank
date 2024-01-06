@extends('layouts.dep')
@section('page-content')
<div class="custom-container">
    <h2>Change Group</h2>
    <div class="bread-crumb">
        <a href="{{route('dep.applications.index')}}">Applications</a>
        <div>/</div>
        <div>{{ $application->matric_rollno }}</div>
        <div>/</div>
        <div>Change Group</div>
    </div>

    <div class="w-full md:w-3/4 mx-auto mt-16">
        <!-- page message -->
        @if($errors->any())
        <x-message :errors='$errors'></x-message>
        @else
        <x-message></x-message>
        @endif

        <form action="{{url('dep/change/group', $application)}}" method='post' class="mt-4" onsubmit="return validate(event)">
            @csrf
            @method('PATCH')
            <div>
                <div class="md:w-1/2">
                    <h3>{{ $application->matric_rollno }}</h3>
                    <div>{{ $application->name }}</div>
                    <div>{{ $application->group->name }}</div>

                </div>
                <div class="mt-8">
                    <label>Change to Group</label>
                    <select name="group_id" id="" class="custom-input p-2">
                        @forelse($groups as $group)
                        <option value="{{$group->id}}" @selected($application->group_id==$group->id)>{{ $group->short }}</option>
                        @empty
                        <option value="">No group available</option>
                        @endforelse
                    </select>
                </div>

            </div>
            <div class="flex mt-4">
                <button type="submit" class="btn-teal rounded p-2">Update Now</button>
            </div>
        </form>

    </div>
</div>
@endsection
@section('script')
<script type='module'>
    $('#phone').on('input', function() {
        var phone = $('#phone').val()
        $('#phone_length').html(phone.length + "/11");
    });
</script>
@endsection