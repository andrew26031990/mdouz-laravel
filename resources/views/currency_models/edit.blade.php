@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Currency Model
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($currencyModel, ['route' => ['currency.update', $currencyModel->id], 'method' => 'patch']) !!}

                        @include('currency_models.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection
