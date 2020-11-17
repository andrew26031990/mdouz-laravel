<p>
    {!! Form::open(['route' => 'region.store']) !!}
    {!! Form::hidden('created_at', strtotime('today GMT')) !!}
    {!! Form::label('role', 'Выберите страну') !!}
    <select class="form-control" name="country_id" required>
        @foreach($countries as $country)
            <option value="{{$country->country_id}}">{{$country->name}}</option>
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
                <td>{{ $regionModel->c_name }}</td>
                <td>{{ $regionModel->r_name }}</td>
                @foreach($regionTranslate as $regionTrans)
                    @if($regionModel->id == $regionTrans->region_id)
                        <th>{{$regionTrans->name}}</th>
                    @endif
                @endforeach
                <td>
                    {!! Form::open(['route' => ['region.destroy', $regionModel->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('region.show', [$regionModel->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{{ route('region.edit', [$regionModel->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
