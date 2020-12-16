<!-- Category Id Field -->
<div class="form-group">
    {!! Form::label('category_id', 'Category Id:') !!}
    <p>{{ $video->category_id }}</p>
</div>

<!-- Photo Path Field -->
<div class="form-group">
    {!! Form::label('photo_path', 'Photo Path:') !!}
    <p>{{ $video->photo_path }}</p>
</div>

<!-- Photo Base Path Field -->
<div class="form-group">
    {!! Form::label('photo_base_path', 'Photo Base Path:') !!}
    <p>{{ $video->photo_base_path }}</p>
</div>

