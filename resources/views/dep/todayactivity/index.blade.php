@extends('layouts.dep')
@section('page-content')

<div class="custom-container">
    <h1>Today's Activity</h1>
    <div class="bread-crumb">
        <a href="/">Home</a>
        <div>/</div>
        <div>Today</div>
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
        <label for="">{{ $session->applications()->today()->count() }} records found</label>
        <table class="table-auto w-full mt-2">
            <thead>
                <tr>
                    <th>Roll #</th>
                    <th>Name</th>
                    <th>Phone</th>
                    <th>Marks</th>
                    <th>Group</th>
                    <th>Fee</th>
                    <th>Objection</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach($session->applications()->today()->get() as $application)
                <tr class="tr text-sm">
                    <td>
                        <a href="{{route('dep.applications.show',$application)}}" class="link">
                            {{$application->matric_rollno}}
                        </a>
                    </td>
                    <td class="text-left">{{$application->name}}</td>
                    <td>{{$application->phone}}</td>
                    <td>{{$application->matric_marks}} </td>
                    <td>{{$application->group->short}}</td>
                    <td>{{$application->fee ?? ''}}</td>
                    <td>{{$application->objection}}</td>
                    <td>@if($application->created_at->format('d-m-Y')==$application->updated_at->format('d-m-Y')) new @endif</td>
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