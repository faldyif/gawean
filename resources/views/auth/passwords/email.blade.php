@extends('layouts.app')

@section('title', 'Atur Ulang Kata Sandi')

@section('top-page')
<section id="page-title">

    <div class="container clearfix">
        <h1>Atur Ulang Kata Sandi</h1>
        <ol class="breadcrumb">
            <li><a href="{{ url('/home') }}">Beranda</a></li>
            <li><a href="{{ url('/login') }}">Masuk</a></li>
            <li class="active">Atur Ulang Kata Sandi</li>
        </ol>
    </div>

</section>
@endsection

<!-- Main Content -->
@section('content')
<div class="container">
    <div class="panel-body">
        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif

        <form class="form-horizontal" role="form" method="POST" action="{{ url('/password/email') }}">
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

            <div class="form-group">
                <div class="col-md-6 col-md-offset-4">
                    <button type="submit" class="button button-3d button-large btn-block nomargin">
                        <i class="fa fa-btn fa-envelope"></i>Kirim
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
