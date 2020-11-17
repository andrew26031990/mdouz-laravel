<!-- Name Field -->
<div class="form-group">
    {!! Form::label('name', 'Created at: ') !!}
    <p>{{ gmdate("Y-m-d\TH:i:s\Z", $countryModel->created_at) }}</p>
</div>

@foreach($countryTranslate as $countryTrans)
    <div class="form-group">
        {!! Form::label('code', $countryTrans->l_name) !!}
        <p>{{ $countryTrans->ct_name }}</p>
    </div>
@endforeach

<!-- Code Field -->

