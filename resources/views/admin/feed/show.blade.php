@extends('layouts.app')
@section('headTitle', 'Feed '.$feed->id)
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Feed</div>

                    <div class="panel-body">


                        <ul class="list-group mylist">


                            <li class="list-group-item clearfix">{{$feed->url}}
                                {{ Form::open(array('url' => 'feed/' . $feed->id, 'class' => 'pull-right')) }}
                                {{ Form::hidden('_method', 'DELETE') }}
                                {{Form::button('<i class="glyphicon glyphicon-remove"></i>', array('type' => 'submit', 'class' => 'btn btn-danger del-btn'))}}
                                {{ Form::close() }}
                                <a title="edit item" href="/feed/{{$feed->id}}/edit" class="btn btn-primary pull-right"><i
                                            class="glyphicon glyphicon glyphicon-edit"></i></a>
                            </li>


                        </ul>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection