@extends('layouts.app')
@section('content')
    <!-- Main Content -->
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-10 mx-auto">
                @foreach($entries as $entry)
                    <div class="post-preview">
                        <a href="{{$entry->link }}">
                            <h2 class="post-title">
                                {{ $entry->title}}
                            </h2>
                            <p class="post-subtitle">
                                {!!  $entry->description!!}
                            </p>
                        </a>
                        <p class="post-meta">Posted by
                            <a href="{{parse_url($entry->link)['host']}}">{{parse_url($entry->link)['host']}}</a>
                            on {{strftime('%m/%d/%Y %I:%M %p', strtotime($entry->pubDate))}}</p>
                    </div>
                    <hr>
            @endforeach
            </div>
        </div>
    </div>
@endsection
