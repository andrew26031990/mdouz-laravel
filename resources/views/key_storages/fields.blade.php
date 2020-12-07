<div class="col-md-12">
    <!-- Custom Tabs -->
    <div class="form-group">
        <label for="link">Ключевое слово</label>
        <input class="form-control" name="word" rows="6" required>
        <input class="form-control" type="text" readonly name="keyword">
    </div>
    <div class="form-group">
        <label class="custom-file-label">Изображение</label>
        <div class="user-image mb-3">
            <div class="imgPreviewTitle"> </div>
        </div>
        <div class="custom-file">
            <input type="file" name="file" id="imageTitle" accept="image/*" class="custom-file-input">
        </div>
    </div>
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
                            <label for="link">Значение</label>
                            <input class="form-control" name="Fields[{{$lang->id}}][value]" rows="6" required>
                            {{--<input type="text" >--}}
                        </div>
                        <div class="form-group">
                            <label for="link">Описание</label>
                            <textarea class="form-control" name="Fields[{{$lang->id}}][comment]" rows="6" required></textarea>
                            {{--<input type="text" >--}}
                        </div>
                    </div>
                </div>
            @endforeach
            <!-- Submit Field -->
            <div class="box-footer">
                <button type="submit" class="btn btn-primary">Создать статью</button>
            </div>
        </div>
        <!-- /.tab-content -->
    </div>

    <!-- nav-tabs-custom -->
</div>
@push('scripts')
    <script type="text/javascript">
        $('input[name="word"]').focusout(function() {
            translitUrl($(this).val());
        })

        function translitUrl(value){
            $.ajax({
                url: '/translit_url/{value}',
                type: 'GET',
                data: { value: value },
                success: function(response)
                {
                    $('input[name="keyword"]').val(response);
                }
            });
        }

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

