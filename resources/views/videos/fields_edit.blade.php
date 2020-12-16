<div class="col-md-12">
    <!-- Custom Tabs -->
    <div class="nav-tabs-custom">
        <div class="form-group">
            <label>Categories</label>
            <select class="form-control" name="category_id">
                @foreach($categories as $cat)
                    <option value="{{$cat->id}}" {{$video->category_id == $cat->id ? 'selected' : ''}}>{{$cat->name}}</option>
                @endforeach
            </select>
            <div class="form-group">
                <label class="custom-file-label">Video image</label>
                <div class="user-image mb-3">
                    <div class="imgPreviewTitle">
                        @if(file_exists(public_path().$video->photo_base_path.'/'.$video->photo_path))
                            <img style="width: 200px; height: 100px;" src="{{url($video->photo_base_path.'/'.$video->photo_path)}}">
                        @endif
                    </div>
                </div>
                <label class="custom-file-label">Change video image</label>
                <div class="custom-file">
                    <input type="file" name="video_image" id="imageTitle" accept="image/*" class="custom-file-input">
                </div>
            </div>
            <input name="created_at" type="hidden" value="{{time()}}" />
            <input name="updated_at" type="hidden" value="{{time()}}" />
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
                        @foreach($video_translate as $video_trans)
                            @if($video_trans->lang_id == $lang->id)
                                <div class="box-body">
                                    <div class="form-group">
                                        <label for="title">Video title</label>
                                        <input type="text" class="form-control title" name="Fields[{{$lang->id}}][title]" langid="{{$lang->url}}" value="{{$video_trans->title}}" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="link">Video link (generates automatically)</label>
                                        <input type="text" class="form-control link" name="Fields[{{$lang->id}}][link]" value="{{$video_trans->slug}}" required >
                                    </div>
                                    <div class="form-group">
                                        <label class="custom-file-label">Current video</label><br>
                                        <video class="articles-block-img-wrapper" controls width="400" height="200">
                                            @if(file_exists(public_path().$video_trans->video_base_url.'/'.$video_trans->video_path))
                                                <source src = "{{url($video_trans->video_base_url.'/'.$video_trans->video_path)}}" type="video/mp4">
                                            @endif
                                        </video>
                                    </div>
                                    <div class="form-group">
                                        <label class="custom-file-label">Change video</label>
                                        <div class="custom-file">
                                            <input type="file" name="Fields[{{$lang->id}}][video]" id="imageTitle" accept="video/*" class="custom-file-input">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        {{--<svg viewBox="0 0 2000 1600" preserveAspectRatio="xMidYMid meet" focusable="false" class="style-scope ytd-topbar-logo-renderer" style="pointer-events: none; display: block; width: 100%; height: 100%;"><g viewBox="0 0 200 60" preserveAspectRatio="xMidYMid meet" class="style-scope ytd-topbar-logo-renderer"><g class="style-scope ytd-topbar-logo-renderer"><path fill="#FF0000" d="M63,14.87c-0.72-2.7-2.85-4.83-5.56-5.56C52.54,8,32.88,8,32.88,8S13.23,8,8.32,9.31 c-2.7,0.72-4.83,2.85-5.56,5.56C1.45,19.77,1.45,30,1.45,30s0,10.23,1.31,15.13c0.72,2.7,2.85,4.83,5.56,5.56 C13.23,52,32.88,52,32.88,52s19.66,0,24.56-1.31c2.7-0.72,4.83-2.85,5.56-5.56C64.31,40.23,64.31,30,64.31,30 S64.31,19.77,63,14.87z" class="style-scope ytd-topbar-logo-renderer"></path><polygon fill="#FFFFFF" points="26.6,39.43 42.93,30 26.6,20.57" class="style-scope ytd-topbar-logo-renderer"></polygon></g><g class="style-scope ytd-topbar-logo-renderer"><g id="youtube-paths" class="style-scope ytd-topbar-logo-renderer"><path fill="#282828" d="M92.69,48.03c-1.24-0.84-2.13-2.14-2.65-3.91c-0.52-1.77-0.79-4.12-0.79-7.06v-4 c0-2.97,0.3-5.35,0.9-7.15c0.6-1.8,1.54-3.11,2.81-3.93c1.27-0.82,2.94-1.24,5.01-1.24c2.04,0,3.67,0.42,4.9,1.26 c1.23,0.84,2.13,2.15,2.7,3.93c0.57,1.78,0.85,4.16,0.85,7.12v4c0,2.94-0.28,5.3-0.83,7.08c-0.55,1.78-1.45,3.09-2.7,3.91 c-1.24,0.82-2.93,1.24-5.06,1.24C95.65,49.29,93.93,48.87,92.69,48.03z M99.66,43.71c0.34-0.9,0.52-2.37,0.52-4.4v-8.59 c0-1.98-0.17-3.42-0.52-4.34c-0.34-0.91-0.95-1.37-1.82-1.37c-0.84,0-1.43,0.46-1.78,1.37c-0.34,0.91-0.52,2.36-0.52,4.34v8.59 c0,2.04,0.16,3.51,0.49,4.4c0.33,0.9,0.93,1.35,1.8,1.35C98.71,45.06,99.31,44.61,99.66,43.71z" class="style-scope ytd-topbar-logo-renderer"></path><path fill="#282828" d="M188.16,37.13v1.39c0,1.77,0.05,3.09,0.16,3.98c0.1,0.88,0.32,1.53,0.65,1.93 c0.33,0.4,0.84,0.61,1.53,0.61c0.93,0,1.57-0.36,1.91-1.08c0.34-0.72,0.53-1.92,0.56-3.6l5.35,0.31 c0.03,0.24,0.04,0.57,0.04,0.99c0,2.55-0.7,4.45-2.09,5.71c-1.39,1.26-3.36,1.89-5.91,1.89c-3.06,0-5.2-0.96-6.43-2.88 c-1.23-1.92-1.84-4.88-1.84-8.9v-4.81c0-4.14,0.64-7.15,1.91-9.06c1.27-1.9,3.45-2.85,6.54-2.85c2.13,0,3.76,0.39,4.9,1.17 c1.14,0.78,1.94,1.99,2.41,3.64c0.46,1.65,0.7,3.93,0.7,6.83v4.72H188.16z M188.95,25.53c-0.31,0.39-0.52,1.03-0.63,1.91 c-0.11,0.88-0.16,2.23-0.16,4.02v1.98h4.54v-1.98c0-1.77-0.06-3.11-0.18-4.02c-0.12-0.91-0.34-1.56-0.65-1.93 c-0.31-0.37-0.8-0.56-1.46-0.56C189.75,24.94,189.26,25.14,188.95,25.53z" class="style-scope ytd-topbar-logo-renderer"></path><path fill="#282828" d="M77.59,36.61l-7.06-25.49h6.16l2.47,11.55c0.63,2.85,1.09,5.27,1.39,7.28h0.18 c0.21-1.44,0.67-3.85,1.39-7.24l2.56-11.6h6.16L83.7,36.61v12.23h-6.11V36.61z" class="style-scope ytd-topbar-logo-renderer"></path><path fill="#282828" d="M126.45,21.28v27.55h-4.85l-0.54-3.37h-0.13c-1.32,2.55-3.3,3.82-5.93,3.82c-1.83,0-3.18-0.6-4.05-1.8 c-0.87-1.2-1.3-3.07-1.3-5.62V21.28h6.2v20.23c0,1.23,0.13,2.11,0.4,2.63c0.27,0.52,0.72,0.79,1.35,0.79 c0.54,0,1.06-0.16,1.55-0.49c0.49-0.33,0.86-0.75,1.1-1.26V21.28H126.45z" class="style-scope ytd-topbar-logo-renderer"></path><path fill="#282828" d="M158.27,21.28v27.55h-4.85l-0.54-3.37h-0.13c-1.32,2.55-3.3,3.82-5.93,3.82c-1.83,0-3.18-0.6-4.05-1.8 c-0.87-1.2-1.3-3.07-1.3-5.62V21.28h6.2v20.23c0,1.23,0.13,2.11,0.4,2.63c0.27,0.52,0.72,0.79,1.35,0.79 c0.54,0,1.06-0.16,1.55-0.49c0.49-0.33,0.86-0.75,1.1-1.26V21.28H158.27z" class="style-scope ytd-topbar-logo-renderer"></path><path fill="#282828" d="M143.31,16.11h-6.16v32.72h-6.07V16.11h-6.16v-4.99h18.38V16.11z" class="style-scope ytd-topbar-logo-renderer"></path><path fill="#282828" d="M178.8,25.69c-0.38-1.74-0.98-3-1.82-3.78c-0.84-0.78-1.99-1.17-3.46-1.17c-1.14,0-2.2,0.32-3.19,0.97 c-0.99,0.64-1.75,1.49-2.29,2.54h-0.05l0-14.52h-5.98v39.11h5.12l0.63-2.61h0.13c0.48,0.93,1.2,1.66,2.16,2.2 c0.96,0.54,2.02,0.81,3.19,0.81c2.1,0,3.64-0.97,4.63-2.9c0.99-1.93,1.48-4.95,1.48-9.06v-4.36 C179.36,29.84,179.17,27.43,178.8,25.69z M173.11,36.93c0,2.01-0.08,3.58-0.25,4.72c-0.16,1.14-0.44,1.95-0.83,2.43 c-0.39,0.48-0.91,0.72-1.57,0.72c-0.51,0-0.98-0.12-1.42-0.36c-0.43-0.24-0.79-0.6-1.06-1.08V27.71 c0.21-0.75,0.57-1.36,1.08-1.84c0.51-0.48,1.06-0.72,1.66-0.72c0.63,0,1.12,0.25,1.46,0.74c0.34,0.49,0.58,1.33,0.72,2.49 c0.13,1.17,0.2,2.83,0.2,4.99V36.93z" class="style-scope ytd-topbar-logo-renderer"></path></g></g></g></svg>--}}
                                        <label for="link">Youtube link</label>
                                        <input class="form-control" name="Fields[{{$lang->id}}][youtube]" rows="6" value="{{$video_trans->youtube_url}}" type="text">
                                    </div>
                                    <div class="form-group">
                                        <label for="link">Video description</label>
                                        <textarea class="form-control description ckeditor" name="Fields[{{$lang->id}}][description]" rows="6" required>{!! $video_trans->description !!}</textarea>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    @else
                        <div class="box-body">
                            <div class="form-group">
                                <label for="title">Video title</label>
                                <input type="text" class="form-control title" name="Fields[{{$lang->id}}][title]" langid="{{$lang->url}}" required>
                            </div>
                            <div class="form-group">
                                <label for="link">Video link (generates automatically)</label>
                                <input type="text" class="form-control link" name="Fields[{{$lang->id}}][link]" required >
                            </div>
                            <div class="form-group">
                                <label class="custom-file-label">Video</label>
                                <div class="custom-file">
                                    <input type="file" name="Fields[{{$lang->id}}][video]" id="imageTitle" accept="video/*" class="custom-file-input" required>
                                </div>
                            </div>
                            <div class="form-group">
                                {{--<svg viewBox="0 0 2000 1600" preserveAspectRatio="xMidYMid meet" focusable="false" class="style-scope ytd-topbar-logo-renderer" style="pointer-events: none; display: block; width: 100%; height: 100%;"><g viewBox="0 0 200 60" preserveAspectRatio="xMidYMid meet" class="style-scope ytd-topbar-logo-renderer"><g class="style-scope ytd-topbar-logo-renderer"><path fill="#FF0000" d="M63,14.87c-0.72-2.7-2.85-4.83-5.56-5.56C52.54,8,32.88,8,32.88,8S13.23,8,8.32,9.31 c-2.7,0.72-4.83,2.85-5.56,5.56C1.45,19.77,1.45,30,1.45,30s0,10.23,1.31,15.13c0.72,2.7,2.85,4.83,5.56,5.56 C13.23,52,32.88,52,32.88,52s19.66,0,24.56-1.31c2.7-0.72,4.83-2.85,5.56-5.56C64.31,40.23,64.31,30,64.31,30 S64.31,19.77,63,14.87z" class="style-scope ytd-topbar-logo-renderer"></path><polygon fill="#FFFFFF" points="26.6,39.43 42.93,30 26.6,20.57" class="style-scope ytd-topbar-logo-renderer"></polygon></g><g class="style-scope ytd-topbar-logo-renderer"><g id="youtube-paths" class="style-scope ytd-topbar-logo-renderer"><path fill="#282828" d="M92.69,48.03c-1.24-0.84-2.13-2.14-2.65-3.91c-0.52-1.77-0.79-4.12-0.79-7.06v-4 c0-2.97,0.3-5.35,0.9-7.15c0.6-1.8,1.54-3.11,2.81-3.93c1.27-0.82,2.94-1.24,5.01-1.24c2.04,0,3.67,0.42,4.9,1.26 c1.23,0.84,2.13,2.15,2.7,3.93c0.57,1.78,0.85,4.16,0.85,7.12v4c0,2.94-0.28,5.3-0.83,7.08c-0.55,1.78-1.45,3.09-2.7,3.91 c-1.24,0.82-2.93,1.24-5.06,1.24C95.65,49.29,93.93,48.87,92.69,48.03z M99.66,43.71c0.34-0.9,0.52-2.37,0.52-4.4v-8.59 c0-1.98-0.17-3.42-0.52-4.34c-0.34-0.91-0.95-1.37-1.82-1.37c-0.84,0-1.43,0.46-1.78,1.37c-0.34,0.91-0.52,2.36-0.52,4.34v8.59 c0,2.04,0.16,3.51,0.49,4.4c0.33,0.9,0.93,1.35,1.8,1.35C98.71,45.06,99.31,44.61,99.66,43.71z" class="style-scope ytd-topbar-logo-renderer"></path><path fill="#282828" d="M188.16,37.13v1.39c0,1.77,0.05,3.09,0.16,3.98c0.1,0.88,0.32,1.53,0.65,1.93 c0.33,0.4,0.84,0.61,1.53,0.61c0.93,0,1.57-0.36,1.91-1.08c0.34-0.72,0.53-1.92,0.56-3.6l5.35,0.31 c0.03,0.24,0.04,0.57,0.04,0.99c0,2.55-0.7,4.45-2.09,5.71c-1.39,1.26-3.36,1.89-5.91,1.89c-3.06,0-5.2-0.96-6.43-2.88 c-1.23-1.92-1.84-4.88-1.84-8.9v-4.81c0-4.14,0.64-7.15,1.91-9.06c1.27-1.9,3.45-2.85,6.54-2.85c2.13,0,3.76,0.39,4.9,1.17 c1.14,0.78,1.94,1.99,2.41,3.64c0.46,1.65,0.7,3.93,0.7,6.83v4.72H188.16z M188.95,25.53c-0.31,0.39-0.52,1.03-0.63,1.91 c-0.11,0.88-0.16,2.23-0.16,4.02v1.98h4.54v-1.98c0-1.77-0.06-3.11-0.18-4.02c-0.12-0.91-0.34-1.56-0.65-1.93 c-0.31-0.37-0.8-0.56-1.46-0.56C189.75,24.94,189.26,25.14,188.95,25.53z" class="style-scope ytd-topbar-logo-renderer"></path><path fill="#282828" d="M77.59,36.61l-7.06-25.49h6.16l2.47,11.55c0.63,2.85,1.09,5.27,1.39,7.28h0.18 c0.21-1.44,0.67-3.85,1.39-7.24l2.56-11.6h6.16L83.7,36.61v12.23h-6.11V36.61z" class="style-scope ytd-topbar-logo-renderer"></path><path fill="#282828" d="M126.45,21.28v27.55h-4.85l-0.54-3.37h-0.13c-1.32,2.55-3.3,3.82-5.93,3.82c-1.83,0-3.18-0.6-4.05-1.8 c-0.87-1.2-1.3-3.07-1.3-5.62V21.28h6.2v20.23c0,1.23,0.13,2.11,0.4,2.63c0.27,0.52,0.72,0.79,1.35,0.79 c0.54,0,1.06-0.16,1.55-0.49c0.49-0.33,0.86-0.75,1.1-1.26V21.28H126.45z" class="style-scope ytd-topbar-logo-renderer"></path><path fill="#282828" d="M158.27,21.28v27.55h-4.85l-0.54-3.37h-0.13c-1.32,2.55-3.3,3.82-5.93,3.82c-1.83,0-3.18-0.6-4.05-1.8 c-0.87-1.2-1.3-3.07-1.3-5.62V21.28h6.2v20.23c0,1.23,0.13,2.11,0.4,2.63c0.27,0.52,0.72,0.79,1.35,0.79 c0.54,0,1.06-0.16,1.55-0.49c0.49-0.33,0.86-0.75,1.1-1.26V21.28H158.27z" class="style-scope ytd-topbar-logo-renderer"></path><path fill="#282828" d="M143.31,16.11h-6.16v32.72h-6.07V16.11h-6.16v-4.99h18.38V16.11z" class="style-scope ytd-topbar-logo-renderer"></path><path fill="#282828" d="M178.8,25.69c-0.38-1.74-0.98-3-1.82-3.78c-0.84-0.78-1.99-1.17-3.46-1.17c-1.14,0-2.2,0.32-3.19,0.97 c-0.99,0.64-1.75,1.49-2.29,2.54h-0.05l0-14.52h-5.98v39.11h5.12l0.63-2.61h0.13c0.48,0.93,1.2,1.66,2.16,2.2 c0.96,0.54,2.02,0.81,3.19,0.81c2.1,0,3.64-0.97,4.63-2.9c0.99-1.93,1.48-4.95,1.48-9.06v-4.36 C179.36,29.84,179.17,27.43,178.8,25.69z M173.11,36.93c0,2.01-0.08,3.58-0.25,4.72c-0.16,1.14-0.44,1.95-0.83,2.43 c-0.39,0.48-0.91,0.72-1.57,0.72c-0.51,0-0.98-0.12-1.42-0.36c-0.43-0.24-0.79-0.6-1.06-1.08V27.71 c0.21-0.75,0.57-1.36,1.08-1.84c0.51-0.48,1.06-0.72,1.66-0.72c0.63,0,1.12,0.25,1.46,0.74c0.34,0.49,0.58,1.33,0.72,2.49 c0.13,1.17,0.2,2.83,0.2,4.99V36.93z" class="style-scope ytd-topbar-logo-renderer"></path></g></g></g></svg>--}}
                                <label for="link">Youtube link</label>
                                <input class="form-control" name="Fields[{{$lang->id}}][youtube]" rows="6" type="text">
                            </div>
                            <div class="form-group">
                                <label for="link">Video description</label>
                                <textarea class="form-control description ckeditor" name="Fields[{{$lang->id}}][description]" rows="6" required></textarea>
                            </div>
                        </div>
                    @endif
                </div>
        @endforeach
        <!-- Submit Field -->
            <div class="box-footer">
                <button type="submit" class="btn btn-primary">Update video</button>
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
