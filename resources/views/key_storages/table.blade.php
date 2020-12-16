<div class="table-responsive">
    <table class="table" id="keyStorages-table">
        <thead>
            <tr>
                <th>Id</th>
                <th>Keyword</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($keyStorages as $keyStorage)
            <tr>
                <td>{{ $keyStorage->id }}</td>
                <td>{{ $keyStorage->keyword }}</td>
                <td>
                    {!! Form::open(['route' => ['keyStorages.destroy', $keyStorage->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        {{--<a href="{{ route('keyStorages.show', [$keyStorage->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>--}}
                        <a href="{{ route('keyStorages.edit', [$keyStorage->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
