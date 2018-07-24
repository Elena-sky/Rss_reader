@extends('layouts.admin_app')

@section('content')
    <div class="container">
        @component('components.breadcrumb')
            @slot('title')Users Create @endslot
            @slot('parent')Home @endslot
            @slot('active')User @endslot
    @endcomponent
            <hr>
            <form class="form-horizontal" action="{{route('admin.user.store')}}" method="post">
                @csrf
                @include('auth.user.partials.form')
            </form>
    </div>
@endsection
