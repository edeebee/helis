@extends('layouts.app')
@section('headTitle', 'Category edit '.$cat->id)
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Edit category</div>
                    <div class="panel-body">
                        {!! Form::model($cat, ['method' => 'PATCH', 'action' => ['CatController@update', $cat->id] ]) !!}

                        @include('errors.errors')
                        @include('admin.cat.form', ['submitTextButton' => 'Edit Category','feed'=>$feed,'selected'=>$cat->feed->pluck('id')->toArray()])

                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection