@extends('layouts.app')
@section('headTitle', 'Profile')
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
                    <div class="panel-heading">Profile</div>

                    <div class="panel-body">
                        {!! Form::model( $user, ['method' => 'POST', 'action' => ['AdminController@change', $user->id] ]) !!}

                        @include('errors.errors')
                        @include('admin.profile.form', ['submitTextButton' => 'Change Password'])

                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection