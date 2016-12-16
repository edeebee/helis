<div class="form-group">
    {!! Form::label('name', 'Name:') !!}
    {!! Form::text('name', null, ['class'=> 'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::select('cat_feed[]',$feed,$selected, ['class'=>'form-control', 'multiple' => 'multiple']) !!}
</div>
<div class="form-group">
    {!! Form::submit($submitTextButton, array('class' => 'btn btn-primary')) !!}
</div>