<div class="table-responsive">
    <table class="table" id="events-table">
        <thead>
            <tr>
                <th>Category</th>
        <th>Date Events</th>
        <th>Longitude</th>
        <th>Latitude</th>
        <th>Address</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($events as $event)
            <tr>
                <td>{{ $event->ac_name }}</td>
            <td>{{ gmdate("Y-m-d\TH:i:s\Z", $event->date_events) }}</td>
            <td>{{ $event->longitude }}</td>
            <td>{{ $event->latitude }}</td>
            <td>{{ $event->address }}</td>
                <td>
                    {!! Form::open(['route' => ['events.destroy', $event->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        {{--<a href="{{ route('events.show', [$event->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>--}}
                        <a href="{{ route('events.edit', [$event->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <div class="box-footer clearfix">
        <ul class="pagination pagination-sm no-margin pull-right">
            <li><a href="{{$events->previousPageUrl()}}">«</a></li>
            <li><a href="{{$events->nextPageUrl()}}">»</a></li>
            <li><a class="disabled">Total: {{$events->total()}}</a></li>
        </ul>
    </div>
</div>
