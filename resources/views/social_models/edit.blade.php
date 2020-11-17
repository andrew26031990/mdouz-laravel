@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Social Model
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($socialModel, ['route' => ['social.update', $socialModel->id], 'method' => 'patch']) !!}

                        @include('social_models.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection
