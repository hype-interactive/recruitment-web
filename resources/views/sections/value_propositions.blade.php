<div class="container animated-bt">
    <div class="about">
        <div class="ttr-section-header">
            <h2>Value proposition</h2>
            <p>Our recruitment service creates a pleasant hiring experience for both job seekers and employers</p>
            </div>
        <div class="cards row">
            <div class="mid col-sm">
                <img src="{{asset('images/icons/handshake.svg')}}" alt="">
                <h4>Find great talent</h4>
                <p>We  help you to identify your manpower requirements whilst considering the nature of your business, working practices, systems, processes and industry norms.  </p>
                <a class="orange-box">
                    <button type="button" class="btn btn-orange" data-bs-toggle="modal" data-bs-target="#employerForm">Register as employer </button>
                </a> 
            </div>
            <div class="left col-sm">
                <img src="{{asset('images/about_left.jpg')}}" alt="">
            </div>
            
            <div class="right col-sm">
                <img src="{{asset('images/icons/briefcase-frontal-view.svg')}}" alt="">
                <h4>Find great employer</h4>
                <p>We connect you to the best companies and recruiting agencies and help you to get your dream job that suits your profile.  </p>
                    <a class="orange-box" href="{{route('register')}}">
                        <button class="btn btn-orange">Register as job seeker</button>
                    </a>
            </div>
        </div>
    </div>
</div>