<!-- Application Field -->
<div class="form-group">
    {!! Form::label('application', 'Application:') !!}
    <p>{{ $timelineEventModel->application }}</p>
</div>

<!-- Category Field -->
<div class="form-group">
    {!! Form::label('category', 'Category:') !!}
    <p>{{ $timelineEventModel->category }}</p>
</div>

<!-- Event Field -->
<div class="form-group">
    {!! Form::label('event', 'Event:') !!}
    <p>{{ $timelineEventModel->event }}</p>
</div>

<!-- Data Field -->
<div class="form-group">
    {!! Form::label('data', 'Data:') !!}
    <p>{{ $timelineEventModel->data }}</p>
</div>

