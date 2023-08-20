@extends('layouts.dep')
@section('page-content')

<div class="container">
    <h2>Change Password</h2>
    <div class="bread-crumb">
        <a href="/">Home</a>
        <div>/</div>
        <div>Change Password</div>
    </div>

    <div class="md:w-1/2 mx-auto mt-8">

        <div class="flex flex-row text-left sm:mt-0">
            <i class="bi-info-circle text-2xl text-indigo-600"></i>
            <ul class="text-sm ml-8">
                <li>Try to use strong and long password for better security</li>
                <li>You may use capital letters, small letters, digits, underscore and any other special character.</li>
            </ul>
        </div>

        <!-- page message -->
        @if($errors->any())
        <x-message :errors='$errors'></x-message>
        @else
        <x-message></x-message>
        @endif

        <form action="{{route('admin.change.password')}}" method="post" class="flex flex-col mt-8" onsubmit="return validate(event)">
            @csrf
            <label for="">Current Password</label>
            <input type="text" id="current" name="current" class="w-full custom-input" placeholder="Enter your login id" required>
            <label for="" class="mt-3">New Password</label>
            <input type="password" id="new" name="new" class="w-full custom-input" placeholder="Enter your login id" required>
            <label for="" class="mt-3">Confirm Password</label>
            <input type="password" id="confirmpw" class="w-full custom-input" placeholder="Enter your login id" required>

            <button type="submit" class="mt-6 btn-teal p-2 w-32">Update Now</button>

        </form>
    </div>

</div>
@endsection
@section('script')
<script lang="javascript">
    function validate(event) {
        var validated = true;
        if ($('#new').val() != $('#confirmpw').val()) {
            validated = false;
            event.preventDefault();
            Swal.fire({
                icon: 'warning',
                title: 'Confirm password not matched',
                showConfirmButton: false,
                timer: 1500,
            })

        }

        return validated;
        // return false;

    }
</script>
@endsection