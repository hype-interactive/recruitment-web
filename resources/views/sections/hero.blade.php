<div class="landing-wrapper" >

    <div id="carouselExampleCaptions" class="carousel slide w-100" data-bs-ride="carousel" >
      <div class="carousel-indicators">
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="3" aria-label="Slide 4"></button>
      </div>
      <div class="carousel-inner">
        <div class="carousel-item active">
          <img src="{{asset('images/recruitment.png')}}" class="d-block w-40" alt="...">
          <div class="carousel-caption d-none d-md-block">
            <h3>Recruitment Services</h3>
            <p>Hiring the right person in the right place at the right time can save your business</p>
            <a href="{{route('services')}}">
              <button class="btn btn-orange">Read More</button>
           </a>
          </div>
        </div>
        <div class="carousel-item">
          <img src="{{asset('images/workpermit.png')}}" class="d-block w-40" alt="...">
          <div class="carousel-caption d-none d-md-block">
            <h3>Permit Consultancy</h3>
            <p>We provide a full range of immigration and labour solutions to help get people to their desired job in Tanzania</p>
              <a href="{{route('services')}}">
                  <button class="btn btn-orange">Read More</button>
              </a>
          </div>
        </div>
        <div class="carousel-item">
          <img src="{{asset('images/training.png')}}" class="d-block  w-40" alt="...">
          <div class="carousel-caption d-none d-md-block">
            <h3>Training Services</h3>
            <p>Our experience in developing customized training solutions to meet busines needs and our learner-centered training approach ensures that learned skils become behaviours</p>
            <a href="{{route('services')}}">
              <button class="btn btn-orange">Read More</button>
            </a>
          </div>
        </div>
        <div class="carousel-item">
          <img src="{{asset('images/man_sourcing.png')}}" class="d-block w-40" alt="...">
          <div class="carousel-caption d-none d-md-block">
            <h3>Outsourcing and Consulting services</h3>
            <p>We offer the ability for our clients to outsource some of their non-core departments enabling  them to concentrate on their core competencies.</p>
            <a href="{{route('services')}}">
              <button class="btn btn-orange">Read More</button>
            </a>
          </div>
        </div>
      </div>
      <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions"  data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions"  data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
      </button>
    </div>

  <div class="blur"></div>
</div>