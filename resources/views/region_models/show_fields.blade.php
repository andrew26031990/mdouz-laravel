<div class="form-group">
    {!! Form::label('name', 'Created at: ') !!}
    <p>{{ gmdate("Y-m-d\TH:i:s\Z", $regionModel[0]->r_date) }}</p>
</div>
<!-- Country Id Field -->
<div class="form-group">
    {!! Form::label('country_id', 'Country Id:') !!}
    <p>{{ $regionModel[0]->ct_name }}</p>
</div>

@foreach($regionTranslate as $regionTrans)
    <div class="form-group">
        {!! Form::label('code', $regionTrans->l_name) !!}
        <p>{{ $regionTrans->rt_name }}</p>
    </div>
@endforeach
