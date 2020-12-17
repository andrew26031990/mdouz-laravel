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
                    {!! Form::open(['route' => 'footerMenus.store']) !!}

                        @include('footer_menus.fields')

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
