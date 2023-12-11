@extends('layouts.admin')
@section('page-content')

<div class="container">
    <h1>Teachers</h1>
    <div class="bread-crumb">
        <a href="{{url('admin')}}">Home</a>
        <div>/</div>
        <div>Teachers</div>
        <div>/</div>
        <div>All</div>
    </div>

    <!-- search -->
    <div class="flex items-center justify-between mt-12">
        <div class="flex relative w-full md:w-1/3">
            <input type="text" id='searchby' placeholder="Search ..." class="search-indigo w-full" oninput="search(event)">
            <i class="bx bx-search absolute top-2 right-2"></i>
        </div>
        <a href="{{route('admin.teachers.import')}}" class="text-sm p-2 border hover:bg-teal-50">Import from Excel <i class="bi bi-file-earmark-excel text-teal-600"></i></a>
    </div>

    <!-- page message -->
    @if($errors->any())
    <x-message :errors='$errors'></x-message>
    @else
    <x-message></x-message>
    @endif

    <div class="overflow-x-auto w-full mt-8">

        <table class="table-auto w-full">
            <thead>
                <tr>
                    <th>Personal No</th>
                    <th>Name</th>
                    <th>Designation</th>
                    <th>CNIC</th>
                    <th>Phone</th>
                    <th>Email</th>
                    <th>Qualification</th>
                    <th>Birth Date</th>
                </tr>
            </thead>
            <tbody>
                @foreach($teachers as $teacher)
                <tr class="tr text-sm">
                    <td>
                        <a href="{{route('admin.teachers.show', $teacher)}}" class="link">
                            {{$teacher->personal_no}}
                        </a>
                    </td>
                    <td class="text-left pl-3">{{$teacher->name}}</td>
                    <td>{{$teacher->designation}}</td>
                    <td>{{$teacher->cnic}}</td>
                    <td>{{$teacher->phone}}</td>
                    <td class="text-left pl-3">{{$teacher->adress}}</td>
                    <td class="text-left pl-3">{{$teacher->qualification}}</td>
                    <td class="text-left pl-3">
                        @if($teacher->dob)
                        {{$teacher->dob->format('d/m/Y') }}
                        @endif
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</div>

<script type="text/javascript">
    function delme(formid) {

        event.preventDefault();

        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.value) {
                //submit corresponding form
                $('#del_form' + formid).submit();
            }
        });
    }

    function search(event) {
        var searchtext = event.target.value.toLowerCase();
        var str = 0;
        $('.tr').each(function() {
            if (!(
                    $(this).children().eq(0).prop('outerText').toLowerCase().includes(searchtext) ||
                    $(this).children().eq(1).prop('outerText').toLowerCase().includes(searchtext)
                )) {
                $(this).addClass('hidden');
            } else {
                $(this).removeClass('hidden');
            }
        });
    }
</script>

@endsection