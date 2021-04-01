@extends('layouts.app')
@section('body')
<div class="container">
  <div class="services-page-header">
    <h1>What we do</h1>
    <p>Our services provides you with a comprehensive range of Human Resources Solutions with a business focus</p>
  </div>
</div>
<div class="container">
<div class="service-cards-wrapper">
  <div class="row">


    <div class="col-md-3 ">
      <div class="service-card">
        <img src="{{asset('images/icons/recruitment.svg')}}" alt="">
        <h5>Recruitment Services</h5>
        <small>We match candidates to job vacancies,working with companies directly to help fill their roles. Their consultants' source new opportunities,edit and optimise CVs,and even provide pointers to help candidates prepare for interviews.</small>
    
        {{-- <a onclick="showContent('recruitment')">
          <img src="{{asset('images/icons/right-arrow.svg')}}" alt="">
        </a> --}}
      </div>
    </div>
    <div class="col-md-3 ">
      <div class="service-card">
        <img src="{{asset('images/icons/passport.svg')}}" alt="">
        <h5>Work Permits</h5>
        <small>
          We help you in getting official documents giving a foreigner permision to take a job and live in a country.
          </small>
      
        {{-- <a onclick="showContent('permit')">
          <img src="{{asset('images/icons/right-arrow.svg')}}" alt="">
        </a> --}}
      </div>
    </div>
    <div class="col-md-3 ">
      <div class="service-card">
        <img src="{{asset('images/icons/presentation.svg')}}" alt="">
        <h5>Training & Team Building</h5>
        <small>The purpose of team building activities is to motivate your people to work together,to develop their strengths,and to address any weakneses.
        </small>

        {{-- <a onclick="showContent('training')">
          <img src="{{asset('images/icons/right-arrow.svg')}}" alt="">
        </a> --}}
      </div>
    </div>
    <div class="col-md-3 ">
      <div class="service-card">
        <img src="{{asset('images/icons/consult.svg')}}" alt="">
        <h5>Manpower outsourcing and management</h5>
        <small>Along with this, if your company requires a specific kind of employee for a specific project, a manpower service provider allow you to find the employees as per your business requirements</small>
                            
        {{-- <a onclick="showContent('consultancy')">
          <img src="{{asset('images/icons/right-arrow.svg')}}" alt="">
        </a> --}}
      </div>
    </div>
  </div>
  <div class="service-content">
    <div id="recruitment" style="display: none">
      <p>    Veniam ex excepteur culpa reprehenderit adipisicing duis consequat cupidatat quis. Cupidatat sint nulla qui enim ullamco irure consequat voluptate sint. Officia adipisicing velit dolore deserunt enim eiusmod elit exercitation eiusmod labore est proident nisi eiusmod. Non irure laborum dolore ut culpa eu anim ullamco magna est nostrud est.

        Nulla laboris in voluptate enim voluptate sit commodo cillum ipsum aliqua non aliqua qui. Dolore pariatur sint veniam nisi aliquip irure. Elit ex amet dolore excepteur eiusmod sit ea duis quis nostrud officia ut tempor pariatur. Adipisicing mollit esse excepteur dolore dolore. Id pariatur elit consequat est ullamco aliqua tempor.</p>
    </div>
    <div id="permit" style="display: none"> 
        <p>
          Dolor dolore est mollit aliqua esse. Duis proident consequat elit laborum duis in officia laborum mollit non. In ea nisi officia qui culpa ea et culpa. Amet ad proident labore adipisicing irure velit labore enim occaecat esse. Veniam est cillum ea adipisicing eiusmod. Consectetur excepteur veniam est tempor eiusmod.

          Exercitation ipsum sint amet voluptate incididunt excepteur ullamco pariatur veniam consectetur sunt incididunt occaecat. Aliquip ut reprehenderit commodo magna cupidatat cillum irure aute eu reprehenderit sit incididunt sint amet. Esse quis do fugiat dolore consequat nulla nisi voluptate et. Occaecat nisi Lorem enim enim ut aliqua veniam in esse fugiat occaecat consequat.
          
          Adipisicing voluptate ea proident ad ut nisi et dolor sit. Proident incididunt consequat velit in magna anim reprehenderit reprehenderit fugiat. In voluptate dolore deserunt Lorem esse cillum sit quis consectetur voluptate elit qui. Adipisicing incididunt aliquip ut elit non irure. Incididunt dolor nostrud esse et dolore amet occaecat eu minim sunt dolore nulla ullamco. Aliquip nostrud proident esse velit Lorem sunt reprehenderit magna eiusmod labore sint culpa.
        </p>
    </div>
    <div id="training" style="display: none"> 
        <p>
          Magna tempor exercitation eu non Lorem irure labore adipisicing. Nisi eiusmod ea eiusmod occaecat deserunt esse ea. Ad enim ad in consequat consectetur qui quis. Aliqua eu nostrud labore occaecat pariatur ad. Et velit officia quis occaecat.

          Laborum ipsum veniam aliquip laborum mollit veniam incididunt adipisicing. Irure excepteur Lorem occaecat irure est. Sint Lorem dolor esse reprehenderit culpa cillum proident aute elit. Proident enim consectetur laboris non do pariatur duis veniam consectetur minim esse amet. Magna cupidatat est laboris tempor officia.
          
          Quis commodo labore voluptate ad anim occaecat. Incididunt sint do est reprehenderit esse id. Aute deserunt culpa aute cillum velit cillum est nostrud ipsum incididunt do.
        </p>
    </div>
    <div id="consultancy" style="display: none">
        <p>
          Est nulla quis laborum ut ad sint. Fugiat sint laboris aliqua proident velit incididunt ad nostrud. Pariatur cillum nulla ea ipsum cupidatat voluptate magna velit nulla proident ullamco eiusmod culpa ullamco. Ut irure elit exercitation consequat commodo exercitation tempor deserunt excepteur et consectetur laboris eu. Ad nulla incididunt minim qui cupidatat minim ea magna. Ea dolore velit cupidatat commodo Lorem ut ex id esse exercitation. Lorem reprehenderit incididunt ullamco qui deserunt.

          Commodo cupidatat et ullamco sunt incididunt deserunt. Eiusmod do irure consequat officia in fugiat commodo. Ut cillum consectetur eiusmod nisi.
          
          Amet nulla ut minim sunt velit aliquip ea eiusmod do ipsum duis et anim cillum. Culpa laborum labore consectetur esse nulla laborum veniam do labore do. Qui ipsum ea voluptate aute velit excepteur esse in exercitation consequat mollit ullamco ut sint. Qui eiusmod est laboris sint ex velit eu et aliqua mollit aute esse officia labore. Deserunt dolore esse duis occaecat aliqua cillum aute quis.
        </p>
    </div>
  </div>
</div>
</div>
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