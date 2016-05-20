@extends('layouts.app')

@section('title', 'Kirim Pesan')

@section('top-page')
<section id="page-title">

    <div class="container clearfix">
        <h1>Kirim Pesan</h1>
        <ol class="breadcrumb">
            <li><a href="{{ url('/home') }}">Beranda</a></li>
            <li><a href="{{ url('/message') }}">Perpesanan</a></li>
            <li class="active">Kirim Pesan</li>
        </ol>
    </div>

</section>
@endsection

@section('content')

<div class="container">
    <div class="row">
        {!! Form::open(array('url' => 'message','class' => 'form-horizontal', 'enctype' => 'multipart/form-data')) !!}

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

                {{ Form::label('to_user_id', 'Untuk User ID *', array('class' => 'col-md-4 control-label')) }}
                <div class="col-md-6">

                    {{ Form::text('to_user_id', null, array('class' => 'sm-form-control')) }}

                </div>
            </div>

            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">

                {{ Form::label('subject', 'Subyek *', array('class' => 'col-md-4 control-label')) }}
                <div class="col-md-6">

                    {{ Form::text('subject', null, array('class' => 'sm-form-control')) }}

                </div>
            </div>

            <div class="form-group{{ $errors->has('location') ? ' has-error' : '' }}">

                {{ Form::label('message', 'Isi Pesan *', array('class' => 'col-md-4 control-label')) }}
                <div class="col-md-6">

                    {{ Form::textarea('message', null, array('class' => 'sm-form-control')) }}

                </div>
            </div>

            <div class="form-group">
                <div class="col-md-6 col-md-offset-4">
                    <button type="submit" class="button button-3d button-large btn-block nomargin">
                        <i class="fa fa-btn fa-user"></i>Kirim Pesan
                    </button>
                </div>
            </div>
        {!! Form::close() !!}
    </div>
</div>
@endsection
