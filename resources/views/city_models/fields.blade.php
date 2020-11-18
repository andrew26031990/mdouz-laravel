{!! Form::hidden('created_at', strtotime('today GMT')) !!}
{!! Form::hidden('city_id', $cityModel->id) !!}
<!-- Region Id Field -->

<div class="form-group col-sm-6">
    {!! Form::label('country_id', 'Регион') !!}
    <select class="form-control" name="region_id" required style="margin-bottom: 15px">
        @foreach($regions as $region)
            @if($region->rt_name != "")
                <option value="{{$region->r_id}}">{{$region->rt_name}}</option>
            @endif
        @endforeach
    </select>
</div>
@if(count($cityTranslate) == 0)
    @foreach($cityTranslate as $cityTrans)
        <div class="form-group col-sm-6">
            {!! Form::label($cityTrans->l_url, $cityTrans->l_name) !!}
            {!! Form::text($cityTrans->l_id, $cityTrans->ct_name, ['class' => 'form-control','maxlength' => 128,'maxlength' => 128,'required'=>'required']) !!}
        </div>
    @endforeach
@endif
@foreach($cityTranslate as $cityTrans)
    <div class="form-group col-sm-6">
        {!! Form::label($cityTrans->l_url, $cityTrans->l_name) !!}
        {!! Form::text($cityTrans->l_id, $cityTrans->ct_name, ['class' => 'form-control','maxlength' => 128,'maxlength' => 128,'required'=>'required']) !!}
    </div>
@endforeach
<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('city.index') }}" class="btn btn-default">Cancel</a>
</div>
