<div class="col-md-12">
    <!-- Custom Tabs -->
    <div class="nav-tabs-custom">
        <div class="form-group">
            <label>Categories</label>
            <select class="form-control" name="parent"  @if(strpos(Request::route()->getName(), 'edit')) disabled @endif>
                <option value="">Root category</option>
                @foreach($parentCategories as $parentCat)
                    @if(isset($articleCategory))
                        <option value="{{$parentCat->id}}" {{$articleCategory->id == $parentCat->id ? 'selected' : ''}}>{{$parentCat->name}}</option>
                    @else
                        <option value="{{$parentCat->id}}">{{$parentCat->name}}</option>
                    @endif
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label>Show in menu</label>
            <select class="form-control" name="menu">
                @if(isset($articleCategory))
                    <option value="1" {{$articleCategory->menu == 1 ? 'selected' : ''}}>Yes</option>
                    <option value="0" {{$articleCategory->menu == 0 ? 'selected' : ''}}>no</option>
                @else
                    <option value="1">Yes</option>
                    <option value="0">No</option>
                @endif
            </select>
        </div>
        <div class="form-group">
            <label>Published</label>
            <select class="form-control" name="status">
                @if(isset($articleCategory))
                    <option value="1" {{$articleCategory->status == 1 ? 'selected' : ''}}>Yes</option>
                    <option value="0" {{$articleCategory->status == 0 ? 'selected' : ''}}>No</option>
                @else
                    <option value="1">Yes</option>
                    <option value="0">No</option>
                @endif
            </select>
        </div>
        @if(isset($articleCategory))
            <input type="hidden" name="name" value="{{$articleCategory->name}}">
        @else
            <input type="hidden" name="name" value="">
        @endif
        <ul class="nav nav-tabs">
            @foreach($language as $lang)
                <li class="{{$lang->url == "uz" ? "active" : ""}}"><a href="#{{$lang->url}}" data-toggle="tab" aria-expanded="false">{{$lang->name}}</a></li>
            @endforeach
        </ul>
        <div class="tab-content">
            {{--{{dump($translations_lang_array)}}--}}
            @foreach($language as $lang)
                <div class="tab-pane {{$lang->url == "uz" ? "active" : ""}}" id="{{$lang->url}}">
                    @if(in_array((int)$lang->id, $new_array))
                        @foreach($translations as $trans)
                            @if($trans->lang_id == $lang->id)
                                <div class="box-body">
                                    <div class="form-group">
                                        <label for="title">Name</label>
                                        <input type="text" class="form-control title" value="{{$trans->title}}" name="Fields[{{$lang->id}}][title]" langid="{{$lang->url}}" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="link">Link (generates automatically)</label>
                                        <input type="text" class="form-control link" value="{{$trans->slug}}" name="Fields[{{$lang->id}}][link]" required >
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    @else
                        <div class="box-body">
                            <div class="form-group">
                                <label for="title">Name</label>
                                <input type="text" class="form-control title" name="Fields[{{$lang->id}}][title]" langid="{{$lang->url}}" required>
                            </div>
                            <div class="form-group">
                                <label for="link">Link (generates automatically)</label>
                                <input type="text" class="form-control link" name="Fields[{{$lang->id}}][link]" required >
                            </div>
                        </div>
                    @endif
                </div>
            @endforeach

            {{--@foreach($language as $lang)
                <div class="tab-pane {{$lang->url == "uz" ? "active" : ""}}" id="{{$lang->url}}">
                    @if(isset($translations) && count($translations) > 0)
                        @foreach($translations as $trans)
                            @if(property_exists($trans, 'lang_id') && $trans->lang_id == $lang->id)
                                <div class="box-body">
                                    <div class="form-group">
                                        <label for="title">Название</label>
                                        <input type="text" class="form-control title" value="{{$trans->title}}" name="Fields[{{$lang->id}}][title]" langid="{{$lang->url}}" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="link">Ссылка</label>
                                        <input type="text" class="form-control link" value="{{$trans->slug}}" name="Fields[{{$lang->id}}][link]" required >
                                    </div>
                                </div>
                            @else
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
                            @endif
                            --}}{{--@endif--}}{{--
                        @endforeach
                    @else
                        <div class="box-body">
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
                    @endif
                </div>
            @endforeach--}}

            <div class="box-footer">
                <button type="submit" class="btn btn-primary">Update category</button>
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

