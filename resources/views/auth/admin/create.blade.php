@extends('layouts.admin_app')

@section('content')
    <div class="container">
        @component('components.breadcrumb')
            @slot('title')Admin Create @endslot
            @slot('parent')Home @endslot
            @slot('child_parent')Users @endslot
            @slot('active')Admin @endslot
        @endcomponent
        <hr>
        <form class="form-horizontal" action="{{route('admin.admin.store')}}" method="post">
            @csrf
            @if($errors->any())
                <div class="alert alert-danger">
                    @foreach($errors->all() as $error )
                        <li>{{$error}}</li>
                    @endforeach

                </div>
            @endif
            <label for="">Name</label>
            <input type="text" class="form-control" name="name" placeholder="Admin Name"
                   value="@if(old('name')){{old('name')}}@else{{ ""}}@endif" required>

            <label for="">Email</label>
            <input type="email" class="form-control" name="email" placeholder="Admin email"
                   value="@if(old('email')){{old('email')}}@else{{""}}@endif" required>
            <label for="">Job Title</label>
            <input type="text" class="form-control" name="job_title" placeholder="Job Title"
                   value="@if(old('job_title')){{old('job_title')}}@else{{""}}@endif" required>
            <label for="">Password</label>
            <input type="password" class="form-control" name="password">

            <label for="">Confirm Password</label>
            <input type="password" class="form-control" name="password_confirmation">

            <hr>
            <input class="btn btn-primary" type="submit" value="Save">
        </form>
    </div>
@endsection
