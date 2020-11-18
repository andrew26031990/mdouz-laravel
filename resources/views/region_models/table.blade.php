<p>
    {!! Form::open(['route' => 'region.store']) !!}
    {!! Form::hidden('created_at', strtotime('today GMT')) !!}
    {!! Form::label('role', 'Выберите страну') !!}
    <select class="form-control" name="country_id" required style="margin-bottom: 15px">
        @foreach($countries as $country)
            @if($country->name != "")
                <option value="{{$country->country_id}}">{{$country->name}}</option>
            @endif
        @endforeach
    </select>
    <button class="btn btn-primary" type="submit">Добавить регион</button>
    {!! Form::close() !!}
</p>
<div class="table-responsive">
    <table class="table" id="region-table">
        <thead>
            <tr>
                <th>Страна</th>
                <th>Дата создания</th>
                @foreach($lang as $langModel)
                    <th>{{$langModel->name}}</th>
                @endforeach
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($region as $regionModel)
            <tr>
                <td>{{ $regionModel->ct_name }}</td>
                <td>{{ $regionModel->r_date }}</td>
                @foreach($regionTranslate as $regionTrans)
                    @if($regionModel->r_id == $regionTrans->region_id)
                        <th>{{$regionTrans->name}}</th>
                    @endif
                @endforeach
                <td>
                    {!! Form::open(['route' => ['region.destroy', $regionModel->r_id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('region.show', [$regionModel->r_id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{{ route('region.edit', [$regionModel->r_id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
