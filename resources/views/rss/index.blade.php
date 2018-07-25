@extends('layouts.app')

@section('content')

    <div class="container">
        <hr>
        <a href="{{route('rss.create')}}" class="btn btn-primary  float-right">
            <i class="fa fa-plus-square-o"></i> Create Rss
        </a>

        <table class="table table-striped">
            <thead>
            <th>Name</th>
            <th>URL</th>
            <th class="text-right">Edit</th>
            </thead>
            <tbody>
            @forelse($rsses as $rss)
                <tr>
                    <td>{{$rss->name}}</td>
                    <td>{{$rss->rss_path}}</td>
                    <td>
                        <form onsubmit="if(confirm('Delete?')){return true}else{ return false}"
                              action="{{route('rss.destroy',$rss)}}" method="post">
                            {{method_field('DELETE')}}
                            @csrf

                            <a href="{{route('rss.edit',$rss)}}" method="post">
                                <i class="fa fa-edit"></i>
                            </a>
                            <button type="submit" class="btn"><i class="fa fa-trash-o"></i></button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="3" class="text-center"><h2>No Rss</h2></td>
                </tr>
            @endforelse
            </tbody>
            <tfoot>
            <tr>
                <td colspan="3">
                    <ul class="pagination pull-right">
                        {{$rsses->links()}}
                    </ul>
                </td>
            </tr>
            </tfoot>
        </table>

    </div>
@endsection
