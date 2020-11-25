<div class="table-responsive">
    <table class="table" id="events-table">
        <thead>
            <tr>
                <th>Category Id</th>
        <th>Date Events</th>
        <th>Longitude</th>
        <th>Latitude</th>
        <th>Address</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($events as $events)
            <tr>
                <td>{{ $events->category_id }}</td>
            <td>{{ $events->date_events }}</td>
            <td>{{ $events->longitude }}</td>
            <td>{{ $events->latitude }}</td>
            <td>{{ $events->address }}</td>
                <td>
                    {!! Form::open(['route' => ['events.destroy', $events->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('events.show', [$events->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{{ route('events.edit', [$events->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
