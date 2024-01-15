@extends('layouts.principal')
@section('page-content')
<div class="custom-container">
    <h1>Teacher Evaluation</h1>
    <div class="bread-crumb">
        <a href="/">Home</a>
        <div>/</div>
        <div>Teachers</div>
        <div>/</div>
        <div>New Evaluation</div>
    </div>

    @php
    $months = array (1=>'Jan',2=>'Feb',3=>'Mar',4=>'Apr',5=>'May',6=>'Jun',7=>'Jul',8=>'Aug',9=>'Sep',10=>'Oct',11=>'Nov',12=>'Dec');
    @endphp
    <div class="content-section">
        <form action="{{route('principal.teachers.evaluation.store', $teacher)}}" method='post' onsubmit="return validate(event)">
            @csrf
            @php $sr=1; @endphp
            <div class="flex justify-between flex-wrap">
                <div>
                    <h2 class="">{{ $teacher->name }} s/o {{ $teacher->father }}</h2>
                    <label>{{$teacher->designation}}, BPS {{$teacher->bps}}</label>
                </div>
                <div>
                    <select name="month" class="custom-input w-24">
                        @foreach(array_keys($months) as $key)
                        <option value="{{$key}}" @selected(now()->format('m')==$key)>{{$months[$key]}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class=" divider my-3">
            </div>
            <!-- page message -->
            @if($errors->any())
            <x-message :errors='$errors'></x-message>
            @else
            <x-message></x-message>
            @endif

            <div class="overflow-x-auto w-full mt-4">
                <table class="table-fixed w-full">
                    <thead>
                        <tr>
                            <th class="w-8">Sr</th>
                            <th class="w-48">Evaluation Item</th>
                            <th class="w-12">Weight</th>
                            <th class="w-24">Score</th>
                        </tr>
                    <tbody>
                        @foreach($teacherEvaluationItems as $teacherEvaluationItem)
                        <tr>
                            <td>{{$sr++}}</td>
                            <td class="text-left pl-3">{{$teacherEvaluationItem->name}}</td>
                            <td>{{$teacherEvaluationItem->weight}}</td>
                            <td>
                                <div class="flex space-x-1 md:space-x-3 justify-center">
                                    <input type="checkbox" name="" id="0" class="w-4 h-4 chk bg-red-100 border-red-300 text-red-500 focus:ring-red-200">
                                    <input type="checkbox" name="" id="1" class="w-4 h-4 chk bg-orange-100 border-orange-300 text-orange-500 focus:ring-orange-200">
                                    <input type="checkbox" name="" id="2" class="w-4 h-4 chk bg-blue-100 border-blue-300 text-blue-500 focus:ring-blue-200" checked>
                                    <input type="checkbox" name="" id="3" class="w-4 h-4 chk bg-green-100 border-green-300 text-green-500 focus:ring-green-200">
                                </div>

                            </td>
                            <td class="hidden"><input type="text" name='teacher_evaluation_item_id_array[]' value="{{$teacherEvaluationItem->id}}"></td>
                            <td class="hidden"><input type="text" name='evaluation_marks_array[]' class="marks" value="2"></td>
                        </tr>
                        @endforeach
                    </tbody>
                    </thead>
                </table>
            </div>
            <div class="flex my-4 float-right">
                <button type="submit" class="btn-teal rounded p-2">Submit Now</button>
            </div>
        </form>
    </div>
</div>
@endsection
@section('script')
<script type="module">
    // $(document).ready(function() {
    $('.chk').change(function() {

        // alert($(this).closest('tr').children().eq(6).children().eq(0).html())
        $(this).closest('tr').children().find('input:checkbox').not(this).prop('checked', false);

        var val = $(this).prop('id');
        $(this).closest('tr').children().find('.marks').val(val);
        $(this).prop('checked', true)
    });

    // });
    // $(document).on('click', '.chk', function() {
    //     // your function here
    //     event.stopPropagation();
    //     event.stopImmediatePropagation();
    //     alert($(this).prop('id'))

    // });
</script>
@endsection