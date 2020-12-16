<div class="table-responsive">
    <table class="table" id="lang-table">
        <thead>
            <tr>
                <th>Url</th>
        <th>Local</th>
        <th>Name</th>
        <th>Default</th>
        <th>Date Update</th>
        <th>Date Create</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($lang as $langModel)
            <tr>
                <td>{{ $langModel->url }}</td>
            <td>{{ $langModel->local }}</td>
            <td>{{ $langModel->name }}</td>
            <td>{{ $langModel->default }}</td>
            <td>{{ $langModel->date_update }}</td>
            <td>{{ $langModel->date_create }}</td>
                <td>
                    {!! Form::open(['route' => ['lang.destroy', $langModel->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        {{--<a href="{{ route('lang.show', [$langModel->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>--}}
                        <a href="{{ route('lang.edit', [$langModel->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
