@extends('layouts.basic')

@section('body')
<div class="flex flex-col items-center justify-center h-screen bg-gray-800/50 px-5 md:px-0">
    <div class="flex flex-col items-center w-full p-5 md:w-1/3 bg-white relative">
        <div class="w-full mt-4">
            <!-- page message -->
            @if($errors->any())
            <x-message :errors='$errors'></x-message>
            @else
            <x-message></x-message>
            @endif

            <!-- authenticated -->
            <div class="text-center">
                <i class="bi bi-person-fill-check text-6xl text-sky-600"></i>
            </div>
            <h1 class="text-center text-slate-800 mt-4">Welcome {{Auth::user()->userable->name}}</h1>

            <form action="{{route('login.as')}}" method='post' class="w-full mt-8" onsubmit="return validate(event)">
                @csrf
                <select id="role" name="role" class="custom-input  px-4 w-full bg-transparent" onchange="loadDepartments()">
                    @foreach(Auth::user()->roles as $role)
                    <option value="{{$role->name}}" class="">{{ucfirst($role->name)}}</option>
                    @endforeach
                </select>
                <div class="flex items-center space-x-4 mt-6">
                    <a href="{{url('signout')}}" class="flex flex-1 btn-orange justify-center py-2">Singout</a>
                    <button type="submit" class="flex flex-1 btn-indigo justify-center py-2">Proceed <i class="bx bx-right-arrow-alt bx-fade-right text-lg"></i></button>
                </div>

            </form>


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