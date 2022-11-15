<div class="container">
    <div class="post-banners">
        <div class="ttr-section-header">
            <h2>Latest Jobs</h2>
            <p>Browse latest job vacancies from top companies and recruiters in Tanzania.</p>
            </div>
        <div class="row">
            @foreach ($posts as $post)
                <div class="col-md-6">
                    <a href="{{route('job_post',$post->id)}}">
                        <div class="banner">
                                <div class="col">
                                    <b>{{$post->jobCategory->name}}</b>
                                    <ul>
                                        <li class="location"><img src="{{asset('images/icons/location.svg')}}" alt="">{{$post->region->name}}</li> 
                                        <li class="desktop_item"><img src="{{asset('images/icons/lightbulb.svg')}}" alt=""> Deadline: {{date_format(date_create($post->deadline),"d-M-Y")}}</li>
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
                    </a>
                </div>
            @endforeach 
        </div>
        <div class="ttr-section-footer">
            <a href="{{route('job_posts')}}">
                <button class="btn btn-orange">Browse more jobs</button>
            </a>
        </div>
    </div>
</div>