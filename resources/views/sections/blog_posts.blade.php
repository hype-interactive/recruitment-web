<div class="container animated-bt">
    <div class="blog-post">
        <div class="ttr-section-header">
            <h2>From our expert blog</h2>
            <p>Improve your knowledge, skills and get the best industry tips</p>
        </div>
        <div class="row">
            @foreach ($blog_posts as $bpost)
                    <div class="col-md-4">
                        <div class="tcard">
                            <div class="image">
                                <img src="{{Storage::url($bpost->image)}}" alt="">
                                <p>Advice</p>
                            </div>
                            <div class="body">
                                <b class="blog-card-title">{{Str::limit($bpost->title,80)}}</b>
                                <div class="caption">
                                    <p>
                                        {!!Str::limit($bpost->caption,90)!!}
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