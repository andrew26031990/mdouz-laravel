<!-- Event Field -->
<div class="form-group">
    {!! Form::label('event', 'Event:') !!}
    <p>{{ $logs->event }}</p>
</div>

<!-- Description Field -->
<div class="form-group">
    {!! Form::label('description', 'Description:') !!}
    <p>{{ $logs->description }}</p>
</div>

<!-- Date Field -->
<div class="form-group">
    {!! Form::label('date', 'Date:') !!}
    <p>{{ $logs->date }}</p>
</div>

