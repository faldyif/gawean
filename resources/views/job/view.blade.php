@extends('layouts.app')

@section('title', $job->name)

@section('top-page')
<section id="page-title">

    <div class="container clearfix">
        <h1>{{ $job->name }}</h1>
        <ol class="breadcrumb">
            <li><a href="{{ url('home') }}">Beranda</a></li>
            <li><a href="{{ url('job') }}">Lowongan</a></li>
            <li class="active">{{ $job->name }}</li>
        </ol>
    </div>

</section>
@endsection

@section('content')



        <div class="container clearfix">

            <!-- Post Content
            ============================================= -->
            <div class="postcontent nobottommargin clearfix">

                <div class="single-post nobottommargin">

                    <!-- Single Post
                    ============================================= -->
                    <div class="entry clearfix">

                        <!-- Entry Title
                        ============================================= -->
                        <div class="entry-title">
                            <h2>{{ $job->name }}</h2>
                        </div><!-- .entry-title end -->

                        <!-- Entry Meta
                        ============================================= -->
                        <ul class="entry-meta clearfix">
                            <?php 
                                Date::setLocale('id');
                                $create = new Date($job->created_at);
                                $update = new Date($job->updated_at);
                            ?>
                            <li><i class="icon-calendar3"></i> {{ $create->diffForHumans() }}</li>
                            <li><a href="#"><i class="icon-user"></i> {{ DB::table('users')->where('id', $job->user_id)->value('name') }}</a></li>
                            <li><i class="icon-folder-open"></i> <a href="#">General</a></li>
                        </ul><!-- .entry-meta end -->


                        <!-- Entry Content
                        ============================================= -->
                        <div class="entry-content notopmargin">

                            {!! nl2br($job->description) !!}

                        </div>
                    </div><!-- .entry end -->

                </div>

                <div>
                    <h4>Info Kontak</h4>

                    @if($job->phone!="")
                        No. HP: {{ $job->phone }}<br>
                    @endif
                    @if($job->email!="")
                        Email: {{ $job->email }}<br>
                    @endif
                    @if($job->location!="")
                        Lokasi: {{ $job->location }}<br>
                    @endif
                </div>

            </div><!-- .postcontent end -->

            <!-- Sidebar
            ============================================= -->
            <div class="sidebar nobottommargin col_last clearfix">
                <div class="sidebar-widgets-wrap">
                @if(Auth::user()->id == $job->user_id)
                <div class="widget clearfix">

                    <a href="{{ url('job') }}/{{ $job->id }}/edit" class="button button-3d button-black nomargin">Edit Lowongan</a>

                </div>
                @endif

                @if($job->pic!="")
                    <div class="widget clearfix">

                        <h4>Gambar</h4>
                        <!-- Entry Image
                        ============================================= -->
                        <div class="entry-image">
                            <img src="{{ url('/') }}/uploads/jobs/{{ $job->pic }}" alt="{{ $job->name }}">
                        </div><!-- .entry-image end -->
                        
                    </div>
                @endif

                    <div class="widget clearfix">

                        <!-- Post Author Info
                        ============================================= -->
                        <h4>Diposting oleh <span><a href="#">{{ DB::table('users')->where('id', $job->user_id)->value('name') }}</a></span></h4>
                        <div class="well">
                            <div class="author-image" style="margin-left: 10px; margin-bottom: 5px">
                                <img src="{{ url('/') }}/images/author/1.jpg" alt="" class="img-circle">
                            </div>
                            @if(DB::table('users')->where('id', $job->user_id)->value('bio')!="")
                                Bio: {{ DB::table('users')->where('id', $job->user_id)->value('bio') }}<br>
                            @endif
                        </div><!-- Post Single - Author End -->

                    </div>

                </div>

            </div><!-- .sidebar end -->

        </div>



@endsection
