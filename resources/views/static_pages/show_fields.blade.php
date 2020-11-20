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
                        @foreach($titleTextSlug as $tTS)
                            @if($tTS->pt_lang_id == $lang->id)
                                <div class="form-group">
                                    <label for="title">Заголовок</label>
                                    <div>{{$tTS->pt_title}}</div>
                                </div>
                                <div class="form-group">
                                    <label for="bigtext">Текст</label>
                                    <textarea class="ckeditor" id="bigtext123" name="text" disabled>
                                        {{$tTS->pt_text}}
                                    </textarea>
                                </div>
                            @endif
                        @endforeach
                        <div class="form-group">
                            <label>Шаблон</label>
                            <div>{{$templateStatus[0]->t_name}}</div>
                        </div>
                        @foreach($titleTextSlug as $tTS)
                            @if($tTS->pt_lang_id == $lang->id)
                                <div class="form-group">
                                    <label for="link">Ссылка</label>
                                    <div>{{$tTS->pt_slug}}</div>
                                </div>
                            @endif
                        @endforeach
                        <div class="form-group">
                            <label>Опубликовано</label>
                            <div>{{$templateStatus[0]->p_status == 1 ? 'Да' : 'Нет'}}</div>
                        </div>
                        <div class="row custom-field additionalBlocks">
                            <div class="col-md-12" style="margin-bottom: 30px"><b>Дополнительные поля</b></div>
                            @foreach($customFieldTranslate as $customFieldTrans)
                                @if($customFieldTrans->lang_id == $lang->id)
                                    <div class="col-md-4 name-block">
                                        <div class="form-group field-customfield-0-name">
                                            <label class="control-label">Название поля</label>
                                            <input type="text" id="customfield-0-name" class="form-control" maxlength="255" aria-invalid="true" value="{{$customFieldTrans->name}}" disabled>
                                        </div>
                                    </div>
                                    <div class="col-md-8 text-block">
                                        <div class="form-group">
                                            <label class="control-label" for="customfield-0-text">Текст поля на текущем языке</label>
                                            <textarea id="customfield-0-text" class="form-control" rows="3" disabled>{{$customFieldTrans->text}}</textarea>
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <!-- /.tab-content -->
    </div>
    <!-- nav-tabs-custom -->
</div>

{{--
<!-- View Field -->
<div class="form-group">
    {!! Form::label('view', 'View:') !!}
    <p>{{ $staticPages->view }}</p>
</div>

<!-- Status Field -->
<div class="form-group">
    {!! Form::label('status', 'Status:') !!}
    <p>{{ $staticPages->status }}</p>
</div>
--}}

