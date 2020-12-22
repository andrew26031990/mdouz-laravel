<div class="table-responsive">
    <table class="table" id="footerMenus-table">
        <thead>
            <tr>
                <th>Key</th>
                @foreach($language as $lang)
                    <th>{{$lang->name}}</th>
                @endforeach
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($footerMenus as $footerMenu)
            <tr>
                <td>{{ $footerMenu->key }}</td>
                @foreach($language as $lang)
                    @if($footerMenusTranslate->whereIn('footer_menu_id', $footerMenu->id)->whereIn('lang_id', $lang->id)->count() > 0)
                        <td><a href="{{ route('footerMenus.edit', [$footerMenu->id]) }}">{{$footerMenusTranslate->whereIn('footer_menu_id', $footerMenu->id)->whereIn('lang_id', $lang->id)->first()->title}}</a></td>
                    @else
                        <td style="color: red">(нет перевода, tarjima yo'q)</td>
                    @endif
                @endforeach
                <td>{{ $footerMenu->status }}</td>
                <td>
                    {!! Form::open(['route' => ['footerMenus.destroy', $footerMenu->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('footerMenus.edit', [$footerMenu->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
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
        $('#footerMenus-table').DataTable();
    </script>
@endpush
