@extends('layouts.app')

@section('title', 'Pencarian')

@section('top-page')
<section id="page-title">

    <div class="container clearfix">
        <h1>Pencarian</h1>
        <ol class="breadcrumb">
            <li><a href="{{ url('home') }}">Beranda</a></li>
            <li class="active">Pencarian</li>
        </ol>
    </div>

</section>
@endsection

@section('content')

<div class="container">
    <div class="row">
        {!! Form::open(array('url' => 'search','class' => 'form-horizontal', 'enctype' => 'multipart/form-data')) !!}

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

            <div class="form-group{{ $errors->has('query') ? ' has-error' : '' }}">

                {{ Form::label('query', 'Kata Kunci *', array('class' => 'col-md-4 control-label')) }}
                <div class="col-md-6">

                    {{ Form::text('query', null, array('class' => 'sm-form-control')) }}

                </div>
            </div>

            <div class="form-group">
                <div class="col-md-6 col-md-offset-4">
                    <button type="submit" class="button button-3d button-large btn-block nomargin">
                        <i class="fa fa-btn fa-user"></i>Cari
                    </button>
                </div>
            </div>
        {!! Form::close() !!}
    </div>
</div>

@endsection
