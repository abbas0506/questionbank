@extends('layouts.principal')
@section('page-content')

<div class="custom-container">
    <h1>Teachers</h1>
    <div class="bread-crumb">
        <a href="/">Home</a>
        <div>/</div>
        <div>Teachers</div>
        <div>/</div>
        <div>All</div>
    </div>



    <div class="content-section">
        <label>List of all teachers</label>

        <div class="divider my-3"></div>
        <!-- page message -->
        @if($errors->any())
        <x-message :errors='$errors'></x-message>
        @else
        <x-message></x-message>
        @endif

        <!-- search -->
        <div class="flex items-center justify-between mt-4">
            <div class="flex relative w-full md:w-1/3">
                <input type="text" id='searchby' placeholder="Search ..." class="custom-search w-full" oninput="search(event)">
                <i class="bx bx-search absolute top-3 right-2"></i>
            </div>

        </div>

        @php $sr=1; @endphp
        <div class="overflow-x-auto w-full mt-4">

            <table class="table-auto w-full">
                <thead>
                    <tr>
                        <th>Sr</th>
                        <th>Teacher</th>
                        <th>Designation</th>
                        <th>Score</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($teachers as $teacher)
                    <tr class="tr text-sm">
                        <td>{{$sr++}}</td>
                        <td class="text-left pl-3">
                            <a href="{{route('principal.teachers.evaluation.create',$teacher)}}" class="link">{{$teacher->name}}</a>
                        </td>
                        <td>{{$teacher->designation}}</td>
                        <td>{{ $teacher->evaluationScore()}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

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