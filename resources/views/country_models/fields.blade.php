{!! Form::hidden('created_at', strtotime('today GMT')) !!}
{!! Form::hidden('country_id', $countryModel->id) !!}
@if(count($countryTranslate) == 0)
    @foreach($countryTranslate as $countryTrans)
        <div class="form-group col-sm-6">
            {!! Form::label($countryTrans->l_url, $countryTrans->l_name) !!}
            {!! Form::text($countryTrans->l_id, $countryTrans->ct_name, ['class' => 'form-control','maxlength' => 128,'maxlength' => 128,'required'=>'required']) !!}
        </div>
    @endforeach
@endif
@foreach($countryTranslate as $countryTrans)
    <div class="form-group col-sm-6">
        {!! Form::label($countryTrans->l_url, $countryTrans->l_name) !!}
        {!! Form::text($countryTrans->l_id, $countryTrans->ct_name, ['class' => 'form-control','maxlength' => 128,'maxlength' => 128,'required'=>'required']) !!}
    </div>
@endforeach
<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('country.index') }}" class="btn btn-default">Cancel</a>
</div>
