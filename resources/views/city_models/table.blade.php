<div class="table-responsive">
    <table class="table" id="city-table">
        <thead>
            <tr>
                <th>Region Id</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($city as $cityModel)
            <tr>
                <td>{{ $cityModel->region_id }}</td>
                <td>
                    {!! Form::open(['route' => ['city.destroy', $cityModel->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('city.show', [$cityModel->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{{ route('city.edit', [$cityModel->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
