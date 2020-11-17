@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Timeline Event Model
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($timelineEventModel, ['route' => ['timelineEvent.update', $timelineEventModel->id], 'method' => 'patch']) !!}

                        @include('timeline_event_models.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection
