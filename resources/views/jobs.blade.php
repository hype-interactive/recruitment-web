@extends('layouts.app')
@section('body')
    <div class="container">
        <div class="jobs-header">
            <div class="search-bar">
                <div class="search-box">
                    <input type="text" onkeyup="fromSearch(this.value)" placeholder="Search By Job  Keyword">
                    <img src="{{asset('images/icons/loupe.svg')}}" alt="">
                </div> 
                <div class="search-button desktop_item">
                    SEARCH
                </div> 
            </div>
        </div>

        <div class="row">
            <div class="col-md-3 filter desktop_item" >
                <form action="">
                    <h6>Work Category :</h6>
                    <ul>
                            @foreach ($industries as $industry)
                                <li> <input type="checkbox" class="custom-control-input check-box" id="{{$industry->id}}C" onchange="checkAction(this.id)"> <span>{{$industry->name}}</span></li>
                            @endforeach
                    </ul>
                    <h6>Working hours :</h6>
                    <ul>
                        <li> <input type="checkbox" class="custom-control-input check-box" id="1T" onchange="checkAction(this.id)"> <span>Full time</span></li>
                        <li> <input type="checkbox" class="custom-control-input check-box" id="2T" onchange="checkAction(this.id)"> <span>Part time</span></li>
                    </ul>
                    <h6>Location :</h6>
                    <ul id="regions_list">
                        @foreach ($regions as $region)
                            <li> <input type="checkbox" class="custom-control-input check-box" id="{{$region->id}}R" onchange="checkAction(this.id)"> <span>{{$region->name}}</span></li>
                        @endforeach
                    </ul>
                    <button type="button" id="show_more" class="btn btn-orange btn-sm float-end mb-2" onclick="showMore('regions_list')">Show more</button>
                    <button type="button" id="show_less" style="display: none" class="btn btn-orange btn-sm float-end mb-2" onclick="showLess('regions_list')">Show less</button>
                </form>
            </div>
            <div class="col-md-6  job-list">
                <div class="row" id="post_list">
                @foreach ($job_posts as $post)
                    <a href="{{route('job_post',$post->id)}}">
                        <div class="banner">
                                <div class="col">
                                    <b>{{$post->jobCategory->name}}</b>
                                    <p class="title">{{Str::limit($post->title,75)}}</p>
                                    <ul>
                                        <li class="location"><img src="{{asset('images/icons/location.svg')}}" alt="">{{$post->region->name}}</li>
                                        <li class="desktop_item"><img src="{{asset('images/icons/lightbulb.svg')}}" alt=""> Deadline; {{date_format(date_create($post->deadline),"d-M-Y")}}</li>
                                    </ul>
                                </div>
                                <div class="sm-wrapper">
                                    <p>{{$post->type}}</p>
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

            <div class="col-md-3 urgent-jobs">
                {{-- Urgent Job Posts --}}

                @if (count($urgent_posts) > 0)
                    @foreach ($job_posts as $post)
                        @if ($post->is_urgent)
                        <a href="{{route('job_post',$post->id)}}">
                            <div class="urgent-job-banner">
                                <div class="">
                                    <b>{{ $post->jobCategory->name }}</b>
                                    <ul>
                                        <li class="location">{{ $post->region->name }}</li>
                                        <li class="desktop_item"> Deadline; {{date_format(date_create($post->deadline),"d-M-Y")}}</li>
                                    </ul>
                                </div>
                                {{-- @if () --}}
                                    <div class="closed blink">URGENT</div>
                                {{-- @endif --}}
                            </div>
                        </a>
                        @endif
                    @endforeach
                @else
                    <h5 class="text-center mt-2">No Urgent Posts</h5>
                @endif

                
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
                // console.log(this.responseText);
                if(resp.length == 0){
                    var noresult_str='<div class="col-sm-12 nodata"><img src="/images/nodata.jpeg" alt=""><h3 class="text-danger">No result found !</h3></div>';
                    document.getElementById('post_list').innerHTML=noresult_str;

                }else{
                var post_container='';
                for (let index = 0; index < resp.length; index++) {
                    post_container+="<a href='job/"+resp[index].id+" '><div class='banner'><div class='col'><b>"+ resp[index].job_category.name +"</b><p class='title'>"+resp[index].title +"</p><ul><li class='location'><img src='{{asset('images/icons/location.svg')}}' >"+ resp[index].region.name+"</li><li class='desktop_item'><img src='{{asset('images/icons/lightbulb.svg')}}' > Deadline; "+ strToDate( resp[index].deadline)+"</li></ul></div><div class='sm-wrapper'><p>"+resp[index].type+"</p></div><div class='triangle'></div><small>today</small><div class='snowflake'><img src='{{asset('images/icons/star.svg')}}'></div></div></a>"                

                }
                //populate results into html
                document.getElementById('post_list').innerHTML=post_container;
                }
            }
        }
        // create request
        xmlhttp.open("GET","search_jobs/?q="+str,true);
        xmlhttp.send();
    }
    function reFill(str) {
        if(str.length = 0){
        document.getElementById('post_list').innerHTML="@foreach ($job_posts as $post)<a href='{{route('job_post',$post->id)}}'><div class='banner'><div class='row'><div class='col-md-9'><b>{{$post->jobCategory->name}}</b><p class='title'>{{Str::limit($post->title,75)}}</p><ul><li class='location'><img src='{{asset('images/icons/location.svg')}}' >{{$post->region->name}}</li><li class='location'><img src='{{asset('images/icons/lightbulb.svg')}}' > Deadline; {{date_format(date_create($post->deadline),'d-M-Y')}}</li></ul>'</div><div class='col-md-3 sm-wrapper'><p>{{$post->type}}</p></div></div><div class='triangle'></div><small>{{timeElapsed($post->created_at)}}</small><div class='snowflake'><img src='{{asset('images/icons/star.svg')}}'></div></div></a>@endforeach";
    }


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
    }

    function reductFilter(value) {
        var index = filter_array.indexOf(value);

        if (index > -1) {
            filter_array.splice(index, 1);
        }
    }

    function fromSearch(str) {
        var code = "000";
        showResults(code.concat(str));
    }

    function checkAction(id) {
       var checkbox = document.getElementById(id);
       if (checkbox.checked == true ){
           addFilter(id);
           showResults(filter_array.join())
       }
       if (checkbox.checked != true){
            reductFilter(id);
            showResults(filter_array.join())
       }
    }

    function showMore(id) {
        var target=document.getElementById(id).style;
        target.height="unset";
        target.overflow="visible";

        hide('show_more');
        show('show_less');

    }

    function showLess(id) {

        var target=document.getElementById(id).style;
        target.height="493px";
        target.overflow="hidden"

        hide('show_less');
        show('show_more');
        
    }
    function show(id) {
        document.getElementById(id).style.display="block";
        
    }
    function hide(id) {
        document.getElementById(id).style.display="none";
    }
</script>

    
@endsection

