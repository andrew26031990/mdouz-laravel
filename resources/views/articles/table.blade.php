<div class="table-responsive">
    <table class="table" id="articles-table">
        <thead>
        <tr>
            <th>Id</th>
            <th>Category</th>
            @foreach($language as $lang)
                <th>{{$lang->name}}</th>
            @endforeach
            <th>Status</th>
            <th>On Main</th>
            <th>On Home</th>
            <th>Menu</th>
            {{--<th>Url</th>--}}
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($articles as $article)
            <tr>
                <td>{{ $article->id }}</td>
                <td>{{ $article->ac_name }}</td>
                @foreach($language as $lang)
                    @if($article_translate->whereIn('article_id', $article->id)->whereIn('lang_id', $lang->id)->count() > 0)
                        <td><a href="{{ route('articles.edit', [$article->id]) }}">{{$article_translate->whereIn('article_id', $article->id)->whereIn('lang_id', $lang->id)->first()->title}}</a></td>
                    @else
                        <td style="color: red">(нет перевода, tarjima yo'q)</td>
                    @endif
                @endforeach
                <td>{{ $article->status }}</td>
                <td>{{ $article->on_main }}</td>
                <td>{{ $article->on_home }}</td>
                <td>{{ $article->menu }}</td>
                {{--<td>{{ $article->url }}</td>--}}
                <td>
                    {!! Form::open(['route' => ['articles.destroy', $article->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('articles.edit', [$article->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
@if(Auth::user()->role == 'admin')
    <h1>Deleted articles</h1>
    <div class="table-responsive">
        <table class="table" id="trashed-table">
            <thead>
            <tr>
                <th>Id</th>
                <th>Category</th>
                <th>Status</th>
                @foreach($language as $lang)
                    <th>{{$lang->name}}</th>
                @endforeach
                <th>On Main</th>
                <th>On Home</th>
                <th>Menu</th>
                {{--<th>Url</th>--}}
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($trashed as $trash)
                <tr>
                    <td>{{ $trash->id }}</td>
                    <td>{{ $trash->ac_name }}</td>
                    <td>{{ $trash->status }}</td>
                    @foreach($language as $lang)
                        @if($article_translate->whereIn('article_id', $trash->id)->whereIn('lang_id', $lang->id)->count() > 0)
                            <td><a href="{{ route('articles.edit', [$trash->id]) }}">{{$article_translate->whereIn('article_id', $trash->id)->whereIn('lang_id', $lang->id)->first()->title}}</a></td>
                        @else
                            <td style="color: red">(нет перевода, tarjima yo'q)</td>
                        @endif
                    @endforeach
                    <td>{{ $trash->on_main }}</td>
                    <td>{{ $trash->on_home }}</td>
                    <td>{{ $trash->menu }}</td>
                    {{--<td>{{ $trash->url }}</td>--}}
                    <td>
                        <div class='btn-group'>
                            <a href="{{route('article_restore', ['id' => $trash->id])}}" onclick = "return confirm('Are you sure want to restore?')" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-refresh"></i></a>
                        </div>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        {{--<div class="box-footer clearfix">
            <ul class="pagination pagination-sm no-margin pull-right">
                <li><a href="{{$trashed->previousPageUrl()}}">«</a></li>
                <li><a href="{{$trashed->nextPageUrl()}}">»</a></li>
                <li><a href="trashed?page={{$trashed->lastPage()}}">Last page</a></li>
                <li><a class="disabled">Total: {{$trashed->total()}}</a></li>
            </ul>
        </div>--}}
    </div>
@endif
@push('scripts')
    <script type="text/javascript">
        $('#articles-table').DataTable();
        $('#trashed-table').DataTable();
    </script>
@endpush
