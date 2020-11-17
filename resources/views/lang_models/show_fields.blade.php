<!-- Url Field -->
<div class="form-group">
    {!! Form::label('url', 'Url:') !!}
    <p>{{ $langModel->url }}</p>
</div>

<!-- Local Field -->
<div class="form-group">
    {!! Form::label('local', 'Local:') !!}
    <p>{{ $langModel->local }}</p>
</div>

<!-- Name Field -->
<div class="form-group">
    {!! Form::label('name', 'Name:') !!}
    <p>{{ $langModel->name }}</p>
</div>

<!-- Default Field -->
<div class="form-group">
    {!! Form::label('default', 'Default:') !!}
    <p>{{ $langModel->default }}</p>
</div>

<!-- Date Update Field -->
<div class="form-group">
    {!! Form::label('date_update', 'Date Update:') !!}
    <p>{{ $langModel->date_update }}</p>
</div>

<!-- Date Create Field -->
<div class="form-group">
    {!! Form::label('date_create', 'Date Create:') !!}
    <p>{{ $langModel->date_create }}</p>
</div>

