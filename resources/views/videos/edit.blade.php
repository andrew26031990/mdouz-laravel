@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Video
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($video, ['route' => ['videos.update', $video->id], 'method' => 'patch', 'files' =>true, 'enctype'=>'multipart/form-data']) !!}

                        @include('videos.fields_edit')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection
