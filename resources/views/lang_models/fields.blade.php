<!-- Url Field -->
<div class="form-group col-sm-6">
    {!! Form::label('url', 'Url:') !!}
    {!! Form::text('url', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255]) !!}
</div>

<!-- Local Field -->
<div class="form-group col-sm-6">
    {!! Form::label('local', 'Local:') !!}
    {!! Form::text('local', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255]) !!}
</div>

<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', 'Name:') !!}
    {!! Form::text('name', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255]) !!}
</div>


<!-- Default Field -->
<div class="form-group col-sm-6">
    {!! Form::label('default', 'Default:') !!}
    {!! Form::number('default', null, ['class' => 'form-control']) !!}
</div>

<!-- Date Update Field -->
<div class="form-group col-sm-6">
    {!! Form::label('date_update', 'Date Update:') !!}
    {!! Form::number('date_update', null, ['class' => 'form-control']) !!}
</div>

<!-- Date Create Field -->
<div class="form-group col-sm-6">
    {!! Form::label('date_create', 'Date Create:') !!}
    {!! Form::number('date_create', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('lang.index') }}" class="btn btn-default">Cancel</a>
</div>
