@extends('layouts.app')
@section('headTitle', 'Feed')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                @if(session()->has('success'))
                    <div class="alert alert-success alert-dismissible">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        {{ session('success') }}
                    </div>
                @endif

                <div class="panel panel-default">
                    <div class="panel-heading">Feeds list</div>

                    <div class="panel-body">
                        <a class="btn btn-large btn-primary" href="/feed/create"><i
                                    class="glyphicon glyphicon-plus"></i>Add New</a>
                        @if ($feedList->count())
                            <ul class="list-group mylist">


                                @foreach($feedList as $key=>$feed)
                                    <li class="list-group-item clearfix"><span
                                                class="no">{{++$key}}</span>{{$feed->url}}
                                        {{ Form::open(array('url' => 'feed/' . $feed->id, 'class' => 'pull-right del-confirm')) }}
                                        {{ Form::hidden('_method', 'DELETE') }}
                                        {{Form::button('<i class="glyphicon glyphicon-remove"></i>', array('type' => 'submit', 'class' => 'btn btn-danger del-btn'))}}
                                        {{ Form::close() }}
                                        <a title="edit item" href="/feed/{{$feed->id}}/edit"
                                           class="btn btn-primary pull-right"><i
                                                    class="glyphicon glyphicon glyphicon-edit"></i></a>
                                        <a title="view item" href="/feed/{{$feed->id}}"
                                           class="btn btn-warning pull-right"><i
                                                    class="glyphicon glyphicon-eye-open"></i></a>
                                    </li>
                                @endforeach
                                @else
                                    <li>No Feeds</li>
                            </ul>

                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection