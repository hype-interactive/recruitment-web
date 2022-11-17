<?php
    $_ = new App\Library\Services;
    $services = array_slice($_->items(),0,7);
?>

<div class="container">

<div class="services-wrapper">
    <div class="ttr-section-header">
        <h2>Our services</h2>
        <p>Our services provides you with a comprehensive range of Human Resources Solutions with a business focus.</p>
    </div>
    <div class="row">
        @foreach ($services as $service)
            <a href="#" class="col-md-6 services-tile">
                <div class="row">
                    <div class="col-md-2 tile-icon">
                        <img src="{{asset($service->icon)}}" alt="...">
                    </div>
                    <div class="col-md-10 tile-content">
                        <b>{{$service->title}}</b>
                        <small>{{$service->short_description}}</small>
                    </div>
                </div>
            </a>
        @endforeach
    </div>
</div>
</div>