<div class="col-md-12">
    <!-- Custom Tabs -->
    <div class="nav-tabs-custom">
        <div class="form-group">
            <label>Категория</label>
            <select class="form-control" name="parent"  @if(strpos(Request::route()->getName(), 'edit')) disabled @endif>
                <option value="">Корневая категория</option>
                @foreach($parentCategories as $parentCat)
                    <option value="{{$parentCat->id}}">{{$parentCat->name}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label>Отобразить в меню</label>
            <select class="form-control" name="menu">
                <option value="1">Да</option>
                <option value="0">Нет</option>
            </select>
        </div>
        <div class="form-group">
            <label>Опубликовать</label>
            <select class="form-control" name="status">
                <option value="1">Да</option>
                <option value="0">Нет</option>
            </select>
        </div>
        <input type="hidden" name="name" value="">
        <ul class="nav nav-tabs">
            @foreach($language as $lang)
                <li class="{{$lang->url == "uz" ? "active" : ""}}"><a href="#{{$lang->url}}" data-toggle="tab" aria-expanded="false">{{$lang->name}}</a></li>
            @endforeach
        </ul>
        <div class="tab-content">
            @foreach($language as $lang)
                <div class="tab-pane {{$lang->url == "uz" ? "active" : ""}}" id="{{$lang->url}}">
                    <div class="box-body">
                        <div class="form-group">
                            <label for="title">Название</label>
                            <input type="text" class="form-control title" name="Fields[{{$lang->id}}][title]" langid="{{$lang->url}}" required>
                        </div>
                        <div class="form-group">
                            <label for="link">Ссылка</label>
                            <input type="text" class="form-control link" name="Fields[{{$lang->id}}][link]" required >
                        </div>
                    </div>
                </div>
            @endforeach
            <div class="box-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
        <!-- /.tab-content -->
    </div>
    <!-- nav-tabs-custom -->
</div>
@push('scripts')
    <script type="text/javascript">
        $('.title').focusout(function() {
            translitUrl($(this).val(), $(this), $(this).attr('langid'));
        })

        function translitUrl(value, input, attr){
            $.ajax({
                url: '/translit_url/{value}',
                type: 'GET',
                data: { value: value },
                success: function(response)
                {
                    if(attr == 'en'){
                        $('input[name="name"]').val(response)
                    }
                    input.closest('div.tab-pane').find('.link').val(response);
                }
            });
        }
    </script>
@endpush
