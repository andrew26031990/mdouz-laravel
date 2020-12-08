{{--<div class="table-responsive">
    <table class="table" id="timelineEvent-table">
        <thead>
            <tr>
                <th>Application</th>
        <th>Category</th>
        <th>Event</th>
        <th>Data</th>
                --}}{{--<th colspan="3">Action</th>--}}{{--
            </tr>
        </thead>
        <tbody>
        @foreach($timelineEvent as $timelineEventModel)
            <tr>
                <td>{{ $timelineEventModel->application }}</td>
            <td>{{ $timelineEventModel->category }}</td>
            <td>{{ $timelineEventModel->event }}</td>
            <td>{{ $timelineEventModel->data }}</td>
--}}{{--                <td>
                    {!! Form::open(['route' => ['timelineEvent.destroy', $timelineEventModel->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('timelineEvent.show', [$timelineEventModel->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{{ route('timelineEvent.edit', [$timelineEventModel->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>--}}{{--
            </tr>
        @endforeach
        </tbody>
    </table>
</div>--}}
<div class="timeline-container timeline-theme-1" style="margin-bottom: 15px">
    <div class="timeline js-timeline">
        @foreach($timelineEvent as $timelineEventModel)
            <div data-time="{{ gmdate("Y-m-d", $timelineEventModel->created_at) }}">
                {{ $timelineEventModel->data }}
            </div>
        @endforeach
    </div>
</div>

