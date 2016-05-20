@extends('layouts.app')

@section('title', 'Tambah Lowongan')

@section('top-page')
<section id="page-title">

    <div class="container clearfix">
        <h1>Tambah Lowongan</h1>
        <ol class="breadcrumb">
            <li><a href="{{ url('/home') }}">Beranda</a></li>
            <li><a href="{{ url('/job') }}">Lowongan</a></li>
            <li class="active">Tambah Lowongan</li>
        </ol>
    </div>

</section>
@endsection

@section('content')

<div class="container">
    <div class="row">
        {!! Form::open(array('url' => 'job','class' => 'form-horizontal', 'enctype' => 'multipart/form-data')) !!}

            @if(count($errors) > 0)
                <div class="style-msg2 errormsg">
                    <div class="msgtitle">Perbaiki kesalahan berikut:</div>
                    <div class="sb-msg">
                        <ul>
                            @foreach($errors->all() as $message)
                                <li>{{ $message }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            @endif

            <div class="form-group{{ $errors->has('category_id') ? ' has-error' : '' }}">
                
                {{ Form::label('category_id', 'Kategori *', array('class' => 'col-md-4 control-label')) }}
                <div class="col-md-6">

                    {{ Form::select('category_id', array('1' => 'Leopard', '2' => 'Lion'), null, array('class' => 'sm-form-control', 'placeholder' => '-- Pilih kategori --')) }}

                </div>
            </div>

            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                
                {{ Form::label('name', 'Nama Lowongan *', array('class' => 'col-md-4 control-label')) }}
                <div class="col-md-6">

                    {{ Form::text('name', null, array('class' => 'sm-form-control')) }}

                </div>
            </div>

            <div class="form-group{{ $errors->has('location') ? ' has-error' : '' }}">
                
                {{ Form::label('location', 'Lokasi *', array('class' => 'col-md-4 control-label')) }}
                <div class="col-md-6">

                    {{ Form::text('location', null, array('class' => 'sm-form-control')) }}

                </div>
            </div>

            <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                
                {{ Form::label('description', 'Deskripsi *', array('class' => 'col-md-4 control-label')) }}
                <div class="col-md-6">

                    {{ Form::textarea('description', null, array('class' => 'sm-form-control')) }}

                </div>
            </div>

            <div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
                
                {{ Form::label('phone', 'Telp/HP', array('class' => 'col-md-4 control-label')) }}
                <div class="col-md-6">

                    {{ Form::text('phone', null, array('class' => 'sm-form-control')) }}

                </div>
            </div>

            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                
                {{ Form::label('email', 'Email', array('class' => 'col-md-4 control-label')) }}
                <div class="col-md-6">

                    {{ Form::text('email', null, array('class' => 'sm-form-control')) }}

                </div>
            </div>

            <div class="form-group{{ $errors->has('pic') ? ' has-error' : '' }}">
                
                {{ Form::label('pic','Gambar',array('class' => 'col-md-4 control-label')) }}
                <div class="col-md-6">

                    {{ Form::file('pic' ,array('class' => 'sm-form-control')) }}

                </div>
            </div>

  
  

            <div class="form-group">
                <div class="col-md-6 col-md-offset-4">
                    <button type="submit" class="button button-3d button-large btn-block nomargin">
                        <i class="fa fa-btn fa-user"></i>Kirim
                    </button>
                </div>
            </div>
        {!! Form::close() !!}
    </div>
</div>
@endsection
