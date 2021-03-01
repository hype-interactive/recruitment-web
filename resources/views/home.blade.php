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
                {{-- <form action="get" method="{{route('search_job')}}"> --}}

                <div class="search-bar">
                        <div class="search-box">
                            <img src="{{asset('images/icons/loupe.svg')}}" alt="">
                            <input type="text" name="search">
                        </div>
                        <div class="industry">
                            <select class="custom-select" name="category">
                                <option selected>Categories</option>
                                @foreach ($categories as $category)
                                    <option value="{{$category->id}}">{{$category->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="location">
                            <select class="custom-select" name="location">
                            <option selected>Location</option>
                                @foreach ($regions as $region)
                                    <option value="{{$region->id}}">{{$region->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        {{ csrf_field() }}
                        <a style="width:18%" href="{{route('job_posts')}}">
                        <button class="btn btn-orange search-button" type="submit">Search</button>
                        </a>
                        
                </div>
            {{-- </form>   --}}

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
                    <div class="orange-box">Register as employer</div>
                </div>
                <div class="right">
                    <img src="{{asset('images/icons/briefcase-frontal-view.svg')}}" alt="">
                    <h3>Find great talent</h3>
                    <p>Be sure to have your pages set up with the latest design and development standards.  </p>
                    <a href="{{route('login')}}"> 
                        <div class="orange-box">Register as job seeker</div>
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
                    <div class="orange-box">Register as employer</div>
                </div>
              </div>
              {{-- <div class="carousel-item">
                <img src="..." class="d-block w-100" alt="...">
              </div>
              <div class="carousel-item">
                <img src="..." class="d-block w-100" alt="...">
              </div> --}}
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
            </div>
        </div>
    </div>

    <!-- Button trigger modal -->
{{-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#yudaModal">
    Launch demo modal
  </button> --}}
  
  <!-- Modal -->
  
   
@endsection