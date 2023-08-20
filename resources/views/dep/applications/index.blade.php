@extends('layouts.dep')
@section('page-content')

<div class="container">
    <h1>Applications</h1>
    <div class="bread-crumb">
        <a href="/">Home</a>
        <div>/</div>
        <div>Applications</div>
        <div>/</div>
        <div>All</div>
    </div>

    <!-- search -->
    <div class="flex relative w-full md:w-1/3 mt-12">
        <input type="text" id='searchby' placeholder="Search ..." class="search-indigo w-full" oninput="search(event)">
        <i class="bx bx-search absolute top-2 right-2"></i>
    </div>

    <!-- page message -->
    @if($errors->any())
    <x-message :errors='$errors'></x-message>
    @else
    <x-message></x-message>
    @endif

    <div class="overflow-x-auto w-full mt-8">
        <label for="">{{ $session->applications()->count() }} records found</label>
        <table class="table-auto w-full mt-2">
            <thead>
                <tr>
                    <th>Roll #</th>
                    <th>Name</th>
                    <th>Marks</th>
                    <th>Group</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($session->applications()->get() as $application)
                <tr class="tr text-sm">
                    <td class="text-center">{{$application->matric_rollno}}</td>
                    <td class="w-60">{{$application->name}}</td>
                    <td class="text-center">{{ $application->matric_marks }}</td>
                    <td>{{ $application->group->short }}</td>
                    <td class="text-center w-32">
                        @if($application->status()==0)
                        <div>Under Process</div>
                        @elseif($application->status()==1)
                        <div class="text-red-600">Objection</div>
                        @else
                        <div class="text-green-700">Fee Paid</div>
                        @endif
                    </td>
                    <td class="text-center">
                        @role('dep')
                        <div class="flex justify-center items-center space-x-3">
                            <a href="{{route('dep.applications.edit', $application)}}">
                                <i class="bi bi-pencil-square text-green-600"></i>
                            </a>
                            <form action="{{route('dep.applications.destroy',$application)}}" method="POST" id='del_form{{$application->id}}'>
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-transparent p-0 border-0" onclick="delme('{{$application->id}}')">
                                    <i class="bi bi-trash3 text-red-600"></i>
                                </button>
                            </form>
                        </div>

                        @endrole
                    </td>

                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</div>

@endsection
@section('script')
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