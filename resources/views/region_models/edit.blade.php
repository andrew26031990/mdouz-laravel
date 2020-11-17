@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Region Model
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($regionModel, ['route' => ['region.update', $regionModel->id], 'method' => 'patch']) !!}

                        @include('region_models.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection
