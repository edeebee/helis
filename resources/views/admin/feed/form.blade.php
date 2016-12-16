<div class="form-group">
    {!! Form::label('url', 'URL:') !!}
    {!! Form::text('url', null, ['class'=> 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::submit($submitTextButton, array('class' => 'btn btn-primary')) !!}
</div>