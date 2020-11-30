<div class="col-md-12">
    <!-- Custom Tabs -->
    <div class="nav-tabs-custom">
        <div class="form-group">
            <label>Категория</label>
            <select class="form-control" name="category_id"  @if(strpos(Request::route()->getName(), 'edit')) disabled @endif>
                @foreach($categories as $cat)
                    <option value="{{$cat->id}}">{{$cat->name}}</option>
                @endforeach
            </select>
            {{--<div class="form-group">
                <label for="education_document_date">Дата публикации</label>
                <input class="form-control date" required id="published_at" name="published_at" type="text">
            </div>--}}
            <div class="form-group">
                <label class="custom-file-label">Изображение статьи</label>
                <div class="user-image mb-3">
                    <div class="imgPreviewTitle"> </div>
                </div>
                <div class="custom-file">
                    <input type="file" name="file" id="imageTitle" accept="image/*" class="custom-file-input">
                </div>
            </div>
            <div class="form-group">
                <label class="custom-file-label">Прикрепленные файлы</label>
                <div class="user-image mb-3">
                    <div class="imgPreview"> </div>
                </div>
                <div class="custom-file">
                    <input type="file" name="attachment[]" id="images" class="custom-file-input" multiple>
                </div>
            </div>
            <div class="form-group">
                <label>Опубликовано</label>
                <select class="form-control" name="status">
                    <option value="1">Да</option>
                    <option value="0">Нет</option>
                </select>
            </div>
            <div class="form-group">
                <label>На главной</label>
                <select class="form-control" name="on_main">
                    <option value="1">Да</option>
                    <option value="0">Нет</option>
                </select>
            </div>
            <div class="form-group">
                <label>В большой размере пресс-центра</label>
                <select class="form-control" name="on_home">
                    <option value="1">Да</option>
                    <option value="0">Нет</option>
                </select>
            </div>
            <div class="form-group">
                <label>Вывести в меню</label>
                <select class="form-control" name="menu">
                    <option value="1">Да</option>
                    <option value="0">Нет</option>
                </select>
            </div>
        </div>
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
                            <label for="title">Название статьи</label>
                            <input type="text" class="form-control title" name="Fields[{{$lang->id}}][title]" langid="{{$lang->url}}" required>
                        </div>
                        <div class="form-group">
                            <label for="link">Ссылка статьи</label>
                            <input type="text" class="form-control link" name="Fields[{{$lang->id}}][link]" required >
                        </div>
                        <div class="form-group">
                            <label for="link">Краткое описание</label>
                            <textarea class="form-control description" name="Fields[{{$lang->id}}][description]" rows="6" required></textarea>
                            {{--<input type="text" >--}}
                        </div>
                        <div class="form-group">
                            <label for="link">Текст</label>
                            <textarea class="form-control description" name="Fields[{{$lang->id}}][body]" rows="6" required></textarea>
                            {{--<input type="text" >--}}
                        </div>
                    </div>
                </div>
        @endforeach
        <!-- Submit Field -->
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
        $('#published_at').datetimepicker({
            format: 'DD-MM-YYYY',//YYYY-MM-DD
            minDate: new Date(),
            useCurrent: true,
            sideBySide: true
        })

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

            //myMap.behaviors.disable('scrollZoom');
            //myMap.behaviors.disable('drag');

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

            /*myPlacemark.events.add("dragend", function (e) {
                coords_placemark = this.geometry.getCoordinates();
                console.log(coords_placemark);
            }, myPlacemark);*/


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

        /*$(".add_timetable").click(function() {
            let lang_id = $(this).attr('langid');
            let i = $('i.fa-minus[langid=' + lang_id + ']').length;
            let timetable= $('.timetable_panel_' + lang_id).eq(0).clone();
            timetable.find('input').each(function() {
                this.value = '';
                this.name= this.name.replace('[0]', '['+ i +']');
            });
            timetable.insertAfter($('.timetable_panel_' + lang_id).last());
            //$('.timetable_panel_' + lang_id).first().clone().insertAfter($('.timetable_panel_' + lang_id).last())
        })

        $("body").on("click", ".fa.fa-minus", function(event) {
            let lang_id = $(this).attr('langid');
            if($('i.fa-minus[langid=' + lang_id + ']').length > 1){
                $('.timetable_panel_' + lang_id).last().remove();
            }
        });*/

        //for different language add array name to time table tomorrow
    </script>
@endpush
{{--<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('articles.index') }}" class="btn btn-default">Cancel</a>
</div>--}}
