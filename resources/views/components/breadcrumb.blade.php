<h2>{{$title}}</h2>
<ol class="breadcrumb">
    <li><a href="{{route('admin')}}">{{$parent}}</a></li>
    /
    @isset($child_parent)
        <li><a href="{{route('admin.dashboard')}}">{{$child_parent}}</a></li>/
    @endisset
    <li class="active"> {{$active}} </li>
</ol>