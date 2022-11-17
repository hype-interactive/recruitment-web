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
                <a href="#" class="col-md-6 services-tile" data-bs-toggle="modal" data-bs-target="#modal{{ $service->id }}" id="card{{ $service->id }}">
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

{{-- modals  --}}
<!-- Button trigger modal -->

<!-- Modal -->
@foreach ($services as $service)
<div class="modal fade" id="modal{{ $service->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header phone-only">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body vib-modal custom-modal">
                <div class="row">
                    <div class="col-md-12 body">
                        <strong class="name ">{{ $service->title  }}</strong>
                        <hr>
                        {!! $service->description  !!}
                        <hr>
                        <div class="mv-collapse">
                            <div class="accordion">
                                <div class="card">
                                    <div class="card-header">
                                        <b class="mb-0">
                                            <a href="#" class="collapsed" data-bs-toggle="collapse" data-bs-target="#subscribeCollapse" aria-expanded="false" aria-controls="subscribeCollapse">
                                                Subscribe
                                                <img src="{{asset('images/icons/arrowdown.svg')}}" alt="">
                                            </a>
                                        </b>
                                    </div>
                                    <div class="collapse" id="subscribeCollapse" data-bs-parent="#accordion">
                                        <form action="{{ route('subscribe') }}" method="post">
                                            @csrf
                                            <div class="card-body px-2 py-2">
                                                <div class="col-md-12">
                                                    <input class="form-control" type="email" placeholder="Enter your email here" autocomplete="old-email">
                                                </div>
                                            </div>
                                            <div class="text-end">
                                                <button class="btn btn-orange my-2 mx-2" type="submit">Submit</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script>
$("#x").hover(function(){
    $("#modal1").modal({
        show: true,
        backdrop: false
    })
})
function showDetails(id) {
    console.log(id);
    var detailId= "details"+id;
    var cardId="card"+id;
    document.getElementById(detailId).style.display= "block";
}
function hideDetails(id) {
    var detailId= "details"+id;
    document.getElementById(detailId).style.display= "none";
}
</script>
@endforeach