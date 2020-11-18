{!! Form::hidden('created_at', strtotime('today GMT')) !!}
{!! Form::hidden('region_id', $regionModel->id) !!}
<!-- Country Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('country_id', 'Страна') !!}
    <select class="form-control" name="country_id" required style="margin-bottom: 15px">
        @foreach($countries as $country)
            @if($country->ct_name != "")
                <option value="{{$country->c_id}}">{{$country->ct_name}}</option>
            @endif
        @endforeach
    </select>
</div>
@if(count($regionTranslate) == 0)
    @foreach($regionTranslate as $regionTrans)
        <div class="form-group col-sm-6">
            {!! Form::label($regionTrans->l_url, $regionTrans->l_name) !!}
            {!! Form::text($regionTrans->l_id, $regionTrans->rt_name, ['class' => 'form-control','maxlength' => 128,'maxlength' => 128,'required'=>'required']) !!}
        </div>
    @endforeach
@endif
@foreach($regionTranslate as $regionTrans)
    <div class="form-group col-sm-6">
        {!! Form::label($regionTrans->l_url, $regionTrans->l_name) !!}
        {!! Form::text($regionTrans->l_id, $regionTrans->rt_name, ['class' => 'form-control','maxlength' => 128,'maxlength' => 128,'required'=>'required']) !!}
    </div>
@endforeach

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('region.index') }}" class="btn btn-default">Cancel</a>
</div>
