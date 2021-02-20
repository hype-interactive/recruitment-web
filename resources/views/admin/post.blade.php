@extends('layouts.master_layout')
@section('page-summary')
<div class="row search-bar">
    <div class=" col-md-2 title"> Application </div>
    <form action="">

    <div class=" col-md-7 search-box">
          <input style="width: 95%" type="text" onkeyup="showResult(this.value)">
        <img src="{{asset('images/icons/loupe.svg')}}" alt="">
    </div>
    <div class="col-md-2 filter">
        <select name="filter" id=""  class="custom-select">
        <option value="">selected</option>
        <option value="">reserved</option>
        <option value="">oldest</option>
        <option value="">latest</option>
    </select>
    </div>
  </form>

</div>  
@endsection
@section('body')
<div class="applicant">

    <table class="table table-striped">
        <thead >
          <tr >
            <th scope="col">#</th>
            <th scope="col" >Name</th>
            <th scope="col">Email</th>
            <th scope="col">Phone</th>
            <th scope="col">Status</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
            @for ($i = 0; $i < count($applications); $i++)
            <tr>
                <th scope="row">{{$i}}</th>
                <td >{{$applications[$i]->user->fname}} {{$applications[$i]->user->lname}}</td>
                <td>{{$applications[$i]->user->email}}</td>
                <td>{{$applications[$i]->user->phone}}</td>
                <td class="{{$applications[$i]->status == "rejected" ? "red": ($applications[$i]->status == "selected" ? "green":""  ) }}">{{$applications[$i]->status}}</td>
                <td><a href="{{route('admin.application',$applications[$i]->id)}}">View</a></td>
              </tr>
            @endfor
        </tbody>
      </table>
      <div id="livesearch"></div>
</div>
<script>
  function showResult(str) {
    if (str.length==0) {
      document.getElementById("livesearch").innerHTML="";
      document.getElementById("livesearch").style.border="0px";
      return;
    }
    var xmlhttp=new XMLHttpRequest();
    xmlhttp.onreadystatechange=function() {
      if (this.readyState==4 && this.status==200) {
        document.getElementById("livesearch").innerHTML=this.responseText;
        document.getElementById("livesearch").style.border="1px solid #A5ACB2";
      }
    }
    xmlhttp.open("GET","/admin/application_search/?q="+str,true);
    xmlhttp.send();
  }
  </script>
@endsection