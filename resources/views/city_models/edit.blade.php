@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            City Model
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($cityModel, ['route' => ['city.update', $cityModel->id], 'method' => 'patch']) !!}

                        @include('city_models.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection
