<!-- View Field -->
<div class="form-group">
    {!! Form::label('view', 'View:') !!}
    <p>{{ $article->view }}</p>
</div>

<!-- Category Id Field -->
<div class="form-group">
    {!! Form::label('category_id', 'Category Id:') !!}
    <p>{{ $article->category_id }}</p>
</div>

<!-- Thumbnail Base Url Field -->
<div class="form-group">
    {!! Form::label('thumbnail_base_url', 'Thumbnail Base Url:') !!}
    <p>{{ $article->thumbnail_base_url }}</p>
</div>

<!-- Thumbnail Path Field -->
<div class="form-group">
    {!! Form::label('thumbnail_path', 'Thumbnail Path:') !!}
    <p>{{ $article->thumbnail_path }}</p>
</div>

<!-- Status Field -->
<div class="form-group">
    {!! Form::label('status', 'Status:') !!}
    <p>{{ $article->status }}</p>
</div>

<!-- On Main Field -->
<div class="form-group">
    {!! Form::label('on_main', 'On Main:') !!}
    <p>{{ $article->on_main }}</p>
</div>

<!-- On Home Field -->
<div class="form-group">
    {!! Form::label('on_home', 'On Home:') !!}
    <p>{{ $article->on_home }}</p>
</div>

<!-- Menu Field -->
<div class="form-group">
    {!! Form::label('menu', 'Menu:') !!}
    <p>{{ $article->menu }}</p>
</div>

<!-- Created By Field -->
<div class="form-group">
    {!! Form::label('created_by', 'Created By:') !!}
    <p>{{ $article->created_by }}</p>
</div>

<!-- Updated By Field -->
<div class="form-group">
    {!! Form::label('updated_by', 'Updated By:') !!}
    <p>{{ $article->updated_by }}</p>
</div>

<!-- Published At Field -->
<div class="form-group">
    {!! Form::label('published_at', 'Published At:') !!}
    <p>{{ $article->published_at }}</p>
</div>

<!-- Url Field -->
<div class="form-group">
    {!! Form::label('url', 'Url:') !!}
    <p>{{ $article->url }}</p>
</div>

