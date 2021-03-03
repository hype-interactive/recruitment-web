@extends('layouts.app')
@section('body')
    <div class="landing-wrapper container-fluid" style="background-image: url('{{asset('images/Herobanner.jpg')}}');">
        <div class="container">
            <div class="landing">
                <div class="row">
                    <div class="col-md-6 right">
                        <h1>Find your ideal role</h1>
                    </div>
                    <div class="col-md-5 offset-md 1">
                    </div>
                </div>
                <form method="POST" action="{{route('search')}}">
                    <div class="search-bar">
                            <div class="search-box">
                                <img src="{{asset('images/icons/loupe.svg')}}" alt="">
                                <input type="text" name="search">
                            </div>
                            <div class="industry">
                                <select class="custom-select" name="category" >
                                    <option selected>Categories</option>
                                    @foreach ($categories as $category)
                                        <option value="{{$category->id}}">{{$category->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="location">
                                <select class="custom-select" name="location" >
                                <option selected>Location</option>
                                    @foreach ($regions as $region)
                                        <option value="{{$region->id}}">{{$region->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            {{ csrf_field() }}
                            <button class="btn btn-orange search-button" type="submit">Search</button>
                    </div>
                </form>  
            </div>
        </div>
    </div>
    <div class="container">
        <div class="post-banners">
            <div class="section-title-wrapper">
                <h2>Latest job opening</h2>
                <p>Ad magna labore sunt laborum eu irure fugiat adipisicing fugiat sit quis ea labore incididunt.</p>
                </div>
            <div class="row">
                @foreach ($posts as $post)
                    
                <a href="{{route('job_post',$post->id)}}">
                    <div class="col-md-6">
                        <div class="banner">
                            <div class="row">
                                <div class="col-md-9">
                                    <b>{{$post->jobCategory->name}}</b>
                                    <ul>
                                        <li class="location"><img src="{{asset('images/icons/location.svg')}}" alt="">{{$post->region->name}}</li> 
                                        <li class="location"><img src="{{asset('images/icons/lightbulb.svg')}}" alt=""> Deadline; {{date_format(date_create($post->deadline),"d-M-Y")}}</li>
                                    </ul>
                                </div>
                                <div class="col-md-3 sm-wrapper">
                                    <p>{{$post->type}}</p>
                                </div>
                            </div>
                            <div class="triangle"></div>
                            <small>{{timeElapsed($post->created_at)}}</small>
                            <div class="snowflake">
                                <img src="{{asset('images/icons/star.svg')}}" alt="">
                            </div>
                        </div>
                    </div>
                </a> 
                @endforeach 
            </div>
            <div class="cta-post">
                <a href="{{route('job_posts')}}">Browse more jobs</a>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="about">
            <div class="section-title-wrapper">
                <h2>Value proposition</h2>
                <p>Our recruitment service creates a pleasant hiring experience for both  job seekers and employers</p>
                </div>
            <div class="cards">
                <div class="left">
                    <img src="{{asset('images/about_left.jpg')}}" alt="">
                </div>
                <div class="mid">
                    <img src="{{asset('images/icons/handshake.svg')}}" alt="">
                    <h3>Find great talent</h3>
                    <p>Be sure to have your pages set up with the latest design and development standards.  </p>
                    <a class="orange-box">
                        <button class="btn btn-orange" data-toggle="modal" data-target="#employer-form">Register as employer </button>
                    </a>
                </div>
                <div class="right">
                    <img src="{{asset('images/icons/briefcase-frontal-view.svg')}}" alt="">
                    <h3>Find great talent</h3>
                    <p>Be sure to have your pages set up with the latest design and development standards.  </p>
                        <a class="orange-box" href="{{route('login')}}">
                            <button class="btn btn-orange">Register as job seeker</button>
                        </a>
                </div>
            </div>
        </div>
    </div>
    <div class="services">
        <div class="section-title-wrapper">
            <h2>Our services</h2>
            <p>Our recruitment service creates a pleasant hiring experience for both  job seekers and employers</p>
            </div>
        <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
              <div class="carousel-item active">

                <img src="{{asset('images/carousel_one.jpg')}}" class="d-block w-100" alt="...">
                <div class="content">
                    <img src="{{asset('images/icons/recruitment.svg')}}" alt="">
                    <h3>Find great talent</h3>
                    <p>of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining 
                        essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop
                    </p>
                    <a class="orange-box">
                        <button class="btn btn-orange" data-toggle="modal" data-target="#employer-form">Register as employer </button>
                    </a>
                </div>
              </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="sr-only">Next</span>
            </a>
          </div>
    </div>
    <div class="container">
        <div class="blog-post">
            <div class="section-title-wrapper">
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
                                    <b class="blog-card-title">{{Str::limit($bpost->link,50)}}</b>
                                    <p>{{Str::limit($bpost->caption,90)}}</p>
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
                @endforeach
            </div>
        </div>
    </div>

  <!-- Modal -->
@endsection