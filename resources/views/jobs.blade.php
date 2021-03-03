@extends('layouts.app')
@section('body')
    <div class="container">
        <div class="jobs-header">
            <div class="search-bar">
                <div class="search-box">
                    <input type="text" onkeyup="showResults(this.value)" placeholder="Search By Job  Keyword ,or Job key word">
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
                        <li> <input type="checkbox" class="custom-control-input check-box" id="1" onchange="checkAction(this.id)"> <span>Dar es Salaam</span></li>
                        <li> <input type="checkbox" class="custom-control-input check-box" id="2" onchange="checkAction(this.id)"> <span>Tanga</span></li>
                        <li> <input type="checkbox" class="custom-control-input check-box" id="3" onchange="checkAction(this.id)"> <span>Mwanza</span></li>
                        <li> <input type="checkbox" class="custom-control-input check-box" id="4" onchange="checkAction(this.id)"> <span>Mbeya</span></li>
                        <li> <input type="checkbox" class="custom-control-input check-box" id="5" onchange="checkAction(this.id)"> <span>Iringa</span></li>
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
            console.log(resp)
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

    var filter_array = [];

    function addFilter(value) {
        filter_array.push(value);
        filter()  
    }
    function reductFilter(value) {
        var index = filter_array.indexOf(value);

        if (index > -1) {
            filter_array.splice(index, 1);
        }

        filter();
    }
    function filter() {
        var filter_str=filter_array.join();
        var identifire="000,";
        var  filter_raw = identifire.concat(filter_str);

        showResults(filter_raw); 
    }

    function checkAction(id) {
        value = id;
       var checkbox = document.getElementById(id);
       if (checkbox.checked == true ){
           addFilter(value);
       }
       if (checkbox.checked != true){
            reductFilter(value);
       }
    }
    </script>
    
@endsection

