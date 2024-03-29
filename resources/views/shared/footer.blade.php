<div class="footer">
    <div class="upper">
        <div class="container">
            <div class="row">
                <div class="col-md-5 contacts">
                    <h4>Contact Us</h4>
                    <ul>
                        <li>
                            <img src="{{asset('images/icons/phone-white.svg')}}" alt="">
                            {{-- +255 677 000 011 / +255 752 111 225 --}}
                            <div>
                                <div><a href="tel:+255677000011">+255 677 000 011</a></div>
                                <div><a href="tel:+255767422717">+255 767 422 717</a></div>
                            </div>
                        </li>
                        <li>
                            <img src="{{asset('images/icons/location-white.svg')}}" alt="">
                            
                            <a href="https://goo.gl/maps/FAJUXS2TtV6381vf6" target="_blank">5th Floor Wing A, Ohio Street, Golden Jubilee Tower, Dar es Salaam, Tanzania</a>
                        </li>
                        <li>
                            <img src="{{asset('images/icons/email-white.svg')}}" alt="">
                            <a href="mailto:info@toptalentedrecruits.co.tz">info@toptalentedrecruits.co.tz</a>
                        </li>
                    </ul>
                </div>
                <div class="col-md-1"></div>
                <div class="col-md-4 links">
                    <h4>Helpful links</h4>
                    <ul>
                        <li><a href="{{route('home')}}">Home</a></li>
                        <li><a href="{{route('job_posts')}}">Jobs</a></li>
                        <li><a href="{{route('services')}}">Services</a></li>
                        <li><a href="{{route('about_us')}}">About Us</a></li>
                    </ul>
                </div>
                <div class="col-md-2 social">
                    <h4>Follow Us</h4>
                    <ul>
                        <li>
                            <a href="https://www.facebook.com/TTRTanzania" target="_blank"><img src="{{asset('images/icons/facebook-white.svg')}}" alt="">
                            Facebook</a>
                        </li>
                        <li>
                            <a href="https://www.instagram.com/toptalentedrecruits/" target="_blank"><img src="{{asset('images/icons/instagram-white.svg')}}" alt="">   Instagram</a>
                         
                        </li>
                      
                        <li>
                            <a href="https://tz.linkedin.com/company/top-talented-recruits-ltd?trk=public_profile_experience-item_result-card_subtitle-click" target="_blank"><img src="{{asset('images/icons/linkedin-white.svg')}}" alt="">  Linkedin</a>

                        </li>
                      
                        {{-- <li>
                            <img src="{{asset('images/icons/globe-white.svg')}}" alt="">
                            blog
                        </li> --}}
                        <li></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="lower">
        <span>© {{date('Y')}} - Rights Reserved . Top Talented Recruits</span>
    </div>
</div>