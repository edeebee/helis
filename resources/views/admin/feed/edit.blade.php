@extends('layouts.app')
@section('headTitle', 'Feed edit '.$feed->id)
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Create new feed</div>

                    <div class="panel-body">
                        {!! Form::model($feed, ['method' => 'PATCH', 'action' => ['FeedController@update', $feed->id] ]) !!}

                        @include('errors.errors')
                        @include('admin.feed.form', ['submitTextButton' => 'Edit feed'])

                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection