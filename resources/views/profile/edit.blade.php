@extends('layouts.app')

@section('title', 'Edit Profil')

@section('top-page')
<section id="page-title">

    <div class="container clearfix">
        <h1>Daftar</h1>
        <ol class="breadcrumb">
            <li><a href="{{ url('/home') }}">Beranda</a></li>
            <li class="active">Edit Profil</li>
        </ol>
    </div>

</section>
@endsection

@section('content')
<div class="container">
    <div class="panel-body">
        {!! Form::model($profile, array('route' => array('profile.update', $profile->id), 'method' => 'PUT', 'class' => 'form-horizontal', 'enctype' => 'multipart/form-data')) !!}

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

            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                <label class="col-md-4 control-label">Nama</label>

                <div class="col-md-6">
                    {{ Form::text('name', null, array('class' => 'sm-form-control')) }}

                    @if ($errors->has('name'))
                        <span class="help-block">
                            <strong>{{ $errors->first('name') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                <label class="col-md-4 control-label">E-Mail</label>

                <div class="col-md-6">
                    {{ Form::email('email', null, array('class' => 'sm-form-control')) }}

                    @if ($errors->has('email'))
                        <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group{{ $errors->has('bio') ? ' has-error' : '' }}">
                
                {{ Form::label('bio', 'Bio', array('class' => 'col-md-4 control-label')) }}
                <div class="col-md-6">

                    {{ Form::textarea('bio', null, array('class' => 'sm-form-control')) }}

                </div>
            </div>

            <div class="form-group{{ $errors->has('pic') ? ' has-error' : '' }}">
                
                {{ Form::label('pic','Avatar',array('class' => 'col-md-4 control-label')) }}
                <div class="col-md-6">

                    {{ Form::file('pic' ,array('class' => 'sm-form-control')) }}

                </div>
            </div>

            <div class="form-group">
                <div class="col-md-6 col-md-offset-4">
                    <button type="submit" class="button button-3d button-large btn-block nomargin">
                        <i class="fa fa-btn fa-user"></i>Simpan
                    </button>
                </div>
            </div>
        {!! Form::close() !!}
    </div>
</div>
@endsection
