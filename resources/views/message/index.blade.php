@extends('layouts.app')

@section('title', 'Perpesanan')

@section('top-page')
<section id="page-title">

    <div class="container clearfix">
        <h1>Perpesanan</h1>
        <ol class="breadcrumb">
            <li><a href="{{ url('home') }}">Beranda</a></li>
            <li class="active">Perpesanan</li>
        </ol>
    </div>

</section>
@endsection

@section('content')

    <div class="container clearfix">

        @if (Session::has('message'))
            <div class="style-msg successmsg">
                <div class="sb-msg"><i class="icon-thumbs-up"></i>{{ Session::get('message') }}</div>
            </div>
        @endif

        <!-- Post Content
        ============================================= -->
        <div class="postcontent nobottommargin clearfix">

            <div class="widget clearfix">

                <a href="{{ url('message/create') }}" class="button button-3d button-black nomargin">Buat Pesan Baru</a>

            </div>

            <div id="post-lists" class="widget clearfix">

                <h4 class="highlight-me">Pesan Masuk</h4>
                <div id="post-list-footer">
                    @if(count($inbox)==0)
                      Tidak ada pesan masuk.
                    @endif
                    @foreach($inbox as $key)
                    <div class="spost clearfix">
                        <div class="entry-image">
                            @if(!App\User::find($key->from_user_id)->pic=="")
                                <a href="{{ url('message') }}/{{  $key->from_user_id  }}" class="nobg"><img src="{{ url('/') }}/uploads/profile/{{ App\User::find($key->from_user_id)->pic }}" alt=""></a>
                            @else
                                <a href="{{ url('job') }}/{{  $key->from_user_id  }}" class="nobg"><img src="{{ url('/') }}/images/magazine/small/1.jpg" alt=""></a>
                            @endif
                        </div>
                        <div class="entry-c">
                            <div class="entry-title">
                                <h4><a href="{{ url('message') }}/{{  $key->id  }}">{{ $key->subject }}</a></h4>
                            </div>
                            <ul class="entry-meta">
                                <?php
                                    Date::setLocale('id');
                                    $create = new Date($key->created_at);
                                ?>
                                <li>{{ App\User::find($key->from_user_id)->name }}</li>
                                <li>Diterima {{ $create->diffForHumans() }}</li>
                                @if(!$key->read)
                                <li>Belum dibaca</li>
                                @else
                                <li>Sudah dibaca</li>
                                @endif
                            </ul>
                        </div>
                    </div>
                    @endforeach

                </div>

            </div>


            <div id="post-lists" class="widget clearfix">

                <h4 class="highlight-me">Pesan Terkirim</h4>
                <div id="post-list-footer">
                    @if(count($outbox)==0)
                      Tidak ada pesan terkirim.
                    @endif
                    @foreach($outbox as $key)
                    <div class="spost clearfix">
                        <div class="entry-image">
                            @if(!App\User::find($key->from_user_id)->pic=="")
                                <a href="{{ url('message') }}/{{  $key->to_user_id  }}" class="nobg"><img src="{{ url('/') }}/uploads/jobs/{{ App\User::find($key->from_user_id)->pic }}" alt=""></a>
                            @else
                                <a href="{{ url('job') }}/{{  $key->to_user_id  }}" class="nobg"><img src="{{ url('/') }}/images/magazine/small/1.jpg" alt=""></a>
                            @endif
                        </div>
                        <div class="entry-c">
                            <div class="entry-title">
                                <h4><a href="{{ url('message') }}/{{  $key->id  }}">{{ $key->subject }}</a></h4>
                            </div>
                            <ul class="entry-meta">
                                <?php
                                    Date::setLocale('id');
                                    $create = new Date($key->created_at);
                                ?>
                                <li>{{ App\User::find($key->to_user_id)->name }}</li>
                                <li>Terkirim {{ $create->diffForHumans() }}</li>
                                @if(!$key->read)
                                <li>Belum dibaca</li>
                                @else
                                <li>Sudah dibaca</li>
                                @endif
                            </ul>
                        </div>
                    </div>
                    @endforeach

                </div>

            </div>

        </div><!-- .postcontent end -->

    </div>

@endsection
