@extends('layouts.dep')
@section('page-content')

<div class="container">
    <h1>{{$group->short}}</h1>
    <div class="bread-crumb">
        <a href="/">Home</a>
        <div>/</div>
        <div>{{$group->short}}</div>
        <div>/</div>
        <div>all</div>
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
        <label for="">{{ $session->applications()->feepaid()->group($group->id)->count() }} records found</label>
        <table class="table-auto w-full mt-2">
            <thead>
                <tr>
                    <th>Roll #</th>
                    <th>Name</th>
                    <th>Phone</th>
                    <th>Marks</th>
                </tr>
            </thead>
            <tbody>
                @foreach($session->applications()->feepaid()->group($group->id)->get()->sortByDesc('matric_marks') as $application)
                <tr class="tr text-sm">
                    <td class="text-center">{{$application->matric_rollno}}</td>
                    <td>{{$application->name}}</td>
                    <td>{{$application->phone}}</td>
                    <td class="text-center">{{round($application->matric_marks/11,0)}} %</td>
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