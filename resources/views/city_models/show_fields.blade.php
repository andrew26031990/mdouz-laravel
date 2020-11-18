<div class="form-group">
    {!! Form::label('name', 'Дата создания') !!}
    <p>{{ gmdate("Y-m-d\TH:i:s\Z", $cityModel[0]->c_date) }}</p>
</div>
<!-- Region Id Field -->
<div class="form-group">
    {!! Form::label('region_id', 'Регион') !!}
    <p>{{ $cityModel[0]->rt_name }}</p>
</div>

@foreach($cityTranslate as $cityTrans)
    <div class="form-group">
        {!! Form::label('code', $cityTrans->l_name) !!}
        <p>{{ $cityTrans->ct_name }}</p>
    </div>
@endforeach

