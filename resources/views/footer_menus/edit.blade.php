@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Footer Menu
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($footerMenu, ['route' => ['footerMenus.update', $footerMenu->id], 'method' => 'patch']) !!}

                        @include('footer_menus.fields_edit')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection
