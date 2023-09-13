@extends('layouts.dep')
@section('page-content')

<div class="container">
    <h1>Under Process</h1>
    <div class="bread-crumb">
        <a href="{{route('dep.applications.index')}}">Applications</a>
        <div>/</div>
        <div>Under Process</div>
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
        <div class="flex flex-wrap justify-between items-center">
            <label for="">{{ $session->applications()->underprocess()->count() }} records found</label>
            <a href="{{url('dep/pdf/underprocess')}}" target="_blank" class="btn-teal px-3">Print / Download</a>
        </div>
        <table class="table-auto w-full mt-2">
            <thead>
                <tr>
                    <th class="w-16">Roll #</th>
                    <th class="w-48">Name</th>
                    <th class="w-12">Marks</th>
                    <th class="w-24">Group</th>
                </tr>
            </thead>
            <tbody>
                @foreach($session->applications()->underprocess()->get() as $application)
                <tr class="tr text-sm">
                    <td>
                        <a href="{{route('dep.applications.show',$application)}}" class="link">
                            {{$application->matric_rollno}}
                        </a>
                    </td>
                    <td class="text-left">{{$application->name}}</td>
                    <td>{{$application->matric_marks}}</td>
                    <td>{{$application->group->short}}</td>
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