@extends('layouts.app')

@section('title', 'Lowongan')

@section('top-page')
<section id="page-title">

    <div class="container clearfix">
        <h1>Lowongan</h1>
        <ol class="breadcrumb">
            <li><a href="{{ url('home') }}">Beranda</a></li>
            <li class="active">Lowongan</li>
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

                <h4 class="highlight-me">Daftar Lowongan (Ditemukan {{ count($resultJob) }} hasil)</h4>
                <div id="post-list-footer">
                    @foreach($resultJob as $key)
                    <div class="spost clearfix">
                        <div class="entry-image">
                            @if(!$key->pic=="")
                                <a href="{{ url('job') }}/{{  $key->id  }}" class="nobg"><img src="uploads/jobs/{{  $key->pic  }}" alt=""></a>
                            @else
                                <a href="{{ url('job') }}/{{  $key->id  }}" class="nobg"><img src="images/magazine/small/1.jpg" alt=""></a>
                            @endif
                        </div>
                        <div class="entry-c">
                            <div class="entry-title">
                                <h4><a href="{{ url('job') }}/{{  $key->id  }}">{{ $key->name }}</a></h4>
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

    </div>

@endsection
