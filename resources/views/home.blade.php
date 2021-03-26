@extends('layouts.app')
@section('body')
    <div class="landing-wrapper" >
          <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-indicators">
              <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
              <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
              <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
              <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="3" aria-label="Slide 4"></button>
            </div>
            <div class="carousel-inner">
              <div class="carousel-item active">
                <img src="{{asset('images/carousel1.jpg')}}" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                  <h3>Recruitment Services</h3>
                  <p>Hiring the right person in the right place at the right time can save your business</p>
                  <a href="{{route('services')}}">
                    <button class="btn btn-orange">Read More</button>
                 </a>
                </div>
              </div>
              <div class="carousel-item">
                <img src="{{asset('images/carousel4.jpeg')}}" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                  <h3>Permit Consultancy</h3>
                  <p>Foreigners are required to have work and residence permits to invest and work in Tanzania </p>
                    <a href="{{route('services')}}">
                        <button class="btn btn-orange">Read More</button>
                    </a>
                </div>
              </div>
              <div class="carousel-item">
                <img src="{{asset('images/carousel2.jpeg')}}" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                  <h3>Training Services</h3>
                  <p>An organization’s ability to learn and convert that learning into action, is the ultimate competitive advantage </p>
                  <a href="{{route('services')}}">
                    <button class="btn btn-orange">Read More</button>
                  </a>
                </div>
              </div>
              <div class="carousel-item">
                <img src="{{asset('images/carousel6.jpeg')}}" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                  <h3>Outsourcing and Consulting services</h3>
                  <p>Master your strengths and outsource your weaknesses</p>
                  <a href="{{route('services')}}">
                    <button class="btn btn-orange">Read More</button>
                  </a>
                </div>
              </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions"  data-bs-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions"  data-bs-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Next</span>
            </button>
          </div>

        <div class="blur"></div>
    </div>
    <div class="container">
        <div class="post-banners">
            <div class="ttr-section-header">
                <h2>Latest job opening</h2>
                <p>Ad magna labore sunt laborum eu irure fugiat adipisicing fugiat sit quis ea labore incididunt.</p>
                </div>
            <div class="row">
                @foreach ($posts as $post)
                    
                
                    <div class="col-md-6">
                        <div class="banner">
                                <div class="col">
                                    <b><a href="{{route('job_post',$post->id)}}">{{$post->jobCategory->name}}</a></b>
                                    <ul>
                                        <li class="location"><img src="{{asset('images/icons/location.svg')}}" alt="">{{$post->region->name}}</li> 
                                        <li class="location"><img src="{{asset('images/icons/lightbulb.svg')}}" alt=""> Deadline; {{date_format(date_create($post->deadline),"d-M-Y")}}</li>
                                    </ul>
                                </div>
                                <div class=" sm-wrapper">
                                    <p>{{$post->type}}</p>
                                </div>
                            <div class="triangle"></div>
                            <small>{{timeElapsed($post->created_at)}}</small>
                            <div class="snowflake">
                                <img src="{{asset('images/icons/star.svg')}}" alt="">
                            </div>
                        </div>
                    </div>
                @endforeach 
            </div>
            <div class="ttr-section-footer">
                <a href="{{route('job_posts')}}">
                    <button class="btn btn-orange">Browser more jobs</button>
                </a>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="about">
            <div class="ttr-section-header">
                <h2>Value proposition</h2>
                <p>Our recruitment service creates a pleasant hiring experience for both  job seekers and employers</p>
                </div>
            <div class="cards">
                <div class="left">
                    <img src="{{asset('images/about_left.jpg')}}" alt="">
                </div>
                <div class="mid">
                    <img src="{{asset('images/icons/handshake.svg')}}" alt="">
                    <h4>Find great talent</h4>
                    <p>Be sure to have your pages set up with the latest design and development standards.  </p>
                    <a class="orange-box">
                        <button type="button" class="btn btn-orange" data-bs-toggle="modal" data-bs-target="#employerForm">Register as employer </button>
                    </a> 
                </div>
                <div class="right">
                    <img src="{{asset('images/icons/briefcase-frontal-view.svg')}}" alt="">
                    <h4>Find great talent</h4>
                    <p>Be sure to have your pages set up with the latest design and development standards.  </p>
                        <a class="orange-box" href="{{route('register')}}">
                            <button class="btn btn-orange">Register as job seeker</button>
                        </a>
                </div>
            </div>
        </div>
    </div>
    <div class="container">

        <div class="services-wrapper">
            <div class="ttr-section-header">
                <h2>Our services</h2>
                <p>Our recruitment service creates a pleasant hiring experience for both  job seekers and employers</p>
            </div>
            <div class="row">
                <div class="col-md-6 services-tile">
                    <div class="row">
                        <div class="col-md-2 tile-icon">
                            <img src="{{asset('images/icons/recruitment.svg')}}" alt="">
                        </div>
                        <div class="col-md-10 tile-content">
                            <b>Recruitment Services</b>
                            <small>Dolor ullamco ex veniam est.Et in ipsum pariatur aliquip dolore ex elit.
                                 Mollit anim non ea nostrud esse quis commodo. Cupidatat et qui laboris
                                  cillum. Irure Lorem eiusmod commodo magna dolor enim amet non mollit.</small>
                            
                        </div>
                    </div>
                </div>
                <div class="col-md-6 services-tile">
                    <div class="row">
                        <div class="col-md-2 tile-icon">
                            <img src="{{asset('images/icons/passport.svg')}}" alt="">
                        </div>
                        <div class="col-md-10 tile-content">
                            <b>Permit Consultancy</b>
                            <small>Dolor ullamco ex veniam est.Et in ipsum pariatur aliquip dolore ex elit.
                                 Mollit anim non ea nostrud esse quis commodo. Cupidatat et qui laboris
                                  cillum. Irure Lorem eiusmod commodo magna dolor enim amet non mollit.</small>
                            
                        </div>
                    </div>
                </div>
                <div class="col-md-6 services-tile">
                    <div class="row">
                        <div class="col-md-2 tile-icon">
                            <img src="{{asset('images/icons/presentation.svg')}}" alt="">
                        </div>
                        <div class="col-md-10 tile-content">
                            <b>Training Services</b>
                            <small>Dolor ullamco ex veniam est.Et in ipsum pariatur aliquip dolore ex elit.
                                 Mollit anim non ea nostrud esse quis commodo. Cupidatat et qui laboris
                                  cillum. Irure Lorem eiusmod commodo magna dolor enim amet non mollit.</small>
                            
                        </div>
                    </div>
                </div>
                <div class="col-md-6 services-tile">
                    <div class="row">
                        <div class="col-md-2 tile-icon">
                            <img src="{{asset('images/icons/consult.svg')}}" alt="">
                        </div>
                        <div class="col-md-10 tile-content">
                            <b>Consultancy Services</b>
                            <small>Dolor ullamco ex veniam est.Et in ipsum pariatur aliquip dolore ex elit.
                                 Mollit anim non ea nostrud esse quis commodo. Cupidatat et qui laboris
                                  cillum. Irure Lorem eiusmod commodo magna dolor enim amet non mollit.</small>
                            
                        </div>
                    </div>
                </div>

                
            </div>
        </div>
    </div>
    <div class="container">
        <div class="blog-post">
            <div class="ttr-section-header">
                <h2>From our expert blog</h2>
                <p>Consequat anim ullamco quis ea ad aute.</p>
            </div>
            <div class="row">
                @foreach ($blog_posts as $bpost)
                        <div class="col-md-4">
                            <div class="tcard">
                                <div class="image">
                                    <img src="{{asset('storage/'.$bpost->image)}}" alt="">
                                    <p>Advice</p>
                                </div>
                                <div class="body">
                                    <b class="blog-card-title">{{Str::limit($bpost->title,80)}}</b>
                                    <div class="caption">
                                        <p>
                                            {!! Str::limit($bpost->caption,90)!!}
                                        </p>
                                    </div>
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

@endsection