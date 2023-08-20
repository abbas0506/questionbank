@extends('layouts.dep')
@section('page-content')

<div class="container">
    <h1>Raise Objection</h1>
    <div class="bread-crumb">
        <a href="/">Home</a>
        <div>/</div>
        <div>Raise Objection</div>
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
        <label for="">{{ $session->applications()->underprocess()->count() }} records found</label>
        <table class="table-auto w-full mt-2">
            <thead>
                <tr>
                    <th>Roll #</th>
                    <th>Name</th>
                    <th>Marks</th>
                    <th>Group</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($session->applications()->underprocess()->get() as $application)
                <tr class="tr text-sm">
                    <td class="text-center">{{$application->matric_rollno}}</td>
                    <td>{{$application->name}}</td>
                    <td class="text-center">{{$application->matric_marks}}</td>
                    <td>{{$application->group->short}}</td>
                    <td class="text-center">
                        @role('dep')
                        <a href="{{route('dep.objections.edit', $application)}}" class="link">
                            <i class="bi-bookmark-x"></i> Raise Objection
                        </a>
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