<p>
    {!! Form::open(['route' => 'country.store']) !!}
    {!! Form::hidden('created_at', strtotime('today GMT')) !!}
    <button class="btn btn-primary" type="submit">Добавить страну</button>
    {!! Form::close() !!}
</p>
<div class="table-responsive">
    <table class="table" id="country-table">
        <thead>
            <tr>
                <th>Дата создания</th>
                @foreach($lang as $langModel)
                    <th>{{$langModel->name}}</th>
                @endforeach
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($country as $countryModel)
            <tr>
                <td>{{ gmdate("Y-m-d\TH:i:s\Z", $countryModel->created_at) }}</td>
                @foreach($countryTranslate as $countryTrans)
                    @if($countryModel->id == $countryTrans->country_id)
                        <th>{{$countryTrans->name}}</th>
                    @endif
                @endforeach
                <td>
                    {!! Form::open(['route' => ['country.destroy', $countryModel->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('country.show', [$countryModel->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{{ route('country.edit', [$countryModel->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
