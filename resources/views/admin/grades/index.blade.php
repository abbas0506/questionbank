@extends('layouts.admin')
@section('page-content')

<div class="container">
    <h1>Grades</h1>
    <div class="bread-crumb">
        <a href="{{url('admin')}}">Home</a>
        <div>/</div>
        <div>Grades</div>
        <div>/</div>
        <div>All</div>
    </div>

    <table class="table-auto w-full mt-12">
        <thead>
            <tr>
                <th>Grade #</th>
                <th>Engllish</th>
                <th>Roman</th>
            </tr>
        </thead>
        <tbody>
            @foreach($grades as $grade)
            <tr class="text-sm">
                <td>{{$grade->grade_no}}</td>
                <td>{{$grade->english_name}}</td>
                <td>{{$grade->roman_name}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection