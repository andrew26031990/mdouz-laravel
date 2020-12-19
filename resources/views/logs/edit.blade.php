@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Logs
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($logs, ['route' => ['logs.update', $logs->id], 'method' => 'patch']) !!}

                        @include('logs.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection