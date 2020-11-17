@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            User Model
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($userModel, ['route' => ['user.update', $userModel->id], 'method' => 'patch']) !!}

                        @include('user_models.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection
