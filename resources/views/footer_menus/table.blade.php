<div class="table-responsive">
    <table class="table" id="footerMenus-table">
        <thead>
            <tr>
                <th>Title</th>
        <th>Key</th>
        <th>Status</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($footerMenus as $footerMenu)
            <tr>
                <td>{{ $footerMenu->title }}</td>
            <td>{{ $footerMenu->key }}</td>
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
