<div class="col-md-12">
    <!-- Custom Tabs -->
    <div class="nav-tabs-custom">
        <div class="form-group">
            <label>Категория</label>
            <select class="form-control" name="parent"  @if(strpos(Request::route()->getName(), 'edit')) disabled @endif>
                @foreach($categories as $cat)
                    <option value="{{$cat->id}}">{{$cat->name}}</option>
                @endforeach
            </select>
            <div class="form-group">
                <label for="education_document_date">Дата события</label>
                <input class="form-control date" required id="date_events" name="date_event" type="text">
            </div>
            <div class="form-group">
                <div class="user-image mb-3">
                    <div class="imgPreview"> </div>
                </div>
                <div class="custom-file">
                    <label class="custom-file-label">Выберите одно или несколько изображений для события</label>
                    <input type="file" name="imageFile[]" accept="image/*" id="images" class="custom-file-input" multiple required>
                </div>
            </div>
            <div class="form-group">
                <label for="education_document_date">Адрес</label>
                <input class="form-control date" required name="address" type="text">
            </div>
            <input type="hidden" name="longitude" required>
            <input type="hidden" name="latitude" required>
        </div>
        <div style="height: 500px;margin-bottom: 15px">
            <div id="map" style="width: 100%; height: 100%; padding: 0; margin: 0;"></div>
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
                            <label for="title">Название</label>
                            <input type="text" class="form-control title" name="Fields[{{$lang->id}}][title]" langid="{{$lang->url}}" required>
                        </div>
                        <div class="form-group">
                            <label for="link">Ссылка</label>
                            <input type="text" class="form-control link" name="Fields[{{$lang->id}}][link]" required >
                        </div>
                    </div>
                    <div class="dynamicform_wrapper">
                        <div class="panel panel-default" id="panel_parent_{{$lang->id}}">
                            <div class="panel-heading">
                                <i class="fa fa-envelope"></i> Timetable
                                <button type="button" class="pull-right add-item btn btn-success btn-xs add_timetable" langid="{{$lang->id}}"><i class="fa fa-plus"></i> Add Timetable</button>
                                <div class="clearfix"></div>
                            </div>
                            <div class="panel-body container-items timetable_panel_{{$lang->id}}"><!-- widgetContainer -->
                                <div class="item panel panel-default"><!-- widgetBody -->
                                    <div class="panel-heading">
                                        <span class="panel-title-address">Timetable: 1</span>
                                        <button type="button" class="pull-right remove-item btn btn-danger btn-xs"><i class="fa fa-minus" langid="{{$lang->id}}"></i></button>
                                        <div class="clearfix"></div>
                                    </div>
                                    <div class="panel-body">
                                        <div class="form-group field-eventstimetable-0-full_name required">
                                            <label class="control-label" for="eventstimetable-0-full_name">Полное название</label>
                                            <input type="text" id="eventstimetable-0-full_name" class="form-control" name="EventsTimetable[0][full_name]" maxlength="255" aria-invalid="true">
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div class="form-group field-eventstimetable-0-date_to required">
                                                    <label class="control-label" for="eventstimetable-0-date_to">Дата начала</label>
                                                    <input type="text" id="eventstimetable-0-date_to" class="form-control" name="EventsTimetable[0][date_to]">

                                                    <p class="help-block help-block-error"></p>
                                                </div>                        </div>
                                            <div class="col-sm-6">
                                                <div class="form-group field-eventstimetable-0-date_from required">
                                                    <label class="control-label" for="eventstimetable-0-date_from">Дата окончания</label>
                                                    <input type="text" id="eventstimetable-0-date_from" class="form-control" name="EventsTimetable[0][date_from]" aria-invalid="true">
                                                </div>
                                            </div>
                                        </div><!-- end:row -->
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div class="form-group field-eventstimetable-0-location">
                                                    <label class="control-label" for="eventstimetable-0-location">Локауия</label>
                                                    <input type="text" id="eventstimetable-0-location" class="form-control" name="EventsTimetable[0][location]" maxlength="255">

                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group field-eventstimetable-0-position required">
                                                    <label class="control-label" for="eventstimetable-0-position">Место проведения</label>
                                                    <input type="text" id="eventstimetable-0-position" class="form-control" name="EventsTimetable[0][position]" maxlength="255">

                                                </div>
                                            </div>
                                        </div><!-- end:row -->
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div class="form-group field-eventstimetable-0-timetable_title required">
                                                    <label class="control-label" for="eventstimetable-0-timetable_title">Timetable Title</label>
                                                    <input type="text" id="eventstimetable-0-timetable_title" class="form-control" name="EventsTimetable[0][timetable_title]" maxlength="255">

                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group field-eventstimetable-0-timetable_description required">
                                                    <label class="control-label" for="eventstimetable-0-timetable_description">Timetable Description</label>
                                                    <input type="text" class="form-control" name="EventsTimetable[0][timetable_description]">
                                                </div>
                                            </div>
                                        </div><!-- end:row -->
                                    </div>
                                </div>
                            </div>
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
        $('#date_events').datetimepicker({
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
        });
        //Image preview END

        $(".add_timetable").click(function() {
            let lang_id = $(this).attr('langid');
            let i = $('i.fa-minus[langid=' + lang_id + ']').length;
            let timetable= $('.timetable_panel_' + lang_id).eq(0).clone();
            timetable.find('input').each(function() {
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
        });

        //for different language add array name to time table tomorrow
    </script>
@endpush

