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

    <div class="overflow-x-auto w-full mt-12">

        <table class="table-auto w-full">
            <thead>
                <tr>
                    <th>Class</th>
                    <th>Strength</th>
                    <th>Import</th>
                </tr>
            </thead>
            <tbody>
                @foreach($classes as $clas)
                <tr class="text-sm">
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