@extends('layouts.app')
@section('body')
    <div class="container">
        <div class="jobs-header">
            <div class="search-bar">
                
                <div class="industry">
                    <select class="custom-select">
                        <option value="" selected>Industry</option>
                        @foreach ($industries as $industry)
                            <option value="{{$industry->id}}">{{$industry->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="location">
                    <select class="custom-select">
                        <option selected>Location</option>
                        @foreach ($regions as $region)
                            <option value="{{$region->id}}">{{$region->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="location">
                    <select class="custom-select">
                        <option selected>Time</option>
                        <option value="1">Latest</option>
                        <option value="2">This week</option>
                        <option value="3">This month</option>
                    </select>
                </div>
                <div class="search-box">
                    <input type="text" onkeyup="showResults(this.value)">
                    <img src="{{asset('images/icons/loupe.svg')}}" alt="">
                </div> 
                <div class="search-button">
                    SEARCH
            </div> 
            </div>
        </div>
        <div class="row">
            <div class="col-md-4 filter col-offset-md-8">
                <form action="">

                    <h4>Advanced Filter</h4>
                    <h5>Work Category :</h5>
                    <ul>
                            @foreach ($industries as $industry)
                                <li> <input type="checkbox" class="custom-control-input check-box" id="customCheck1"> <span>{{$industry->name}}</span></li>
                            @endforeach
                    </ul>
                    <h5>Working hours :</h5>
                    <ul>
                        <li> <input type="checkbox" class="custom-control-input check-box" id="customCheck1"> <span>Full time</span></li>
                        <li> <input type="checkbox" class="custom-control-input check-box" id="customCheck1"> <span>Part time</span></li>
                    </ul>
                    <h5>Location :</h5>
                    <ul>
                        <li> <input type="checkbox" class="custom-control-input check-box" id="customCheck1"> <span>Dar es Salaam</span></li>
                        <li> <input type="checkbox" class="custom-control-input check-box" id="customCheck1"> <span>Tanga</span></li>
                        <li> <input type="checkbox" class="custom-control-input check-box" id="customCheck1"> <span>Mwanza</span></li>
                        <li> <input type="checkbox" class="custom-control-input check-box" id="customCheck1"> <span>Mbeya</span></li>
                        <li> <input type="checkbox" class="custom-control-input check-box" id="customCheck1"> <span>Iringa</span></li>
                    </ul>
                </form>
            </div>
            <div class="col-md-8  job-list">
                <div class="row" id="post_list">
                @foreach ($job_posts as $post)
                    <a href="{{route('job_post',$post->id)}}">
                        <div class="banner">
                            <div class="row">
                                <div class="col-md-9">
                                    <b>{{$post->jobCategory->name}}</b>
                                    <p class="title">{{Str::limit($post->title,75)}}</p>
                                    <ul>
                                        <li class="location"><img src="{{asset('images/icons/location.svg')}}" alt="">{{$post->region->name}}</li>
                                        <li class="location"><img src="{{asset('images/icons/lightbulb.svg')}}" alt=""> Deadline; {{date_format(date_create($post->deadline),"d-M-Y")}}</li>
                                        {{-- <li class="location"><img src="{{asset('images/icons/signal-level.svg')}}" alt=""> Internship</li> --}}
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
                    </a>
                    @endforeach
                </div>
                
            </div>
        </div>
    </div>
    <script type="text/javascript">
    // show resultsn method
    // 
    function showResults(str) {
    // check input
    if(str.length = 0){
        document.getElementById('post_list').innerHTML="@foreach ($job_posts as $post)<a href='{{route('job_post',$post->id)}}'><div class='banner'><div class='row'><div class='col-md-9'><b>{{$post->jobCategory->name}}</b><p class='title'>{{Str::limit($post->title,75)}}</p><ul><li class='location'><img src='{{asset('images/icons/location.svg')}}' >{{$post->region->name}}</li><li class='location'><img src='{{asset('images/icons/lightbulb.svg')}}' > Deadline; {{date_format(date_create($post->deadline),'d-M-Y')}}</li></ul>'</div><div class='col-md-3 sm-wrapper'><p>{{$post->type}}</p></div></div><div class='triangle'></div><small>{{timeElapsed($post->created_at)}}</small><div class='snowflake'><img src='{{asset('images/icons/star.svg')}}'></div></div></a>@endforeach";
    }
    // ajax xmlhttp request
    var xmlhttp = new  XMLHttpRequest();
    xmlhttp.onreadystatechange= function () {
        //check successful results
        if(this.readyState == 4 && this.status == 200){
            resp=JSON.parse(this.responseText);
            var post_container='';
            console.log(resp[0].region)
            for (let index = 0; index < resp.length; index++) {
                post_container+="<a href='{{route('job_post',"+resp[index].id+")}}'><div class='banner'><div class='row'><div class='col-md-9'><b>"+ resp[index].job_category.name +"</b><p class='title'>"+resp[index].title +"</p><ul><li class='location'><img src='{{asset('images/icons/location.svg')}}' >"+ resp[index].region.name+"</li><li class='location'><img src='{{asset('images/icons/lightbulb.svg')}}' > Deadline; "+ strToDate( resp[index].deadline)+"</li></ul></div><div class='col-md-3 sm-wrapper'><p>"+resp[index].type+"</p></div></div><div class='triangle'></div><small>today</small><div class='snowflake'><img src='{{asset('images/icons/star.svg')}}'></div></div></a>"                

            }
            //populate results into html
            document.getElementById('post_list').innerHTML=post_container;
        }
    }
    // create request
    xmlhttp.open("GET","search_jobs/?q="+str,true);
    xmlhttp.send();
    }

    function strToDate(str_date) {
        if(!str_date){
            return "not cited !";
        }
        var x=new Date(str_date);
        return x.toDateString();
    }
    
    </script>
@endsection

                {{-- // post_container+="<a href='{{route('job_post',"+resp[index].id+")}}'><div class='banner'><div class='row'><div class='col-md-9'><b>"+resp[index].jobCategory.name+"</b><p class='title'>{{Str::limit("+resp[index].title+",75)}}</p><ul><li class='location'><img src='{{asset('images/icons/location.svg')}}' >"+resp[index].region.name+"</li><li class='location'><img src='{{asset('images/icons/lightbulb.svg')}}' > Deadline; {{date_format(date_create("+resp[index].deadline+"),'d-M-Y')}}</li></ul>'</div><div class='col-md-3 sm-wrapper'><p>"+resp[index].type+"</p></div></div><div class='triangle'></div><small>{{timeElapsed("+resp[index].created_at+")}}</small><div class='snowflake'><img src='{{asset('images/icons/star.svg')}}'></div></div></a>"      --}}
