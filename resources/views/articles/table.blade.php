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
                <th>Url</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($articles as $article)
            <tr>
                <td>{{ $article->id }}</td>
                <td>{{ $article->ac_name }}</td>
                @foreach($language as $lang)
                    @foreach($article_translate as $article_trans)
                        @if($lang->id == $article_trans->lang_id && $article->id == $article_trans->article_id)
                            <td>{{$article_trans->title}}</td>
                        @endif
                        {{--@if(!$article_trans->lang_id->contains('lang_id', $lang->id) && !$article_trans->article_id->contains('article_id', $article->id))
                            <td></td>
                        @endif--}}
                    @endforeach
                @endforeach
                <td>{{ $article->status }}</td>
                <td>{{ $article->on_main }}</td>
                <td>{{ $article->on_home }}</td>
                <td>{{ $article->menu }}</td>
                <td>{{ $article->url }}</td>
                <td>
                    {!! Form::open(['route' => ['articles.destroy', $article->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        {{--<a href="{{ route('articles.show', [$article->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>--}}
                        <a href="{{ route('articles.edit', [$article->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
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
            <li><a href="{{$articles->previousPageUrl()}}">«</a></li>
            <li><a href="{{$articles->nextPageUrl()}}">»</a></li>
            <li><a href="articles?page={{$articles->lastPage()}}">Last page</a></li>
            <li><a class="disabled">Total: {{$articles->total()}}</a></li>
        </ul>
    </div>
</div>
