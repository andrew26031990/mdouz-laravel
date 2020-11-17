<div class="table-responsive">
    <table class="table" id="user-table">
        <thead>
            <tr>
                <th>Username</th>
        <th>Email</th>
        <th>Status</th>
        <th>Logged At</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($user as $userModel)
            <tr>
                <td>{{ $userModel->username }}</td>
            <td>{{ $userModel->email }}</td>
            <td>{{ $userModel->status }}</td>
            <td>{{ gmdate("Y-m-d\TH:i:s\Z", $userModel->logged_at) }}</td>
                <td>
                    {!! Form::open(['route' => ['user.destroy', $userModel->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('user.show', [$userModel->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{{ route('user.edit', [$userModel->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
