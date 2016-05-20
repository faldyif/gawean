@extends('layouts.app')

@section('title', 'Jasa')

@section('top-page')
<section id="page-title">

    <div class="container clearfix">
        <h1>Jasa</h1>
        <ol class="breadcrumb">
            <li><a href="{{ url('home') }}">Beranda</a></li>
            <li class="active">Jasa</li>
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

            <div id="post-lists" class="widget clearfix">

                <h4 class="highlight-me">Daftar Jasa</h4>
                <div id="post-list-footer">
                    @foreach($job as $key)
                    <div class="spost clearfix">
                        <div class="entry-image">
                            @if(!$key->pic=="")
                                <a href="{{ url('offer') }}/{{  $key->id  }}" class="nobg"><img src="uploads/offers/{{  $key->pic  }}" alt=""></a>
                            @else
                                <a href="{{ url('offer') }}/{{  $key->id  }}" class="nobg"><img src="images/magazine/small/1.jpg" alt=""></a>
                            @endif
                        </div>
                        <div class="entry-c">
                            <div class="entry-title">
                                <h4><a href="{{ url('offer') }}/{{  $key->id  }}">{{ $key->name }}</a></h4>
                            </div>
                            <ul class="entry-meta">
                                <li>Dibuat oleh {{ DB::table('users')->where('id', $key->user_id)->value('name') }}</li>
                            </ul>
                        </div>
                    </div>
                    @endforeach

                </div>

            </div>

        </div><!-- .postcontent end -->

        <!-- Sidebar
        ============================================= -->
        <div class="sidebar nobottommargin col_last clearfix">
            <div class="sidebar-widgets-wrap">

                <div class="widget clearfix">

                    <a href="{{ url('offer/create') }}" class="button button-3d button-black nomargin">Tambah Jasa</a>

                </div>

                <div class="widget clearfix">

                    <h4>Jasa Saya</h4>
                    <div id="post-list-footer">

                        @foreach($myjob as $key)
                            <div class="spost clearfix">
                                <div class="entry-image">
                                    @if(!$key->pic=="")
                                        <a href="{{ url('offer') }}/{{  $key->id  }}" class="nobg"><img src="uploads/offers/{{  $key->pic  }}" alt=""></a>
                                    @else
                                        <a href="{{ url('offer') }}/{{  $key->id  }}" class="nobg"><img src="images/magazine/small/1.jpg" alt=""></a>
                                    @endif
                                </div>
                                <div class="entry-c">
                                    <div class="entry-title">
                                        <h4><a href="{{ url('offer') }}/{{  $key->id  }}">{{ $key->name }}</a></h4>
                                    </div>
                                    <ul class="entry-meta">
                                        <?php 
                                            Date::setLocale('id');
                                            $update = new Date($key->updated_at);
                                        ?>
                                        <li>{{ $update->diffForHumans() }}</li>
                                    </ul>
                                </div>
                            </div>
                        @endforeach

                        <div class="spost clearfix"></div>

                        @if($myjob == NULL || count($myjob) == 0)
                            Belum ada data.
                        @else
                            Total Jasa: {{ App\User::find(Auth::user()->id)->offers->count() }}
                        @endif

                    </div>

                </div>

            </div>
        </div><!-- .sidebar end -->

    </div>

@endsection
