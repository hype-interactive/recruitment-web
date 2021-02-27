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
        <tbody id="livesearch">
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
</div>
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
  Launch demo modal
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog  modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
<script>
  function showResult(str) {
    if (str.length==0) {
      document.getElementById("livesearch").innerHTML="@for ($i = 0; $i < count($applications); $i++)<tr><th scope='row'>{{$i}}</th><td >{{$applications[$i]->user->fname}} {{$applications[$i]->user->lname}}</td><td>{{$applications[$i]->user->email}}</td><td>{{$applications[$i]->user->phone}}</td><td class='{{$applications[$i]->status == 'rejected' ? 'red': ($applications[$i]->status == 'selected' ? 'green':' '  ) }}''>{{$applications[$i]->status}}</td><td><a href='{{route('admin.application',$applications[$i]->id)}}'>View</a></td></tr>@endfor";
      return;
    }
    var xmlhttp=new XMLHttpRequest();
    xmlhttp.onreadystatechange=function() {
      if (this.readyState==4 && this.status==200) {

        resp= JSON.parse(this.responseText);
        var table_rows='';
        console.log(resp[0]);
        for(let index = 0; index <resp.length; index++){
          table_rows+='<tr><th scope="row">'+[index+1] +'</th><td>'+resp[index].user.fname + resp[index].user.sname+'</td><td >'+resp[index].user.email+'</td><td>'+resp[index].user.phone+'</td><td class="'+setClass(resp[index].status)+'">'+resp[index].status+'</td><td><a href="appliaction/'+resp[index].id+'">View</a></td></tr>'
        }
        document.getElementById("livesearch").innerHTML=table_rows;
      }
    }
    xmlhttp.open("GET","/admin/application_search/?q="+str,true);
    xmlhttp.send();
  }

  function setClass(status) {
    if(status == "rejected"){
      return "red";
    }
    if( status == "selected"){
      return "green";
    }else{
      return "";
    }
    
  }
  </script>
@endsection
