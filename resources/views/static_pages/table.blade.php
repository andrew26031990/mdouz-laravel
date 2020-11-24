<div class="table-responsive">
    <table class="table" id="staticPages-table">
        <thead>
            <tr>
                @foreach($language as $lang)
                    <th>{{$lang->name}}</th>
                @endforeach
                <th>Опубликовано</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($staticPages as $staticPage)
            <tr>
                @foreach($pageTranslate as $pageTrans)
                    @if($staticPage->id == $pageTrans->pt_page_id)
                        @foreach($language as $lang)
                            @if(($lang->id == $pageTrans->pt_lang_id))
                                <th>{{$pageTrans->pt_title}}</th>
                            @endif
                        @endforeach
                    @endif
                @endforeach
                <td>{{ $staticPage->status == 1 ? 'Да' : 'Нет' }}</td>
                <td>
                    {!! Form::open(['route' => ['staticPages.destroy', $staticPage->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('staticPages.show', [$staticPage->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{{ route('staticPages.edit', [$staticPage->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
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
