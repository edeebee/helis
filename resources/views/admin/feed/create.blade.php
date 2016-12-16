@extends('layouts.app')
@section('headTitle', 'New feed')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Create new feed</div>

                    <div class="panel-body">
                        {!! Form::open(['url' => 'feed']) !!}

                        @include('errors.errors')
                        @include('admin.feed.form', ['submitTextButton' => 'Add Feed'])

                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection