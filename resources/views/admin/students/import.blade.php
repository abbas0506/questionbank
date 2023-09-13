@extends('layouts.admin')
@section('page-content')

<div class="container">
    <h1>Import Students</h1>
    <div class="bread-crumb">
        <a href="/">Home</a>
        <div>/</div>
        <div>{{$section->name}}</div>
        <div>/</div>
        <div>Import Students</div>
    </div>


    <!-- search -->
    <div class="flex items-center justify-between mt-12">
        <div class="flex relative w-full md:w-1/3">
            <input type="text" id='searchby' placeholder="Search ..." class="search-indigo w-full" oninput="search(event)">
            <i class="bx bx-search absolute top-2 right-2"></i>
        </div>
        <input type="text" id='section_id' value="{{$section->id}}">
        <div onclick="importStudents()" class="btn-teal px-3 hover:cursor-pointer">Import Students</div>
    </div>

    <!-- page message -->
    @if($errors->any())
    <x-message :errors='$errors'></x-message>
    @else
    <x-message></x-message>
    @endif

    <div class="overflow-x-auto w-full mt-8">
        <table class="table-auto w-full">
            <thead>
                <tr>
                    <th>
                        <div class="flex justify-center items-center"><input type="checkbox" id='chkAll' onclick="chkAll()"></div>
                    </th>
                    <th>Form No</th>
                    <th>Student</th>
                    <th>Marks</th>
                    <th>Group</th>
                </tr>
            </thead>
            <tbody>
                @php $sr=1; @endphp
                @foreach($confirmed_applications->sortBy('group_id') as $application)
                <tr class="text-sm tr">
                    <td>
                        <div class="flex justify-center items-center">
                            <input type="checkbox" name='chk' value='{{$application->id}}' onclick="updateChkCount()">
                        </div>
                    </td>
                    <td>{{ $application->matric_rollno }}</td>
                    <td class="text-left">{{ $application->name }}</td>
                    <td>{{ $application->matric_marks }}</td>
                    <td>{{ $application->group->short }}</td>
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
                    $(this).children().eq(4).prop('outerText').toLowerCase().includes(searchtext)
                )) {
                $(this).addClass('hidden');
            } else {
                $(this).removeClass('hidden');
            }
        });
    }

    function chkAll() {
        $('.tr').each(function() {
            if (!$(this).hasClass('hidden'))
                $(this).children().find('input:checkbox').prop('checked', $('#chkAll').is(':checked'));
            // updateChkCount()
        });
    }

    function importStudents() {

        var token = $("meta[name='csrf-token']").attr("content");

        var section_id = $('#section_id').val();
        var ids_array = [];
        var chks = document.getElementsByName('chk');
        chks.forEach((chk) => {
            if (chk.checked) ids_array.push(chk.value);
        })

        if (ids_array.length == 0) {
            Swal.fire({
                icon: 'warning',
                title: "Nothing to save",
                // showConfirmButton: false,
                // timer: 1500
            });
        } else {
            //show sweet alert and confirm submission
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, assign section '
            }).then((result) => { //if confirmed    
                if (result.value) {
                    $.ajax({
                        type: 'POST',
                        url: "{{url('admin/students/import')}}",
                        data: {
                            "section_id": section_id,
                            "ids_array": ids_array,
                            "_token": token,

                        },
                        success: function(response) {
                            //
                            Swal.fire({
                                icon: 'success',
                                title: response.msg,

                            });
                            //refresh content after deletion
                            location.reload();
                        },
                        error: function(XMLHttpRequest, textStatus, errorThrown) {
                            Swal.fire({
                                icon: 'warning',
                                title: errorThrown
                            });
                        }
                    }); //ajax end
                }
            })

        }
    }
</script>

@endsection