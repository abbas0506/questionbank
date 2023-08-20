@extends('layouts.admin')
@section('page-content')

<div class="container">
    <h1>Class Management</h1>
    <div class="bread-crumb">
        <a href="/">Home</a>
        <div>/</div>
        <div>Classes</div>
        <div>/</div>
        <div>All</div>
    </div>

    <!-- search -->
    <div class="flex items-center justify-between mt-12">
        <div class="flex relative w-full md:w-1/3">
            <input type="text" id='searchby' placeholder="Search ..." class="search-indigo w-full" oninput="search(event)">
            <i class="bx bx-search absolute top-2 right-2"></i>
        </div>
        @if(!$session->classes()->exists())
        <form action="{{route('admin.classes.store')}}" method="post">
            @csrf
            <button type="submit" class="btn-teal">Create Class</button>
        </form>
        @endif
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
                    <th>Class</th>
                    <th>Sections</th>
                </tr>
            </thead>
            <tbody>
                @foreach($classes as $clas)
                <tr class="text-sm">
                    <td>
                        <div class="flex flex-wrap items-center justify-between">
                            <div>{{$clas->title()}}</div>
                            <div class="flex items-center space-x-2">
                                <div class="text-xs text-slate-400">
                                    <i class="bi bi-person"></i> {{$clas->strength()}}
                                </div>
                                @role('super')
                                <a href="{{route('admin.clases.edit', $clas)}}">
                                    <i class="bi bi-pencil-square"></i>
                                </a>
                                @endrole
                                <form action="{{route('admin.classes.destroy',$clas)}}" method="POST" id='del_form{{$clas->id}}'>
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-500 hover:zoom-sm hover:text-red-800" onclick="delme('{{$clas->id}}')" @disabled($clas->strength()>0)>
                                        <i class="bi bi-trash3"></i>
                                    </button>
                                </form>
                            </div>
                        </div>
                    </td>
                    <td>
                        <div class="flex flex-wrap gap-2">
                            @foreach($clas->sections as $section)
                            <a href="{{route('admin.sections.show',$section)}}" class='pallet-teal'>
                                {{$section->name}} <span class="ml-1 text-xs">({{$section->students->count()}})</span>
                            </a>
                            @endforeach
                            <form action="{{route('admin.sections.store')}}" method="post" class='pallet-teal'>
                                @csrf
                                <input type="text" name="clas_id" value="{{$clas->id}}" hidden>
                                <button type='submit' class="w-full">
                                    <i class="bi bi-plus font-bold"></i>
                                </button>
                            </form>
                        </div>
                    </td>
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