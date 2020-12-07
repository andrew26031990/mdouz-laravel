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
                    {!! Form::open(['route' => 'keyStorages.store', 'files' =>true, 'enctype'=>'multipart/form-data']) !!}

                        @include('key_storages.fields')

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
