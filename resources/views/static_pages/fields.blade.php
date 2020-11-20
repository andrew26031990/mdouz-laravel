<div class="col-md-12">
    <!-- Custom Tabs -->
    <div class="nav-tabs-custom">
        <ul class="nav nav-tabs">
            @foreach($language as $lang)
                <li class="{{$lang->url == "uz" ? "active" : ""}}"><a href="#{{$lang->url}}" data-toggle="tab" aria-expanded="false">{{$lang->name}}</a></li>
            @endforeach
        </ul>
        <div class="tab-content">
            @foreach($language as $lang)
                <div class="tab-pane {{$lang->url == "uz" ? "active" : ""}}" id="{{$lang->url}}">
                    <div class="box-body">
                        {!! Form::open(['route' => 'staticPages.store']) !!}
                            <input type="hidden" class="form-control" name="lang" value="{{$lang->id}}" required>
                            <div class="form-group">
                                <label for="title">Заголовок</label>
                                <input type="text" class="form-control" name="title" id="title" langid="{{$lang->id}}" required>
                            </div>
                            <div class="form-group">
                                <label for="bigtext">Текст</label>
                                <textarea class="ckeditor" id="{{$lang->url}}" id="bigtext" name="text" required>

                                </textarea>
                            </div>
                            <div class="form-group">
                                <label>Шаблон</label>
                                <select class="form-control" name="template_id" required>
                                    <option value="">Выберите шаблон</option>
                                    @foreach($templates as $template)
                                        <option value="{{$template->id}}">{{$template->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="link">Ссылка</label>
                                <input type="text" name="link" class="form-control" langid="{{$lang->id}}" required>
                            </div>
                            <div class="form-group">
                                <label>Опубликовать</label>
                                <select class="form-control" name="status">
                                    <option value="1">Да</option>
                                    <option value="0">Нет</option>
                                </select>
                            </div>
                            <div class="row custom-field additionalBlocks">

                            </div>
                            <div class="box-footer">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            @endforeach
        </div>
        <!-- /.tab-content -->
    </div>
    <!-- nav-tabs-custom -->
</div>
@push('scripts')
    <script type="text/javascript">
        $('select[name="template_id"]').on('change', function() {
            let id = $(this).val();
            getTemplateFields(id);
        });
        function getTemplateFields(id){
            $.ajax({
                url: '/getTemplateFields/{id}',
                type: 'GET',
                data: { id: id },
                success: function(response)
                {
                    $('.additionalBlocks').html('');
                    $('.additionalBlocks').append(response);
                }
            });
        }
        $('input[name="title"]').focusout(function() {
            translitUrl($(this).val(), $(this));
        })

        function translitUrl(value, input){
            $.ajax({
                url: '/translit_url/{value}',
                type: 'GET',
                data: { value: value },
                success: function(response)
                {
                    input.closest('div.tab-pane').find('input[name="link"]').val(response);
                }
            });
        }
    </script>
@endpush
