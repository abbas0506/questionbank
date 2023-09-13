@extends('layouts.admin')
@section('page-content')

<div class="container">
    <h1>Section</h1>
    <div class="bread-crumb">
        <a href="/">Home</a>
        <div>/</div>
        <div>{{$section->name}}</div>
    </div>

    <!-- search -->
    <div class="flex items-center justify-between mt-12">
        <div class="flex relative w-full md:w-1/3">
            <input type="text" id='searchby' placeholder="Search ..." class="search-indigo w-full" oninput="search(event)">
            <i class="bx bx-search absolute top-2 right-2"></i>
        </div>
        <div class="flex space-x-4">
            <a href="{{url('admin/students/import',$section)}}" class="btn-indigo pull-right">Import Students</a>
            <a href="{{url('admin/sections/print',$section)}}" class="btn-indigo pull-right">Print</a>

        </div>
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
                    <th>#</th>
                    <th>Roll No</th>
                    <th>Student</th>
                    <th>Marks</th>
                    <th>Group</th>
                    <th>Phone</th>
                </tr>
            </thead>
            <tbody>
                @php $sr=1; @endphp
                @foreach($section->students as $student)
                <tr class="text-sm">
                    <td>{{ $sr++ }}</td>
                    <td>{{ $student->rollno }}</td>
                    <td>{{ $student->name }}</td>
                    <td>{{ $student->score }}</td>
                    <td>{{ $student->group->name }}</td>
                    <td>{{ $student->phone }}</td>
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
                    $(this).children().eq(0).prop('outerText').toLowerCase().includes(searchtext)
                )) {
                $(this).addClass('hidden');
            } else {
                $(this).removeClass('hidden');
            }
        });
    }
</script>

@endsection