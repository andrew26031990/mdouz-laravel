<div class="table-responsive">
    <table class="table" id="articleCategories-table">
        <thead>
            <tr>
                <th>Название категории</th>
                @foreach($language as $lang)
                    <th>{{$lang->name}}</th>
                @endforeach
                <th>Status</th>
                <th>Menu</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($articleCategories as $articleCategory)
            <tr>
                <td>{{ $articleCategory->name}}</td>
                @foreach($language as $lang)
                    @if($article_category_translate->whereIn('article_category_id', $articleCategory->id)->whereIn('lang_id', $lang->id)->count() > 0)
                        <td><a href="{{ route('articleCategories.edit', [$articleCategory->id]) }}">{{$article_category_translate->whereIn('article_category_id', $articleCategory->id)->whereIn('lang_id', $lang->id)->first()->title}}</a></td>
                    @else
                        <td style="color: red">(нет перевода, tarjima yo'q)</td>
                    @endif
                @endforeach
                <td>{{ $articleCategory->status == 1 ? 'Опубликовано' : 'Не опубликовано'}}</td>
                <td>{{ $articleCategory->menu == 1 ? 'Отображено в меню' : 'Не отображено в меню'}}</td>
                <td>
                    {!! Form::open(['route' => ['articleCategories.destroy', $articleCategory->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        {{--<a href="{{ route('articleCategories.show', [$articleCategory->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>--}}
                        <a href="{{ route('articleCategories.edit', [$articleCategory->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    {{--<div class="box-footer clearfix">
        <ul class="pagination pagination-sm no-margin pull-right">
            <li><a href="{{$articleCategories->previousPageUrl()}}">«</a></li>
            <li><a href="{{$articleCategories->nextPageUrl()}}">»</a></li>
            <li><a class="disabled">Total: {{$articleCategories->total()}}</a></li>
        </ul>
    </div>--}}
</div>
@push('scripts')
    <script type="text/javascript">
        $('#articleCategories-table').DataTable();
    </script>
@endpush
