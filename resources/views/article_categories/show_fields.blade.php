<!-- Parent Id Field -->
<div class="form-group">
    {!! Form::label('parent_id', 'Parent Id:') !!}
    <p>{{ $articleCategory->parent_id }}</p>
</div>

<!-- Status Field -->
<div class="form-group">
    {!! Form::label('status', 'Status:') !!}
    <p>{{ $articleCategory->status }}</p>
</div>

<!-- Menu Field -->
<div class="form-group">
    {!! Form::label('menu', 'Menu:') !!}
    <p>{{ $articleCategory->menu }}</p>
</div>

