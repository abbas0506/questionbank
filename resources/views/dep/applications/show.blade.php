@extends('layouts.dep')
@section('page-content')

<div class="container bg-slate-100">
    <h1>View Application</h1>
    <div class="bread-crumb">
        <a href="{{route('dep.applications.index')}}">Applications</a>
        <div>/</div>
        <div>{{ $application->matric_rollno }}</div>
        <div>/</div>
        <div>View</div>
    </div>

    <!-- page message -->
    @if($errors->any())
    <x-message :errors='$errors'></x-message>
    @else
    <x-message></x-message>
    @endif

    <div class="text-right">
        <form action="{{route('dep.applications.destroy',$application)}}" method="POST" id='deleteApplicationForm'>
            @csrf
            @method('DELETE')
            <button type="submit" class="btn-red" onclick="submitDeleteApplicationForm()">
                <i class="bi-trash text-slate-100 text-xs"></i> Remove Application
            </button>
        </form>
    </div>
    <div class="border border-dotted border-slate-200 bg-white rounded p-4 mt-2 relative">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-y-4">
            <a href="{{ route('dep.applications.edit',$application) }}" class="absolute top-2 right-2">
                <i class="bx bx-pencil"></i>
            </a>
            <div>
                <div>
                    <label>Matric Roll #</label>
                    <div>{{ $application->matric_rollno }}</div>
                </div>
                <div class="mt-4">
                    <label class="">Name</label>
                    <div>{{ $application->name }}</div>
                </div>
            </div>
            <div>
                <div>
                    <label>Marks</label>
                    <div>{{ $application->matric_marks }}</div>
                </div>
                <div class="mt-4">
                    <label class="">Phone</label>
                    <div>{{ $application->phone }}</div>
                </div>
            </div>
        </div>
    </div>

    <div class="border border-dotted border-slate-200 bg-white rounded p-4 mt-4 relative">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-y-4">
            <a href="{{ url('dep/change/group',$application) }}" class="absolute top-2 right-2">
                <i class="bx bx-pencil"></i>
            </a>

            <div>
                <label>Group</label>
                <div>{{ $application->group->name }}</div>
            </div>

        </div>
    </div>

    <div class="border border-dotted border-slate-200 bg-white rounded p-4 mt-4 relative">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-y-4">
            <div class="flex flex-row space-x-4 absolute top-2 right-2">
                @if($application->objection==null)
                <a href="{{ route('dep.objections.edit',$application) }}">
                    <i class="bx bx-plus"></i>
                </a>
                @else
                <form action="{{route('dep.objections.destroy',$application)}}" method="POST" id='deleteObjectionForm'>
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="text-blue-600 text-sm" onclick="submitDeleteObjectionForm()">Remove Objection</button>
                </form>
                <a href="{{ route('dep.objections.edit',$application) }}">
                    <i class="bx bx-pencil"></i>
                </a>
                @endif
            </div>
            <div>
                <label class="text-red-600">Objection</label>
                <div>{{ $application->objection }}</div>
            </div>
        </div>
    </div>
    @if($application->objection==null || $application->fee!=null)
    <div class="border border-dotted border-slate-200 bg-white rounded p-4 mt-4 relative">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-y-4">
            <div class="flex flex-row space-x-4 absolute top-2 right-2">
                @if($application->fee==null)
                <a href="{{ route('dep.fee.edit',$application) }}">
                    <i class="bx bx-plus"></i>
                </a>
                @else
                <a href="" class="link text-xs">Return Fee </a>
                <a href="{{ route('dep.fee.edit',$application) }}">
                    <i class="bx bx-pencil"></i>
                </a>
                @endif
            </div>
            <div>
                <label>Fee</label>
                <div>{{ $application->fee ?? 0 }}</div>
            </div>

        </div>
    </div>
    @endif

</div>

@endsection
@section('script')
<script type="text/javascript">
    function submitDeleteApplicationForm() {
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
                $('#deleteApplicationForm').submit();
            }
        });
    }

    function submitDeleteObjectionForm() {
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
                $('#deleteObjectionForm').submit();
            }
        });

    }
</script>

@endsection