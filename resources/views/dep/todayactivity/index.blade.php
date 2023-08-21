@extends('layouts.dep')
@section('page-content')

<div class="container">
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
        <label for="">{{ $session->applications()->today()->count() }} records found</label>
        <table class="table-auto w-full mt-2">
            <thead>
                <tr>
                    <th>Roll #</th>
                    <th>Name</th>
                    <th>Phone</th>
                    <th>Marks</th>
                    <th>Group</th>
                    <th>Objection</th>
                    <th>Fee</th>
                </tr>
            </thead>
            <tbody>
                @foreach($session->applications()->today()->get() as $application)
                <tr class="tr text-sm">
                    <td class="text-center">{{$application->matric_rollno}}</td>
                    <td class="w-60">{{$application->name}}</td>
                    <td>{{$application->phone}}</td>
                    <td class="text-center">{{$application->matric_marks}} <span class="text-xs">({{round($application->matric_marks/11,0)}} %)</span></td>
                    <td class="text-center">{{$application->group->short}}</td>
                    <td class="text-center">{{$application->objection}}</td>
                    <td class="text-center">{{$application->fee ?? ''}}</td>
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