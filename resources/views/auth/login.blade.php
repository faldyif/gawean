@extends('layouts.app')

@section('title', 'Masuk')

@section('top-page')
<section id="page-title">

    <div class="container clearfix">
        <h1>Masuk</h1>
        <ol class="breadcrumb">
            <li><a href="{{ url('/home') }}">Beranda</a></li>
            <li class="active">Masuk</li>
        </ol>
    </div>

</section>
@endsection

@section('content')
<div class="container">
    <div class="panel-body">
        <form class="form-horizontal" role="form" method="POST" action="{{ url('/login') }}">
            {!! csrf_field() !!}

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

            <div class="form-group">
                <div class="col-md-6 col-md-offset-4">
                    <div class="checkbox">
                        <label>
                            <input type="checkbox" name="remember"> Ingat Saya
                        </label>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <div class="col-md-6 col-md-offset-4">
                    <button type="submit" class="button button-3d button-large btn-block nomargin">
                        <i class="fa fa-btn fa-sign-in"></i>Login
                    </button>

                    <a class="btn btn-link" href="{{ url('/password/reset') }}">Lupa Kata Sandi?</a>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
