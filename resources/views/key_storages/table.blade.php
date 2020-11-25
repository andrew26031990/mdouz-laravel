<div class="table-responsive">
    <table class="table" id="keyStorages-table">
        <thead>
            <tr>
                <th>Key</th>
                <th>Value</th>
                <th>Comment</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($keyStorages as $keyStorage)
            <tr>
                <td>{{ $keyStorage->key }}</td>
                <td>{{ $keyStorage->value }}</td>
                <td>{{ $keyStorage->comment }}</td>
                <td>
                    {!! Form::open(['route' => ['keyStorages.destroy', $keyStorage->key], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('keyStorages.show', [$keyStorage->key]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{{ route('keyStorages.edit', [$keyStorage->key]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
