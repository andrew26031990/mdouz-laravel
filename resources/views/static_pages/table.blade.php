<div class="table-responsive">
    <table class="table" id="staticPages-table">
        <thead>
            <tr>
                <th>View</th>
        <th>Status</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($staticPages as $staticPages)
            <tr>
                <td>{{ $staticPages->view }}</td>
            <td>{{ $staticPages->status }}</td>
                <td>
                    {!! Form::open(['route' => ['staticPages.destroy', $staticPages->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('staticPages.show', [$staticPages->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{{ route('staticPages.edit', [$staticPages->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
<script type="text/javascript">
    $(document).ready(function (){
       alert();
    });
    /*
    $('.add-custom-field').on('click', function (){
        alert();
    });*/
</script>
