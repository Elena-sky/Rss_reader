@extends('layouts.admin_app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <h2> Edit Rss </h2>
            <hr>
            <form class="form-horizontal" action="{{route('rss.update',$rss)}}" method="post">
                {{method_field('PUT')}}
                @csrf
                @include('rss.partials.form')
            </form>
@endsection
