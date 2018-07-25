@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <h2>You are logged in!</h2>
                    <h3><a href="{{route('rss.create')}}" >
                            <i class="fa fa-plus-square-o"></i> Add Rss
                        </a>  feed and enjoy!!!</h3>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
