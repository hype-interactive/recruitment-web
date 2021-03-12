@extends('layouts.app')
@section('body')
<div class="container">
    <div class="about-header">
        <h4><b>WE HELP YOU FIND THE RIGHT PERSON FOR THE JOB</b></h4>
        <h1>SKILLS YOU NEED.THE PEOPLE YOU WANT</h1>
        <hr>
    </div>
</div>
<div class="container">
    <div class="about-top">
        <div class="row">
            <div class="col-md-8">
                <p>     In deserunt ut velit anim consequat sunt elit qui dolore officia tempor. Anim pariatur proident sit dolore ad eu magna mollit. Nulla ex velit elit sint minim sint tempor. Sit ullamco occaecat enim tempor culpa ullamco deserunt elit. Ex sunt aliquip cillum esse do in ea excepteur fugiat. Aute proident sint dolore eiusmod non amet dolor. Ad tempor excepteur eu Lorem sunt elit nisi.

                Cillum consectetur ullamco in cillum magna. Elit proident culpa amet do dolor commodo dolore ipsum excepteur id culpa sint elit id. Culpa culpa proident irure adipisicing laborum quis tempor.

                Ut adipisicing consectetur voluptate consequat cupidatat non consequat minim. Ipsum voluptate esse minim irure cupidatat nisi reprehenderit quis laboris aute enim non non laborum. Culpa proident laborum nulla sint consectetur. Reprehenderit nostrud proident minim aliqua pariatur do cillum sint dolor. Exercitation sint do non id enim. Laboris ipsum culpa eu adipisicing quis occaecat veniam laborum eiusmod eu ullamco.</p>
            </div>
            <div class="col-md-4">
                <img src="{{asset('images/mac.jpg')}}" alt="">
            </div>
        </div>
    </div>
</div>
<div class="container">
    <h2>Meet Our Team :</h2>
    <div class="row about-card">
         <div class="col-md-offset-1 col-md-4">
             <img src="{{asset('images/profile-1.jpg')}}" alt="">
         </div>
         <div class="col-md-6 offset-md-1">
                 <h4>Chief Excutive Officer</h4>
                 <hr>
                 <p>Ad ut irure non irure id aute. Id proident ea velit laborum aliquip eiusmod aute nulla culpa eu. Et esse aliqua sit veniam ipsum dolore sint nostrud laborum qui anim. In eiusmod sunt aute Lorem tempor mollit minim.
                     Nulla elit ut ut id enim fugiat deserunt consequat cupidatat deserunt adipisicing reprehenderit sunt officia. Do culpa nostrud duis Lorem officia incididunt mollit consectetur esse velit nostrud. Magna sunt nisi eiusmod eiusmod esse velit laborum est consectetur exercitation culpa. Ipsum officia officia ullamco veniam sunt occaecat non elit. Labore duis qui consequat ut.</p>
                 <small>Jimmy Mc Methew</small>
         </div>
    </div>
    <div class="row about-card">
        <div class="col-md-offset-1 col-md-6">
            <h4>Marketing Manager</h4>
            <hr>
            <p>Ad ut irure non irure id aute. Id proident ea velit laborum aliquip eiusmod aute nulla culpa eu. Et esse aliqua sit veniam ipsum dolore sint nostrud laborum qui anim. In eiusmod sunt aute Lorem tempor mollit minim.
                Nulla elit ut ut id enim fugiat deserunt consequat cupidatat deserunt adipisicing reprehenderit sunt officia. Do culpa nostrud duis Lorem officia incididunt mollit consectetur esse velit nostrud. Magna sunt nisi eiusmod eiusmod esse velit laborum est consectetur exercitation culpa. Ipsum officia officia ullamco veniam sunt occaecat non elit. Labore duis qui consequat ut.</p>
            <small>Jimmy Mc Methew</small>
        </div>
        <div class="col-md-4">
            <img src="{{asset('images/profile-2.jpg')}}" alt="">
        </div>

   </div>
   <div class="row about-card">
    <div class="col-md-offset-1 col-md-4">
        <img src="{{asset('images/profile-3.jpg')}}" alt="">
    </div>
    <div class="col-md-6 offset-md-1">
            <h4>Photographer</h4>
            <hr>
            <p>Ad ut irure non irure id aute. Id proident ea velit laborum aliquip eiusmod aute nulla culpa eu. Et esse aliqua sit veniam ipsum dolore sint nostrud laborum qui anim. In eiusmod sunt aute Lorem tempor mollit minim.
                Nulla elit ut ut id enim fugiat deserunt consequat cupidatat deserunt adipisicing reprehenderit sunt officia. Do culpa nostrud duis Lorem officia incididunt mollit consectetur esse velit nostrud. Magna sunt nisi eiusmod eiusmod esse velit laborum est consectetur exercitation culpa. Ipsum officia officia ullamco veniam sunt occaecat non elit. Labore duis qui consequat ut.</p>
            <small>Jimmy Mc Methew</small>
    </div>
</div>
</div>
<div class="container">
    <div class="blog-post">
        <div class="section-title-wrapper">
        <h2>From our expert blog</h2>
        <p>Consequat anim ullamco quis ea ad aute.</p>
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
@endsection