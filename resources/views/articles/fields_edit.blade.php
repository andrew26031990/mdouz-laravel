<div class="col-md-12">
    <!-- Custom Tabs -->
    <div class="nav-tabs-custom">
        <div class="form-group">
            <label>Categories</label>
            <select class="form-control" name="category_id">
                @foreach($categories as $cat)
                    <option value="{{$cat->id}}" {{$article->category_id == $cat->id ? 'selected' : ''}}>{{$cat->name}}</option>
                @endforeach
            </select>
            <div class="form-group">
                <label class="custom-file-label">Change article image (640 x 400)</label>
                <div class="user-image mb-3">
                    @if($article->thumbnail_base_url !== null)
                        <img style="width: 200px; height: 100px;" src="{{url($article->thumbnail_base_url).'/'.$article->thumbnail_path }}">
                    @endif
                </div>
                <div class="user-image mb-3">
                    <div class="imgPreviewTitle">

                    </div>
                </div>
                <div class="custom-file">
                    <input type="file" name="file" id="imageTitle" accept="image/*" class="custom-file-input">
                </div>
            </div>
            <div class="form-group">
                @if(count($article_attachments) > 0)
                    <label class="custom-file-label">Attached files</label>
                    @foreach($article_attachments as $article_attachment)
                        <button type="button" class="btn btn-primary">
                            {{$article_attachment->path}} <a class="badge badge-light" onclick="return confirm('Вы действительно хотите удалить изображение?')" attachment_id="{{$article_attachment->id}}">x</a>
                        </button>
                    @endforeach
                @else
                    <label class="custom-file-label">No attached files</label>
                @endif
                <div class="user-image mb-3">
                    <div class="imgPreview">

                    </div>
                </div>
                <br><label class="custom-file-label">Attach files</label>
                <div class="custom-file">
                    <input type="file" name="attachment[]" id="images" class="custom-file-input" multiple>
                </div>
            </div>
            <div class="form-group">
                <label>Published</label>
                <select class="form-control" name="status">
                    <option value="1" {{$article->status == 1 ? 'selected' : ''}}>Yes</option>
                    <option value="0" {{$article->status == 0 ? 'selected' : ''}}>No</option>
                </select>
            </div>
            <div class="form-group">
                <label>On main</label>
                <select class="form-control" name="on_main">
                    <option value="1" {{$article->on_main == 1 ? 'selected' : ''}}>Yes</option>
                    <option value="0" {{$article->on_main == 0 ? 'selected' : ''}}>No</option>
                </select>
            </div>
            <div class="form-group">
                <label>Large size press center</label>
                <select class="form-control" name="on_home">
                    <option value="1" {{$article->on_home == 1 ? 'selected' : ''}}>Yes</option>
                    <option value="0" {{$article->on_home == 0 ? 'selected' : ''}}>No</option>
                </select>
            </div>
            <div class="form-group">
                <label>Display in the menu</label>
                <select class="form-control" name="menu">
                    <option value="1" {{$article->menu == 1 ? 'selected' : ''}}>Yes</option>
                    <option value="0" {{$article->menu == 0 ? 'selected' : ''}}>No</option>
                </select>
            </div>
            <input type="hidden" name="article_id" value="{{$article->id}}">
        </div>
        <ul class="nav nav-tabs">
            @foreach($language as $lang)
                <li class="{{$lang->url == "uz" ? "active" : ""}}"><a href="#{{$lang->url}}" data-toggle="tab" aria-expanded="false">{{$lang->name}}</a></li>
            @endforeach
        </ul>
        <div class="tab-content">
            @foreach($language as $lang)
                <div class="tab-pane {{$lang->url == "uz" ? "active" : ""}}" id="{{$lang->url}}">
                    @if(in_array((int)$lang->id, $lang_array))
                        @foreach($article_translate as $article_trans)
                            @if($article_trans->lang_id == $lang->id)
                                <div class="box-body">
                                    <div class="form-group">
                                        <label for="title">Article name</label>
                                        <input type="text" class="form-control title" name="Fields[{{$lang->id}}][title]" langid="{{$lang->url}}" value="{{$article_trans->title}}" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="link">Article link (generates automatically)</label>
                                        <input type="text" class="form-control link" name="Fields[{{$lang->id}}][link]" value="{{$article_trans->slug}}" required >
                                    </div>
                                    <div class="form-group">
                                        <label for="link">Description</label>
                                        <textarea class="form-control description ckeditor" name="Fields[{{$lang->id}}][description]" rows="6" required>{{$article_trans->description}}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="link">Text</label>
                                        <textarea class="form-control description ckeditor" name="Fields[{{$lang->id}}][body]" rows="6" required>{{$article_trans->body}}</textarea>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    @else
                        <div class="box-body">
                            <div class="form-group">
                                <label for="title">Article name</label>
                                <input type="text" class="form-control title" name="Fields[{{$lang->id}}][title]" langid="{{$lang->url}}" required>
                            </div>
                            <div class="form-group">
                                <label for="link">Article link (generates automatically)</label>
                                <input type="text" class="form-control link" name="Fields[{{$lang->id}}][link]" required >
                            </div>
                            <div class="form-group">
                                <label for="link">Description</label>
                                <textarea class="form-control description ckeditor" name="Fields[{{$lang->id}}][description]" rows="6" required></textarea>
                            </div>
                            <div class="form-group">
                                <label for="link">Text</label>
                                <textarea class="form-control description ckeditor" name="Fields[{{$lang->id}}][body]" rows="6" required></textarea>
                            </div>
                        </div>
                    @endif
                </div>
        @endforeach
        <!-- Submit Field -->
            <div class="box-footer">
                <button type="submit" class="btn btn-primary">Update article</button>
            </div>
        </div>
        <!-- /.tab-content -->
    </div>
    <!-- nav-tabs-custom -->
</div>
@push('scripts')
    <script type="text/javascript">
        $('#published_at').datetimepicker({
            format: 'DD-MM-YYYY',//YYYY-MM-DD
            minDate: new Date(),
            useCurrent: true,
            sideBySide: true
        })

        $('.badge-light').click(function() {
            deleteAttachment($(this).attr('attachment_id'));
        })

        function deleteAttachment(attachment_id){
            $.ajax({
                url: '/deleteAttachment/{attachment_id}',
                type: 'GET',
                data: { attachment_id: attachment_id },
                success: function(response)
                {
                    $('.badge-light[attachment_id="'+attachment_id+'"]').parent('button').remove();
                }
            });
        }

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

        //Get geoposition and address BEGIN

        ymaps.ready(init);
        let myMap, myPlacemark;

        function init () {
            myMap = new ymaps.Map("map", {
                center: [41.311151, 69.279737], // Углич
                zoom: 11
            }, {
                balloonMaxWidth: 200,
                searchControlProvider: 'yandex#search'
            });

            var coords = null;
            myMap.events.add('click', function (e) {
                coords = e.get('coords');
                myMap.geoObjects.remove(myPlacemark);
                $('input[name="longitude"]').val(coords[1].toPrecision(6))
                $('input[name="latitude"]').val(coords[0].toPrecision(6))
                myPlacemark = new ymaps.Placemark([coords[0].toPrecision(6), coords[1].toPrecision(6)], {}, {
                    draggable: false
                });
                myMap.geoObjects.add(myPlacemark);
                getAddress(coords[0].toPrecision(6), coords[1].toPrecision(6));
            });
        }



        function getAddress(lat, lng){
            var url = "https://geocode-maps.yandex.ru/1.x/?lang=ru_RU&apikey=b8898ad5-c549-4f72-aef9-9686e958fba4&geocode=" + lng + "," + lat + "&format=json";
            jQuery.ajax({
                type: "GET",
                url: url,
                dataType: "JSON", timeout: 30000, async: false,
                error: function (xhr) {
                    rescont = 'Ошибка геокодирования: ' + xhr.status + ' ' + xhr.statusText;
                },
                success: function (html) {
                    res = html;
                    var geores = res.response.GeoObjectCollection.featureMember;
                    rescont = geores[0].GeoObject.metaDataProperty.GeocoderMetaData.Address.formatted;
                    $('input[name="address"]').val(rescont);
                }
            });
        }
        //Get geoposition and address END

        //Image preview BEGIN
        $(function() {
            // Multiple images preview with JavaScript
            var multiImgPreview = function(input, imgPreviewPlaceholder) {
                console.log(input.files);
                if (input.files) {
                    var filesAmount = input.files.length;

                    for (i = 0; i < filesAmount; i++) {
                        var reader = new FileReader();

                        reader.onload = function(event) {
                            $($.parseHTML('<img style="width: 200px; height: 100px;">')).attr('src', event.target.result).appendTo(imgPreviewPlaceholder);
                        }

                        reader.readAsDataURL(input.files[i]);
                    }
                }

            };

            $('#images').on('change', function() {
                $('div.imgPreview').html('');
                multiImgPreview(this, 'div.imgPreview');
            });

            $('#imageTitle').on('change', function() {
                $('div.imgPreviewTitle').html('');
                multiImgPreview(this, 'div.imgPreviewTitle');
            });
        });
        //Image preview END
    </script>
@endpush
