<div class="table-responsive">
    <table class="table" id="videos-table">
        <thead>
            <tr>
                <th>Category</th>
                <th>Photo Path</th>
                <th>Photo Base Path</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($videos as $video)
            <tr>
                <td>{{ $video->ac_name }}</td>
                <td>{{ $video->v_pp }}</td>
                <td>{{ $video->v_pbp }}</td>
                <td>
                    {!! Form::open(['route' => ['videos.destroy', $video->v_id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('videos.edit', [$video->v_id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
