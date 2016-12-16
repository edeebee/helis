@extends('layouts.app')
@section('headTitle', 'Category '.$cat->id)
@section('content')
    <div class="container">
        <div class="row">

            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Category</div>
                    <div class="panel-body">
                        <ul class="list-group mylist">
                            <li class="list-group-item clearfix"><strong>Name: </strong>{{$cat->name}} <br><strong>
                                    Feeds: </strong>
                                @if(count($cat->feed))
                                    @foreach($cat->feed as $feed)
                                        {{$feed->url}}
                                    @endforeach
                                @else
                                    No feeds attached
                                @endif
                                {{ Form::open(array('url' => 'cat/' . $cat->id, 'class' => 'pull-right')) }}
                                {{ Form::hidden('_method', 'DELETE') }}
                                {{Form::button('<i class="glyphicon glyphicon-remove"></i>', array('type' => 'submit', 'class' => 'btn btn-danger del-btn'))}}
                                {{ Form::close() }}
                                <a title="edit item" href="/cat/{{$cat->id}}/edit"
                                   class="btn btn-primary pull-right"><i class="glyphicon glyphicon glyphicon-edit"></i></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection