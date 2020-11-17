<!-- Username Field -->
<div class="form-group">
    {!! Form::label('username', 'Username:') !!}
    <p>{{ $userModel->username }}</p>
</div>

<!-- Auth Key Field -->
<div class="form-group">
    {!! Form::label('auth_key', 'Auth Key:') !!}
    <p>{{ $userModel->auth_key }}</p>
</div>

<!-- Access Token Field -->
<div class="form-group">
    {!! Form::label('access_token', 'Access Token:') !!}
    <p>{{ $userModel->access_token }}</p>
</div>

<!-- Password Hash Field -->
<div class="form-group">
    {!! Form::label('password_hash', 'Password Hash:') !!}
    <p>{{ $userModel->password_hash }}</p>
</div>

<!-- Oauth Client Field -->
<div class="form-group">
    {!! Form::label('oauth_client', 'Oauth Client:') !!}
    <p>{{ $userModel->oauth_client }}</p>
</div>

<!-- Oauth Client User Id Field -->
<div class="form-group">
    {!! Form::label('oauth_client_user_id', 'Oauth Client User Id:') !!}
    <p>{{ $userModel->oauth_client_user_id }}</p>
</div>

<!-- Email Field -->
<div class="form-group">
    {!! Form::label('email', 'Email:') !!}
    <p>{{ $userModel->email }}</p>
</div>

<!-- Status Field -->
<div class="form-group">
    {!! Form::label('status', 'Status:') !!}
    <p>{{ $userModel->status }}</p>
</div>

<!-- Logged At Field -->
<div class="form-group">
    {!! Form::label('logged_at', 'Logged At:') !!}
    <p>{{ $userModel->logged_at }}</p>
</div>

