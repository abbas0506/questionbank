@extends('layouts.basic')

@section('body')
<div class="flex flex-col items-center justify-center h-screen bg-gradient-to-b from-blue-100 to-blue-400">

    <div class="flex flex-col items-center w-full px-5 md:w-1/3">

        <div class="w-full mt-4">

            <!-- page message -->
            @if($errors->any())
            <x-message :errors='$errors'></x-message>
            @else
            <x-message></x-message>
            @endif

            <!-- authenticated -->
            <div class="text-center">
                <i class="bi bi-person-fill-check text-8xl text-sky-600"></i>
            </div>
            <h1 class="text-center text-slate-800 mt-8">Welcome {{Auth::user()->name}}</h1>

            <form action="{{route('login.as')}}" method='post' class="w-full mt-8" onsubmit="return validate(event)">
                @csrf

                @if(Auth::user()->roles->count()>1)
                <div>Please select a role for this session</div>
                @else
                <label for="">You will proceed as</label>
                @endif

                <select id="role" name="role" class="custom-input  px-4 py-3 w-full mt-3 bg-transparent" onchange="loadDepartments()">
                    @if(Auth::user()->hasAnyRole('hod','teacher','super'))
                    <option value="">- select -</option>
                    @endif
                    @foreach(Auth::user()->roles as $role)
                    <option value="{{$role->name}}" class="">{{Str::upper($role->name)}}</option>
                    @endforeach
                </select>
                <div class="mt-3">
                    <label for="" class="text-base text-gray-700 text-left w-full">Session</label>
                    <select name="session_id" class="custom-input px-4 py-3 w-full">
                        @foreach($sessions as $session)
                        <option value="{{$session->id}}">{{$session->starts_at}} - {{ $session->starts_at + 2 - 2000 }}</option>
                        @endforeach
                    </select>
                </div>
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