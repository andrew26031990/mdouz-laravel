<div class="table-responsive">
    <table class="table" id="videos-table">
        <thead>
            <tr>
                <th>Category</th>
                @foreach($language as $lang)
                    <th>{{$lang->name}}</th>
                @endforeach
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($videos as $video)
            <tr>
                <td>{{ $video->ac_name }}</td>
                @foreach($language as $lang)
                    @if($video_translate->whereIn('video_id', $video->v_id)->whereIn('lang_id', $lang->id)->count() > 0)
                        <td><a href="{{ route('videos.edit', [$video->v_id]) }}">{{$video_translate->whereIn('video_id', $video->v_id)->whereIn('lang_id', $lang->id)->first()->title}}</a></td>
                    @else
                        <td style="color: red">(нет перевода, tarjima yo'q)</td>
                    @endif
                @endforeach
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
@push('scripts')
    <script type="text/javascript">
        $('#videos-table').DataTable();
    </script>
@endpush
