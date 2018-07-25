@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <h2> Create Rss </h2>
                <hr>
                <form class="form-horizontal" action="{{route('rss.store')}}" method="post">
                    @csrf
                    @include('rss.partials.form')
                </form>
            </div>
        </div>
    </div>
@endsection
