<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', 'Name:') !!}
    {!! Form::text('name', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255]) !!}
</div>

<!-- Code Field -->
<div class="form-group col-sm-6">
    {!! Form::label('code', 'Code:') !!}
    {!! Form::text('code', null, ['class' => 'form-control','maxlength' => 128,'maxlength' => 128]) !!}
</div>

<!-- Exchange Rate Field -->
<div class="form-group col-sm-6">
    {!! Form::label('exchange_rate', 'Exchange Rate:') !!}
    {!! Form::number('exchange_rate', null, ['class' => 'form-control']) !!}
</div>

<!-- Default Field -->
<div class="form-group col-sm-6">
    {!! Form::label('default', 'Default:') !!}
    {!! Form::number('default', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('currency.index') }}" class="btn btn-default">Cancel</a>
</div>
