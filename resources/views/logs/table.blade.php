<div class="table-responsive">
    <table class="table" id="logs-table">
        <thead>
            <tr>
                <th>Event</th>
        <th>Description</th>
                <th>IP address</th>
        <th>Date</th>

                {{--<th colspan="3">Action</th>--}}
            </tr>
        </thead>
        <tbody>
        @foreach($logs as $logs)
            <tr>
                <td>{{ $logs->event }}</td>
            <td>{{ $logs->description }}</td>
                <td>{{ $logs->ip }}</td>
            <td>{{ $logs->date }}</td>
            {{--<td>
                {!! Form::open(['route' => ['logs.destroy', $logs->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{{ route('logs.show', [$logs->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{{ route('logs.edit', [$logs->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>--}}
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
