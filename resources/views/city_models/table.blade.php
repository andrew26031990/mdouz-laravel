<p>
    {!! Form::open(['route' => 'city.store']) !!}
    {!! Form::hidden('created_at', strtotime('today GMT')) !!}
    {!! Form::label('role', 'Выберите регион') !!}
    <select class="form-control" name="region_id" required style="margin-bottom: 15px">
        @foreach($regions as $region)
            @if($region->name != "")
                <option value="{{$region->region_id}}">{{$region->name}}</option>
            @endif
        @endforeach
    </select>
    <button class="btn btn-primary" type="submit">Добавить регион</button>
    {!! Form::close() !!}
</p>
<div class="table-responsive">
    <table class="table" id="city-table">
        <thead>
            <tr>
                <th>Дата создания</th>
                <th>Регион</th>
                @foreach($lang as $langModel)
                    <th>{{$langModel->name}}</th>
                @endforeach
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($city as $cityModel)
            <tr>
                <td>{{ $cityModel->c_date }}</td>
                <td>{{ $cityModel->rt_name }}</td>
                @foreach($cityTranslate as $cityTrans)
                    @if($cityModel->c_id == $cityTrans->city_id)
                        <th>{{$cityTrans->name}}</th>
                    @endif
                @endforeach
                <td>
                    {!! Form::open(['route' => ['city.destroy', $cityModel->c_id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('city.show', [$cityModel->c_id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{{ route('city.edit', [$cityModel->c_id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
