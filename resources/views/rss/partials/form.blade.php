@if($errors->any())
    <div class="alert alert-danger">
        @foreach($errors->all() as $error )
            <li>{{$error}}</li>
        @endforeach

    </div>
@endif
@if (session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif
<label for="">Name</label>
<input type="text" class="form-control" name="name" placeholder="Name"
       value="@if(old('name')){{old('name')}}@else{{$rss->name or ""}}@endif" required>

<label for="">URL</label>
<input type="text" class="form-control" name="rss_path" placeholder="URL"
       value="@if(old('rss_path')){{old('rss_path')}}@else{{$rss->rss_path or ""}}@endif" required>

<hr>
<input class="btn btn-primary" type="submit" value="Save">