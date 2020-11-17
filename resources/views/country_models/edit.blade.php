@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Country Model
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($countryModel, ['route' => ['country.update', $countryModel->id], 'method' => 'patch']) !!}

                        @include('country_models.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection
