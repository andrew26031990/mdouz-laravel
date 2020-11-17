<!-- Username Field -->
<div class="form-group col-sm-6">
    {!! Form::label('username', 'Username:') !!}
    {!! Form::text('username', null, ['class' => 'form-control','maxlength' => 32,'maxlength' => 32]) !!}
</div>

<!-- Auth Key Field -->
<div class="form-group col-sm-6">
    {!! Form::label('auth_key', 'Auth Key:') !!}
    {!! Form::text('auth_key', null, ['class' => 'form-control','maxlength' => 32,'maxlength' => 32]) !!}
</div>

<!-- Access Token Field -->
<div class="form-group col-sm-6">
    {!! Form::label('access_token', 'Access Token:') !!}
    {!! Form::text('access_token', null, ['class' => 'form-control','maxlength' => 40,'maxlength' => 40]) !!}
</div>

<!-- Password Hash Field -->
<div class="form-group col-sm-6">
    {!! Form::label('password_hash', 'Password Hash:') !!}
    {!! Form::text('password_hash', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255]) !!}
</div>

<!-- Oauth Client Field -->
<div class="form-group col-sm-6">
    {!! Form::label('oauth_client', 'Oauth Client:') !!}
    {!! Form::text('oauth_client', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255]) !!}
</div>

<!-- Oauth Client User Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('oauth_client_user_id', 'Oauth Client User Id:') !!}
    {!! Form::text('oauth_client_user_id', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255]) !!}
</div>

<!-- Email Field -->
<div class="form-group col-sm-6">
    {!! Form::label('email', 'Email:') !!}
    {!! Form::email('email', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255]) !!}
</div>

<!-- Status Field -->
<div class="form-group col-sm-6">
    {!! Form::label('status', 'Status:') !!}
    {!! Form::number('status', null, ['class' => 'form-control']) !!}
</div>

<!-- Logged At Field -->
<div class="form-group col-sm-6">
    {!! Form::label('logged_at', 'Logged At:') !!}
    {!! Form::number('logged_at', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('user.index') }}" class="btn btn-default">Cancel</a>
</div>
