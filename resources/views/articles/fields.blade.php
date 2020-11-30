<!-- View Field -->
<div class="form-group col-sm-6">
    {!! Form::label('view', 'View:') !!}
    {!! Form::text('view', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255]) !!}
</div>

<!-- Category Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('category_id', 'Category Id:') !!}
    {!! Form::number('category_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Thumbnail Base Url Field -->
<div class="form-group col-sm-6">
    {!! Form::label('thumbnail_base_url', 'Thumbnail Base Url:') !!}
    {!! Form::text('thumbnail_base_url', null, ['class' => 'form-control','maxlength' => 1024,'maxlength' => 1024]) !!}
</div>

<!-- Thumbnail Path Field -->
<div class="form-group col-sm-6">
    {!! Form::label('thumbnail_path', 'Thumbnail Path:') !!}
    {!! Form::text('thumbnail_path', null, ['class' => 'form-control','maxlength' => 1024,'maxlength' => 1024]) !!}
</div>

<!-- Status Field -->
<div class="form-group col-sm-6">
    {!! Form::label('status', 'Status:') !!}
    {!! Form::number('status', null, ['class' => 'form-control']) !!}
</div>

<!-- On Main Field -->
<div class="form-group col-sm-6">
    {!! Form::label('on_main', 'On Main:') !!}
    <label class="checkbox-inline">
        {!! Form::hidden('on_main', 0) !!}
        {!! Form::checkbox('on_main', '1', null) !!}
    </label>
</div>


<!-- On Home Field -->
<div class="form-group col-sm-6">
    {!! Form::label('on_home', 'On Home:') !!}
    {!! Form::number('on_home', null, ['class' => 'form-control']) !!}
</div>

<!-- Menu Field -->
<div class="form-group col-sm-6">
    {!! Form::label('menu', 'Menu:') !!}
    {!! Form::number('menu', null, ['class' => 'form-control']) !!}
</div>

<!-- Created By Field -->
<div class="form-group col-sm-6">
    {!! Form::label('created_by', 'Created By:') !!}
    {!! Form::number('created_by', null, ['class' => 'form-control']) !!}
</div>

<!-- Updated By Field -->
<div class="form-group col-sm-6">
    {!! Form::label('updated_by', 'Updated By:') !!}
    {!! Form::number('updated_by', null, ['class' => 'form-control']) !!}
</div>

<!-- Published At Field -->
<div class="form-group col-sm-6">
    {!! Form::label('published_at', 'Published At:') !!}
    {!! Form::number('published_at', null, ['class' => 'form-control']) !!}
</div>

<!-- Url Field -->
<div class="form-group col-sm-6">
    {!! Form::label('url', 'Url:') !!}
    {!! Form::text('url', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255]) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('articles.index') }}" class="btn btn-default">Cancel</a>
</div>
