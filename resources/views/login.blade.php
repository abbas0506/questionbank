@extends('layouts.basic')

@section('body')
<div class="flex flex-col items-center justify-center h-screen bg-gray-800/50 px-5 md:px-0">
    <div class="flex flex-col items-center w-full p-5 md:w-1/3 bg-white relative ">
        <a href="/" class="absolute top-1 right-2"><i class="bi-x text-black"></i></a>
        <!-- <img class="w-full" alt="logo" src="{{asset('/images/logo/logo.png')}}"> -->
        <h1 class="text-lg md:text-4xl text-indigo-900">eSchool</h1>
        <p class="text-xs text-center">Govt Higher Secondary School Chak Bedi</p>
        <p class="text-xs">Distt. Pakpattan</p>
        <div class="w-full mt-4">
            <!-- page message -->
            @if($errors->any())
            <x-message :errors='$errors'></x-message>
            @else
            <x-message></x-message>
            @endif

            <form action="{{url('login')}}" method="post" class="w-full mt-1">
                @csrf
                <div class="flex flex-col w-full items-start">
                    <div class="flex items-center w-full relative">
                        <i class="bi bi-person absolute left-2 text-slate-600"></i>
                        <input type="text" id="login_id" name="login_id" class="w-full custom-input px-8" placeholder="Login id">
                    </div>
                    <div class="flex items-center w-full mt-3 relative">
                        <i class="bi bi-key absolute left-2 text-slate-600 -rotate-[45deg]"></i>
                        <input type="password" id="password" name="password" class="w-full custom-input px-8" placeholder="Password">
                        <!-- eye -->
                        <i class="bi bi-eye-slash absolute right-2 eye-slash" onclick="showpw()"></i>
                        <i class="bi bi-eye absolute right-2 eye hidden" onclick="hidepw()"></i>
                    </div>

                    <button type="submit" class="w-full mt-6 btn-indigo p-2">Login</button>
                </div>
            </form>
        </div>
    </div>

</div>
@endsection
@section('script')
<script>
    function showpw() {
        $('#password').prop({
            type: "text"
        });
        $('.eye-slash').hide()
        $('.eye').show();
    }

    function hidepw() {
        $('#password').prop({
            type: "password"
        });
        $('.eye-slash').show()
        $('.eye').hide();
    }

    function validate(event) {
        var validated = true;
        var role = $('#role').val()
        var department = $('#department_id').val()
        var semester = $('#semester_id').val()

        if (role == '') {
            validated = false;
            event.preventDefault();
            Swal.fire({
                icon: 'warning',
                title: 'Please select a role',
                showConfirmButton: false,
                timer: 1500,
            })

        } else if (role == 'hod' || role == 'teacher') {
            //semester required for both
            if (semester == '') {
                validated = false;
                event.preventDefault();
                Swal.fire({
                    icon: 'warning',
                    title: 'Please select a semester',
                    showConfirmButton: false,
                    timer: 1500,
                })
            }
            //department required for only hod
            if (role == 'hod' && department == '') {
                validated = false;
                event.preventDefault();
                Swal.fire({
                    icon: 'warning',
                    title: 'Please select a department',
                    showConfirmButton: false,
                    timer: 1500,
                })
            }

            return validated;
            // return false;

        }
    }
</script>

@endsection