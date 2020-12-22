<div class="col-md-12">
    <!-- Custom Tabs -->
    <div class="nav-tabs-custom">
        <div class="form-group">
            <div class="form-group">
                <label for="exampleInputEmail1">Footer menu key</label>
                <input type="text" class="form-control" name="key" value="{{$footerMenu->key}}">
            </div>
            <ul class="nav nav-tabs">
                @foreach($language as $lang)
                    <li class="{{$lang->url == "uz" ? "active" : ""}}"><a href="#{{$lang->url}}" data-toggle="tab" aria-expanded="false">{{$lang->name}}</a></li>
                @endforeach
            </ul>
            <div class="tab-content">
                @foreach($language as $lang)
                    <div class="tab-pane {{$lang->url == "uz" ? "active" : ""}}" id="{{$lang->url}}">
                        @foreach($footer_menu_translate as $fmt)
                            @if($fmt->lang_id == $lang->id)
                                <div class="box-body">
                                    <div class="form-group">
                                        <label for="title">Footer menu name</label>
                                        <input type="text" class="form-control title" name="Fields[{{$lang->id}}][title]" langid="{{$lang->url}}" value="{{$fmt->title}}" required>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    </div>
                @endforeach
            </div>
            <div class="form-group">
                <label>Published</label>
                <select class="form-control" name="status">
                    <option value="1" {{ $footerMenu->status == 1 ? 'selected' : '' }}>Yes</option>
                    <option value="0" {{ $footerMenu->status == 0 ? 'selected' : '' }}>No</option>
                </select>
            </div>
            <div class="form-group">
                <label>Select articles</label>
                <select multiple="multiple" class="form-control multipleSelectArticles" name="articles[]">
                    @foreach($articles as $article)
                        @if(in_array($article->id, $uploaded_articles))
                            <option value="{{$article->id}}" selected>{{$article->title}}</option>
                        @else
                            <option value="{{$article->id}}">{{$article->title}}</option>
                        @endif
                    @endforeach
                </select>
            </div>
        </div>
        <!-- Submit Field -->
            <div class="box-footer">
                <button type="submit" class="btn btn-primary">Update footer menu</button>
            </div>
        </div>
        <!-- /.tab-content -->
    </div>
    <!-- nav-tabs-custom -->
</div>
@push('scripts')
    <script type="text/javascript">
        $('.multipleSelectArticles').select2();
    </script>
@endpush

