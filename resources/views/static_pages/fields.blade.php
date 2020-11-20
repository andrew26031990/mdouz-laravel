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
                        @if(strpos(Request::route()->getName(), 'edit'))
                            {!! Form::model($staticPages, ['route' => ['staticPages.update', $staticPages->id], 'method' => 'patch']) !!}
                        @else
                            {!! Form::open(['route' => 'staticPages.store']) !!}
                        @endif
                            <input type="hidden" class="form-control" name="lang" value="{{$lang->id}}" required>
                            @if(isset($titleTextSlug))
                                @foreach($titleTextSlug as $tTS)
                                    @if($tTS->pt_lang_id == $lang->id)
                                        <div class="form-group">
                                            <label for="title">Заголовок</label>
                                            <input type="text" class="form-control" name="title" id="title" langid="{{$lang->id}}" value="{{$tTS->pt_title}}" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="bigtext">Текст</label>
                                            <textarea id="{{$lang->url}}" class="ckeditor" name="text" required>
                                                {{$tTS->pt_text}}
                                            </textarea>
                                        </div>
                                    @endif
                                @endforeach
                            @else
                                <div class="form-group">
                                    <label for="title">Заголовок</label>
                                    <input type="text" class="form-control" name="title" id="title" langid="{{$lang->id}}" required>
                                </div>
                                <div class="form-group">
                                    <label for="bigtext">Текст</label>
                                    <textarea class="ckeditor" id="{{$lang->url}}" id="bigtext" name="text" required></textarea>
                                </div>
                            @endif
                            <div class="form-group">
                                <label>Шаблон</label>
                                <select class="form-control" name="template_id" required {{strpos(Request::route()->getName(), 'edit') ? 'readonly' : ''}}>
                                    <option value="">Выберите шаблон</option>
                                    @if(isset($templateStatus))
                                        @foreach($templates as $template)
                                            <option value="{{$template->id}}" {{$templateStatus[0]->t_id == $template->id ? 'selected' : ''}}>{{$template->name}}</option>
                                        @endforeach
                                    @else
                                        @foreach($templates as $template)
                                            <option value="{{$template->id}}">{{$template->name}}</option>
                                        @endforeach
                                    @endif
                                </select>
                            </div>
                            @if(isset($titleTextSlug))
                                @foreach($titleTextSlug as $tTS)
                                    @if($tTS->pt_lang_id == $lang->id)
                                        <div class="form-group">
                                            <label for="link">Ссылка</label>
                                            <input type="text" name="link" class="form-control" langid="{{$lang->id}}" value="{{$tTS->pt_slug}}" required>
                                        </div>
                                    @endif
                                @endforeach
                            @else
                                <div class="form-group">
                                    <label for="link">Ссылка</label>
                                    <input type="text" name="link" class="form-control" langid="{{$lang->id}}" required>
                                </div>
                            @endif
                            <div class="form-group">
                                <label>Опубликовать</label>
                                <select class="form-control" name="status">
                                    @if(isset($templateStatus))
                                        <option value="1" {{$templateStatus[0]->p_status === '1' ? 'selected' : ''}}>Да</option>
                                        <option value="0" {{$templateStatus[0]->p_status === '0' ? 'selected' : ''}}>Нет</option>
                                    @else
                                        <option value="1">Да</option>
                                        <option value="0">Нет</option>
                                    @endif
                                </select>
                            </div>
                            <div class="row custom-field additionalBlocks">
                                <div class="col-md-12" style="margin-bottom: 30px"><b>Дополнительные поля: </b></div>
                                @if(isset($customFieldTranslate))
                                    <?php $i=0; ?>
                                    @foreach($customFieldTranslate as $customFieldTrans)
                                        @if($customFieldTrans->lang_id == $lang->id)
                                            <div class="col-md-4 name-block">
                                                <div class="form-group field-customfield-0-name">
                                                    <label class="control-label">Название поля</label>
                                                    <input type="text" id="customfield-0-name" class="form-control" maxlength="255" aria-invalid="true" name="CustomField[<?php echo $i ?>][{{$customFieldTrans->name}}]" value="{{$customFieldTrans->name}}" readonly>
                                                </div>
                                            </div>
                                            <div class="col-md-8 text-block">
                                                <div class="form-group">
                                                    <label class="control-label" for="customfield-0-text">Текст поля на текущем языке</label>
                                                    <textarea id="customfield-0-text" class="form-control" name="CustomField[<?php echo $i ?>][{{$customFieldTrans->name}}]" rows="3">{{$customFieldTrans->text}}</textarea>
                                                </div>
                                            </div>
                                            <?php $i++; ?>
                                        @endif
                                    @endforeach
                                @endif
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
