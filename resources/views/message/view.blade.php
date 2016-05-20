@extends('layouts.app')

@section('title', $message->subject)

@section('top-page')
<section id="page-title">

    <div class="container clearfix">
        <h1>{{ $message->subject }}</h1>
        <ol class="breadcrumb">
            <li><a href="{{ url('home') }}">Beranda</a></li>
            <li><a href="{{ url('job') }}">Perpesanan</a></li>
            <li class="active">{{ $message->subject }}</li>
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
                            <h2>{{ $message->subject }}</h2>
                        </div><!-- .entry-title end -->

                        <!-- Entry Meta
                        ============================================= -->
                        <ul class="entry-meta clearfix">
                            <?php
                                Date::setLocale('id');
                                $create = new Date($message->created_at);
                            ?>
                            <li><i class="icon-calendar3"></i> {{ $create->diffForHumans() }}</li>
                            <li><a href="{{ url('profile') }}/{{ $message->from_user_id }}"><i class="icon-user"></i> Dari {{ DB::table('users')->where('id', $message->from_user_id)->value('name') }}</a></li>
                            <li><a href="{{ url('profile') }}/{{ $message->to_user_id }}"><i class="icon-user"></i> Kepada {{ DB::table('users')->where('id', $message->to_user_id)->value('name') }}</a></li>
                        </ul><!-- .entry-meta end -->


                        <!-- Entry Content
                        ============================================= -->
                        <div class="entry-content notopmargin">

                            {!! nl2br($message->message) !!}

                        </div>
                    </div><!-- .entry end -->

                </div>

            </div><!-- .postcontent end -->

        </div>



@endsection
