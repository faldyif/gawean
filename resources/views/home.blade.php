@extends('layouts.app')

@section('title', 'Beranda')

@section('top-page')
<section id="page-title">

    <div class="container clearfix">
        <h1>Beranda</h1>
        <ol class="breadcrumb">
            <li class="active">Beranda</li>
        </ol>
    </div>

</section>
@endsection

@section('content')
<div class="container">
    <div id="post-lists" class="widget clearfix">

        <h4 class="highlight-me">Recent Posts</h4>
        <div id="post-list-footer">

            <div class="spost clearfix">
                <div class="entry-image">
                    <a href="#" class="nobg"><img src="images/magazine/small/1.jpg" alt=""></a>
                </div>
                <div class="entry-c">
                    <div class="entry-title">
                        <h4><a href="#">Lorem ipsum dolor sit amet, consectetur</a></h4>
                    </div>
                    <ul class="entry-meta">
                        <li>10th July 2014</li>
                    </ul>
                </div>
            </div>

            <div class="spost clearfix">
                <div class="entry-image">
                    <a href="#" class="nobg"><img src="images/magazine/small/2.jpg" alt=""></a>
                </div>
                <div class="entry-c">
                    <div class="entry-title">
                        <h4><a href="#">Elit Assumenda vel amet dolorum quasi</a></h4>
                    </div>
                    <ul class="entry-meta">
                        <li>10th July 2014</li>
                    </ul>
                </div>
            </div>

            <div class="spost clearfix">
                <div class="entry-image">
                    <a href="#" class="nobg"><img src="images/magazine/small/3.jpg" alt=""></a>
                </div>
                <div class="entry-c">
                    <div class="entry-title">
                        <h4><a href="#">Debitis nihil placeat, illum est nisi</a></h4>
                    </div>
                    <ul class="entry-meta">
                        <li>10th July 2014</li>
                    </ul>
                </div>
            </div>

        </div>

    </div>
</div>
@endsection
