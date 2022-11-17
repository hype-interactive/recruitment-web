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

@include('sections.staff')

<div class="about-blog-wrapper">
    @include('sections.partners')
</div>
@endsection