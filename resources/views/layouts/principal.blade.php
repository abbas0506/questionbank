@extends('layouts.basic')

@section('header')
<x-principal.header></x-principal.header>
@endsection

@section('sidebar')
<x-principal.sidebar></x-principal.sidebar>
@endsection


@section('body')

<div class="responsive-body">
    @yield('page-content')
</div>

<script type="module">
    $('#menu').click(function() {
        $("#sidebar").toggle();
    });
</script>
@endsection