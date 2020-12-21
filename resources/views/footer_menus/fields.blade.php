<div class="col-md-12">
    <!-- Custom Tabs -->
    <div class="nav-tabs-custom">
        <div class="form-group">
            <div class="form-group">
                <label for="exampleInputEmail1">Footer menu key</label>
                <input type="text" class="form-control" name="key">
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
                                <label for="title">Footer menu name</label>
                                <input type="text" class="form-control title" name="Fields[{{$lang->id}}][title]" langid="{{$lang->url}}" required>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="form-group">
                <label>Published</label>
                <select class="form-control" name="status">
                    <option value="1">Yes</option>
                    <option value="0">No</option>
                </select>
            </div>
            <div class="form-group">
                <label>Select articles</label>
                <select multiple="multiple" class="form-control multipleSelectArticles" name="articles[]">
                    @foreach($articles as $article)
                        <option value="{{$article->id}}">{{$article->title}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <!-- Submit Field -->
            <div class="box-footer">
                <button type="submit" class="btn btn-primary">Create footer menu</button>
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

