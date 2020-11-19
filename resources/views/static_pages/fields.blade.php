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
                        <div class="form-group">
                            <label for="title">Заголовок</label>
                            <input type="text" class="form-control" name="title" id="title" required>
                        </div>
                        <div class="form-group">
                            <label for="bigtext">Текст</label>
                            <textarea class="ckeditor" id="{{$lang->url}}" id="bigtext" required>

                            </textarea>
                        </div>
                        <div class="form-group">
                            <label>Шаблон</label>
                            <select class="form-control" name="template">
                                <option value="">Выберите шаблон</option>
                                @foreach($templates as $template)
                                    <option value="{{$template->id}}">{{$template->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="link">Ссылка</label>
                            <input type="text" name="link" class="form-control" id="link" required>
                        </div>
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" name="published" required> Опубликовать
                            </label>
                        </div>
                    </div>
                    <div class="row custom-field additionalBlocks">

                    </div>
                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
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
        $('select[name="template"]').on('change', function() {
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
    </script>
@endpush


{{--<!-- View Field -->
<div class="form-group col-sm-6">
    {!! Form::label('view', 'View:') !!}
    {!! Form::text('view', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255]) !!}
</div>

<!-- Status Field -->
<div class="form-group col-sm-6">
    {!! Form::label('status', 'Status:') !!}
    {!! Form::number('status', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('staticPages.index') }}" class="btn btn-default">Cancel</a>
</div>--}}
