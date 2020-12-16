<div class="table-responsive">
    <table class="table" id="social-table">
        <thead>
            <tr>
                <th>Name</th>
        <th>Link</th>
        <th>Icon</th>
        <th>Sort</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($social as $socialModel)
            <tr>
                <td>{{ $socialModel->name }}</td>
            <td>{{ $socialModel->link }}</td>
            <td>{{ $socialModel->icon }}</td>
            <td>{{ $socialModel->sort }}</td>
                <td>
                    {!! Form::open(['route' => ['social.destroy', $socialModel->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        {{--<a href="{{ route('social.show', [$socialModel->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>--}}
                        <a href="{{ route('social.edit', [$socialModel->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
