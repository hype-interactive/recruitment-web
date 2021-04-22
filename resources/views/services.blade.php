@extends('layouts.app')
@section('body')
<div class="container">
  
</div>
@include('shared.services')
<script>
  function hideAll() {
    document.getElementById('recruitment').style.display='none';
    document.getElementById('permit').style.display='none';
    document.getElementById('training').style.display='none';
    document.getElementById('consultancy').style.display='none';
  }

  function showContent(id) {
      hideAll();
      document.getElementById(id).style.display='block';
      setTimeout(function () {
          hideAll();
      },60000);
  }


</script>
@endsection