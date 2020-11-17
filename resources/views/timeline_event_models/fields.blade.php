<!-- Application Field -->
<div class="form-group col-sm-6">
    {!! Form::label('application', 'Application:') !!}
    {!! Form::text('application', null, ['class' => 'form-control','maxlength' => 64,'maxlength' => 64]) !!}
</div>

<!-- Category Field -->
<div class="form-group col-sm-6">
    {!! Form::label('category', 'Category:') !!}
    {!! Form::text('category', null, ['class' => 'form-control','maxlength' => 64,'maxlength' => 64]) !!}
</div>

<!-- Event Field -->
<div class="form-group col-sm-6">
    {!! Form::label('event', 'Event:') !!}
    {!! Form::text('event', null, ['class' => 'form-control','maxlength' => 64,'maxlength' => 64]) !!}
</div>

<!-- Data Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('data', 'Data:') !!}
    {!! Form::textarea('data', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('timelineEvent.index') }}" class="btn btn-default">Cancel</a>
</div>
