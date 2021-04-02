@extends('layouts.app')
@section('body')
<div class="page-intro">
    <div class="page-intro-header">
        <h1 class="bolded">About us</h1>
    </div>
 </div>

 <div class="about-intro-section">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="intro-label">
                    <h1 class="bolded">Introduction</h1>
                </div>
                <p class="about-content-text">
                    Top Talented Recruits is a private company which is
                    wholly locally owned Tanzanian firm. We are a
                    Human Resources Management practice that
                    provides a comprehensive range of Human
                    Resources Solutions with a business focus
                </p>
                <p class="about-content-text">
                    At Top Talented Recruit, we fully understand
                    the Tanzanian market and have developed a
                    portfolio of relevant and value-adding products
                    that make Human Resources simple, quick and
                    effective.

                    We imply an integrated team approach and
our full-service /one stop" source philosophy is
what makes us unique.
                </p>
            </div>
        </div>
    </div>
</div>

<div class="vision-wrapper">
    <div class="container">
        <div class="row">
            <div class="col-md-6 mb-3">
                <h5 class="bolded">OUR VISION</h5>
                To set standard of excellence among
                human resources company in Tanzania.
            </div>
            <div class="col-md-6 mb-3">
                <h5 class="bolded">OUR MISSION</h5>
                Operating innovative huma resources cosulting
                firm which will ofefer better human resources
                proudcts that are corectly priced to meet our
                customers needs and deliver profitability to our
                clients.
            </div>
        </div>
    </div>
</div>

<div class="about-blog-wrapper">
<div class="container">
    <div class="blog-post">
        <div class="ttr-section-header">
        <h2 class="bolded">From our expert blog</h2>
        <p>Improve your knowledge,skills and get the best industry tips.</p>
        </div>
        {{-- <div class="row">
            <div class="col-md-4">
                <div class="tcard">
                    <div class="image">
                        <img src="{{asset('images/mac.jpg')}}" alt="">
                        <p>Advice</p>
                    </div>
                    <div class="body">
                        <b class="blog-card-title">Working from home in Tanzania</b>
                        <p>Do you remember that endless summer back in '84? Cruising down the ocean-highway with the top down, the wind in our hair and heads buzzing with neon dreams</p>
                        <div class="blog-post-footer">
                            <div class="right">
                                <b>By Top Talented Recruiters</b>
                            </div>
                            <div class="left">
                                <b>Read More</b>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="tcard">
                    <div class="image">
                        <img src="{{asset('images/skycrapper.jpg')}}" alt="">
                        <p>Advice</p>
                    </div>
                    <div class="body">
                        <b class="blog-card-title">Working from home in Tanzania</b>
                        <p>Do you remember that endless summer back in '84? Cruising down the ocean-highway with the top down, the wind in our hair and heads buzzing with neon dreams</p>
                        <div class="blog-post-footer">
                            <div class="right">
                                <b>By Top Talented Recruiters</b>
                            </div>
                            <div class="left">
                                <b>Read More</b>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="tcard">
                    <div class="image">
                        <img src="{{asset('images/advice.jpg')}}" alt="">
                        <p>Advice</p>
                    </div>
                    <div class="body">
                        <b class="blog-card-title">By Top Talented Recruiters</b>
                        <p>Do you remember that endless summer back in '84? Cruising down the ocean-highway with the top down, the wind in our hair and heads buzzing with neon dreams</p>
                        <div class="blog-post-footer">
                            <div class="right">
                                <b>By Top Talented Recruiters</b>
                            </div>
                            <div class="left">
                                <b>Read More</b>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> --}}
        <div class="row">
            @foreach ($blog_posts as $bpost)
            <div class="col-md-4">
                <div class="tcard">
                    <div class="image">
                        <img src="{{asset('storage/'.$bpost->image)}}" alt="">
                        <p>Advice</p>
                    </div>
                    <div class="body">
                        <b class="blog-card-title">{{Str::limit($bpost->title,50)}}</b>
                        <p>{!!Str::limit($bpost->caption,90)!!}</p>
                        <div class="blog-post-footer">
                            <div class="right">
                                <b>By Top Talented Recruiters</b>
                            </div>
                            <div class="left">
                                <a href="{{route('blog_post',$bpost->id)}}">
                                    <b>Read More</b>
                                </a>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div> 
            @endforeach
        </div>
    </div>
</div>
</div>
@endsection