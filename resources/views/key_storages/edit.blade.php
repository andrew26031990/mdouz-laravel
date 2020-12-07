@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Key Storage
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($keyStorage, ['route' => ['keyStorages.update', $keyStorage->id], 'method' => 'patch', 'files' =>true, 'enctype'=>'multipart/form-data']) !!}

                   @include('key_storages.fields_edit')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection

