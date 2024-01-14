@extends('layouts.dep')
@section('page-content')

<div class="custom-container">
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
        <input type="text" id='searchby' placeholder="Search ..." class="custom-search w-full" oninput="search(event)">
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
        <table class="table-fixed w-full mt-2">
            <thead>
                <tr>
                    <th class="w-16">Roll #</th>
                    <th class="w-48">Name</th>
                    <th class="w-12">Marks</th>
                    <th class="w-24">Group</th>
                    <th class="w-12">Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach($session->applications()->get()->sortByDesc('updated_at') as $application)
                <tr class="tr text-sm">
                    <td>
                        <a href="{{route('dep.applications.show',$application)}}" class="link">
                            {{$application->matric_rollno}}
                        </a>
                    </td>
                    <td class="w-60 text-left">{{$application->name}}</td>
                    <td>{{ $application->matric_marks }}</td>
                    <td>{{ $application->group->short }}</td>
                    <td class="w-32">
                        @if($application->status()==0)
                        <div></div>
                        @elseif($application->status()==1)
                        <div class="text-red-600">?</div>
                        @else
                        <div class="text-green-700"><i class="bi-check-lg"></i></div>
                        @endif
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
                    $(this).children().eq(0).prop('outerText').toLowerCase().includes(searchtext) ||
                    $(this).children().eq(1).prop('outerText').toLowerCase().includes(searchtext) ||
                    $(this).children().eq(3).prop('outerText').toLowerCase().includes(searchtext)
                )) {
                $(this).addClass('hidden');
            } else {
                $(this).removeClass('hidden');
            }
        });
    }
</script>

@endsection