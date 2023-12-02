@extends('layouts.admin')
@section('page-content')

<div class="container">
    <h1>Class</h1>
    <div class="bread-crumb">
        <a href="/">Home</a>
        <div>/</div>
        <div>Classes</div>
        <div>/</div>
        <div>All</div>
    </div>

    <!-- page message -->
    @if($errors->any())
    <x-message :errors='$errors'></x-message>
    @else
    <x-message></x-message>
    @endif

    <!-- search -->
    <div class="flex items-center justify-between mt-12">
        <div class="flex relative w-full md:w-1/3">
            <input type="text" id='searchby' placeholder="Search ..." class="search-indigo w-full" oninput="search(event)">
            <i class="bx bx-search absolute top-2 right-2"></i>
        </div>
        <a href="{{route('admin.classes.create')}}" class="text-sm p-2 border hover:bg-teal-50">Add New <i class="bi bi-plus text-teal-600"></i></a>
    </div>

    @php $sr=1; @endphp
    <div class="overflow-x-auto w-full mt-12">

        <table class="table-auto w-full">
            <thead>
                <tr>
                    <th>Sr</th>
                    <th>Class</th>
                    <th><i class="bi-people-fill"></i></th>
                    <th>Import</th>
                </tr>
            </thead>
            <tbody>
                @foreach($classes as $clas)
                <tr class="tr text-sm">
                    <td>{{$sr++}}</td>
                    <td>
                        <a href="{{route('admin.classes.show',$clas)}}" class="link">{{$clas->roman()}}</a>
                    </td>
                    <td>{{$clas->students->count()}}</td>
                    <td><a href="{{route('admin.classes.show',$clas)}}" class="link"><i class="bi bi-file-earmark-excel text-teal-600"></i></a></td>
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