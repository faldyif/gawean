@extends('layouts.app')

@section('title', $user->name)

@section('top-page')
<section id="page-title">

    <div class="container clearfix">
        <h1>Profil {{ $user->name }}</h1>
        <ol class="breadcrumb">
            <li><a href="{{ url('home') }}">Beranda</a></li>
            <li>Profil</li>
            <li class="active">{{ $user->name }}</li>
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
                            <h2>{{ $user->name }}</h2>
                        </div><!-- .entry-title end -->

                        <!-- Entry Content
                        ============================================= -->
                        <div class="entry-content notopmargin">
                            <?php 
                                Date::setLocale('id');
                                $create = new Date($user->created_at);
                                $update = new Date($user->updated_at);
                            ?>
                            {!! nl2br($user->bio) !!}<br>
                            Tanggal mendaftar: {{ $create->diffForHumans() }}

                        </div>
                    </div><!-- .entry end -->

                </div>

            </div><!-- .postcontent end -->

            <!-- Sidebar
            ============================================= -->
            <div class="sidebar nobottommargin col_last clearfix">

                @if($user->pic!="")
                    <div class="widget clearfix">
                        <!-- Entry Image
                        ============================================= -->
                        <div class="entry-image">
                            <img src="{{ url('uploads/avatars') }}/{{ $user->pic }}" alt="Avatar {{ $user->name }}">
                        </div><!-- .entry-image end -->
                        
                    </div>
                @endif

                <div class="sidebar-widgets-wrap">
                @if(Auth::user()->id != $user->id)
                <div class="widget clearfix">

                    <a href="#" class="button button-3d button-black nomargin">Tambah Teman</a>

                </div>
                @else

                <div class="widget clearfix">

                    <a href="{{ url('editprofile') }}" class="button button-3d button-black nomargin">Edit Profil</a>

                </div>
                @endif

                </div>

            </div><!-- .sidebar end -->

        </div>

@endsection
