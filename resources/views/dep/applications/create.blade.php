@extends('layouts.dep')
@section('page-content')
<div class="custom-container">
    <h2>New Application</h2>
    <div class="bread-crumb">
        <a href="{{route('dep.applications.index')}}">Applications</a>
        <div>/</div>
        <div>New</div>
    </div>

    <div class="w-full md:w-3/4 mx-auto mt-16">
        <!-- page message -->
        @if($errors->any())
        <x-message :errors='$errors'></x-message>
        @else
        <x-message></x-message>
        @endif

        <form action="{{route('dep.applications.store')}}" method='post' class="mt-4" onsubmit="return validate(event)">
            @csrf
            <div class="grid grid-cols-1 md:grid-cols-2 gap-x-4 gap-y-2">

                <div>
                    <label>Matric Roll # *</label>
                    <input type="number" name='matric_rollno' class="custom-input" placeholder="Type here" value="">
                </div>
                <div>
                    <label>Marks *</label>
                    <input type="number" name='matric_marks' class="custom-input" placeholder="Type here" min=0 max=1100 value="">
                </div>
                <div>
                    <label>Student Name *</label>
                    <input type="text" name='name' class="custom-input" placeholder="Type here" value="">
                </div>
                <div>
                    <label>Phone<span id="phone_length" class="text-slate-500 text-xs ml-3">0/11</span></label>
                    <input type="text" id='phone' name='phone' class="custom-input" placeholder="Type here" value="">
                </div>
                <div>
                    <label>Applying for Group *</label>
                    <select name="group_id" id="" class="custom-input p-2">
                        @forelse($groups as $group)
                        <option value="{{$group->id}}">{{ $group->short }}</option>
                        @empty
                        <option value="">No group available</option>
                        @endforelse
                    </select>
                </div>
                <div class="flex items-center space-x-2">
                    <input type="checkbox" name="is_other_board" id="isOtherBoard" class="w-4 h-4" value="1">
                    <label for="isOtherBoard" class="font-bold text-red-600">Other Board Case?</label>
                </div>

            </div>
            <div class="flex mt-4">
                <button type="submit" class="btn-teal rounded p-2">Create Now</button>
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