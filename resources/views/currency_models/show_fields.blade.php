<!-- Name Field -->
<div class="form-group">
    {!! Form::label('name', 'Name:') !!}
    <p>{{ $currencyModel->name }}</p>
</div>

<!-- Code Field -->
<div class="form-group">
    {!! Form::label('code', 'Code:') !!}
    <p>{{ $currencyModel->code }}</p>
</div>

<!-- Exchange Rate Field -->
<div class="form-group">
    {!! Form::label('exchange_rate', 'Exchange Rate:') !!}
    <p>{{ $currencyModel->exchange_rate }}</p>
</div>

<!-- Default Field -->
<div class="form-group">
    {!! Form::label('default', 'Default:') !!}
    <p>{{ $currencyModel->default }}</p>
</div>

