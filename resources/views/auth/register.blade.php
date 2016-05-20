@extends('layouts.app')

@section('title', 'Daftar')

@section('top-page')
<section id="page-title">

    <div class="container clearfix">
        <h1>Daftar</h1>
        <ol class="breadcrumb">
            <li><a href="{{ url('/home') }}">Beranda</a></li>
            <li class="active">Daftar</li>
        </ol>
    </div>

</section>
@endsection

@section('content')
<div class="container">
    <div class="panel-body">
        <form class="form-horizontal" role="form" method="POST" action="{{ url('/register') }}">
            {!! csrf_field() !!}

            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                <label class="col-md-4 control-label">Nama</label>

                <div class="col-md-6">
                    <input type="text" class="sm-form-control" name="name" value="{{ old('name') }}">

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
                    <input type="email" class="sm-form-control" name="email" value="{{ old('email') }}">

                    @if ($errors->has('email'))
                        <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                <label class="col-md-4 control-label">Kata Sandi</label>

                <div class="col-md-6">
                    <input type="password" class="sm-form-control" name="password">

                    @if ($errors->has('password'))
                        <span class="help-block">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                <label class="col-md-4 control-label">Ulangi Kata Sandi</label>

                <div class="col-md-6">
                    <input type="password" class="sm-form-control" name="password_confirmation">

                    @if ($errors->has('password_confirmation'))
                        <span class="help-block">
                            <strong>{{ $errors->first('password_confirmation') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group">
                <div class="col-md-6 col-md-offset-4">
                    <button type="submit" class="button button-3d button-large btn-block nomargin">
                        <i class="fa fa-btn fa-user"></i>Daftar
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
