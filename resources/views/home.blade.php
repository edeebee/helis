@extends('layouts.app')
@if(isset($id))
    @section('headTitle', 'News Group')
@else
    @section('headTitle', 'Home')
@endif

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">News agregator</div>

                    <div class="panel-body">
                        <div class="col-md-2">
                            @if(count($cats))
                                <ul class="list-group">
                                    <li class="group-item @if(!isset($id)) active @endif"><a href="/">All</a></li>
                                    @foreach($cats as $cat)
                                        <li class="group-item @if(isset($id)&& $cat->id ==$id) active @endif"><a
                                                    href="/group/{{$cat->id}}">{{$cat->name}}</a></li>
                                    @endforeach
                                </ul>
                            @endif
                        </div>
                        <div class="col-md-10">
                            @if(count($content))
                                <ul class="list-group" id="news">
                                    @foreach($content as $row)

                                        <li class="list-group-item">
                                            <div class="row">
                                                <div class="col-md-1">
                                                    <a target="_blank" title="feed" href="{{$row->link}}"
                                                       class="provider">
                                                        <i class="glyphicon glyphicon-link"></i>
                                                        <small>{{$row->feed->id}}</small>
                                                    </a>
                                                </div>
                                                <div class="col-md-9">
                                                    <a class="modalLink" data-target="#feedModal"
                                                       data-toggle="modal">{{$row->title}}</a>
                                                    <span class="description"
                                                          style="display: none">{{$row->description}}</span>
                                                </div>
                                                <div class="col-md-2">
                                                    <span class="time">{{$row->pub_date}}</span>
                                                </div>
                                            </div>
                                        </li>

                                    @endforeach
                                </ul>
                                {{ $content->links() }}

                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="feedModal" tabindex="-1" role="dialog" aria-labelledby="feedModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="feedModalLabel">Modal title</h4>
                </div>
                <div class="modal-body">
                    ...
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <a type="button" target="_blank" href="" class="btn-open btn btn-primary">Open</a>
                </div>
            </div>
        </div>
    </div>

@endsection
