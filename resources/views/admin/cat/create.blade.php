@extends('layouts.app')
@section('headTitle', 'New category')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Create new category</div>

                    <div class="panel-body">
                        {!! Form::open(['url' => 'cat' ,'autocomplete'=>'off']) !!}

                        @include('errors.errors')
                        @include('admin.cat.form', ['submitTextButton' => 'Add Category','feed'=>$feed,'selected'=>null])

                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection