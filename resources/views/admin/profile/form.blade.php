<div class="form-group">
    {!! Form::label('email', 'Login') !!}
    {!! Form::text('email',null,['readonly'=>'readonly','class'=> 'form-control readonly']) !!}
</div>
<div class="form-group">
    {!! Form::label('current_password', 'Current Password') !!}
    {!! Form::password('current_password', ['class'=>'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('password', 'New password') !!}
    {!! Form::password('password', ['class'=>'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('password_confirmation', 'Confirm') !!}
    {!! Form::password('password_confirmation', ['class'=>'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::submit($submitTextButton, array('class' => 'btn btn-primary')) !!}
</div>