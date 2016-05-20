@extends('layouts.app')

@section('title', 'Selamat Datang')

@section('top-page')

<section id="slider" class="slider-parallax full-screen dark" style="background: url(images/landing/static.jpg) center;">

    <div class="container vertical-middle clearfix">

        <div class="heading-block title-center nobottomborder">
            <h1>Starter's Guide to create Landing Pages</h1>
            <span>Building a Landing Page was never so Easy &amp; Interactive</span>
        </div>

        <div class="center bottommargin">
            <a href="#" class="button button-3d button-teal button-xlarge nobottommargin"><i class="icon-star3"></i>Masuk</a> - ATAU - <a href="#" data-scrollto="#section-pricing" class="button button-3d button-red button-xlarge nobottommargin"><i class="icon-user2"></i>Daftar</a>
        </div>

    </div>

</section>

@endsection

@section('content')

<div class="container clearfix">

    <div id="section-features" class="heading-block title-center page-section">
        <h2>Features Overview</h2>
        <span>Some of the Features that are gonna blow your mind off</span>
    </div>

    <div class="col_one_third">
        <div class="feature-box fbox-plain">
            <div class="fbox-icon" data-animate="bounceIn">
                <a href="#"><img src="images/icons/features/responsive.png" alt="Responsive Layout"></a>
            </div>
            <h3>Responsive Layout</h3>
            <p>Powerful Layout with Responsive functionality that can be adapted to any screen size. Resize browser to view.</p>
        </div>
    </div>

    <div class="col_one_third">
        <div class="feature-box fbox-plain">
            <div class="fbox-icon" data-animate="bounceIn" data-delay="200">
                <a href="#"><img src="images/icons/features/retina.png" alt="Retina Graphics"></a>
            </div>
            <h3>Retina Graphics</h3>
            <p>Looks beautiful &amp; ultra-sharp on Retina Screen Displays. Retina Icons, Fonts &amp; all others graphics are optimized.</p>
        </div>
    </div>

    <div class="col_one_third col_last">
        <div class="feature-box fbox-plain">
            <div class="fbox-icon" data-animate="bounceIn" data-delay="400">
                <a href="#"><img src="images/icons/features/performance.png" alt="Powerful Performance"></a>
            </div>
            <h3>Powerful Performance</h3>
            <p>Canvas includes tons of optimized code that are completely customizable and deliver unmatched fast performance.</p>
        </div>
    </div>

    <div class="clear"></div>

    <div class="col_one_third">
        <div class="feature-box fbox-plain">
            <div class="fbox-icon" data-animate="bounceIn" data-delay="600">
                <a href="#"><img src="images/icons/features/flag.png" alt="Responsive Layout"></a>
            </div>
            <h3>Endless Possibilities</h3>
            <p>You have complete easy control on each &amp; every element that provides endless customization possibilities.</p>
        </div>
    </div>

    <div class="col_one_third">
        <div class="feature-box fbox-plain">
            <div class="fbox-icon" data-animate="bounceIn" data-delay="800">
                <a href="#"><img src="images/icons/features/tick.png" alt="Retina Graphics"></a>
            </div>
            <h3>Light &amp; Dark Scheme</h3>
            <p>Change your Website's Primary Scheme instantly by simply adding the dark class to the body.</p>
        </div>
    </div>

    <div class="col_one_third col_last">
        <div class="feature-box fbox-plain">
            <div class="fbox-icon" data-animate="bounceIn" data-delay="1000">
                <a href="#"><img src="images/icons/features/tools.png" alt="Powerful Performance"></a>
            </div>
            <h3>Customizable Fonts</h3>
            <p>Use any Font you like from Google Web Fonts, Typekit or other Web Fonts. They will blend in perfectly.</p>
        </div>
    </div>

    <div class="clear"></div>

    <div class="col_one_third">
        <div class="feature-box fbox-plain">
            <div class="fbox-icon" data-animate="bounceIn" data-delay="1200">
                <a href="#"><img src="images/icons/features/map.png" alt="Responsive Layout"></a>
            </div>
            <h3>Responsive Layout</h3>
            <p>Powerful Layout with Responsive functionality that can be adapted to any screen size. Resize browser to view.</p>
        </div>
    </div>

    <div class="col_one_third">
        <div class="feature-box fbox-plain">
            <div class="fbox-icon" data-animate="bounceIn" data-delay="1400">
                <a href="#"><img src="images/icons/features/seo.png" alt="Retina Graphics"></a>
            </div>
            <h3>Retina Graphics</h3>
            <p>Looks beautiful &amp; ultra-sharp on Retina Screen Displays. Retina Icons, Fonts &amp; all others graphics are optimized.</p>
        </div>
    </div>

    <div class="col_one_third col_last">
        <div class="feature-box fbox-plain">
            <div class="fbox-icon" data-animate="bounceIn" data-delay="1600">
                <a href="#"><img src="images/icons/features/support.png" alt="Powerful Performance"></a>
            </div>
            <h3>Powerful Performance</h3>
            <p>Canvas includes tons of optimized code that are completely customizable and deliver unmatched fast performance.</p>
        </div>
    </div>

    <div class="clear"></div>

</div>


<div class="container clearfix">

</div>

<div class="section footer-stick">

    <div class="container clearfix">

        <div id="section-buy" class="heading-block title-center nobottomborder page-section">
            <h2>Enough? Start Building!</h2>
            <span>Now that you have read all the Tid-Bits, so start with a plan</span>
        </div>

        <div class="center">

            <a href="#" data-animate="tada" class="button button-3d button-teal button-xlarge nobottommargin"><i class="icon-star3"></i>Masuk</a> - ATAU - <a href="#" data-scrollto="#section-pricing" class="button button-3d button-red button-xlarge nobottommargin"><i class="icon-user2"></i>DAFTAR</a>

        </div>

    </div>

</div>
@endsection
