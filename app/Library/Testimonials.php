<?php namespace App\Library;

    use stdClass;
    use App\Library\Testimonial;

    class Testimonials
    {
        public $testimonial;

        function __construct()
        {
            $this->testimonial = new stdClass();
        }

        public function items() :array
        {
            return [
                new Testimonial(
                    "t1",
                    "images/icons/man-user.svg",
                    "Candidate",
                    "Said Omary",
                    "Sales Operation Officer",
                    "I am eternally grateful to Top Talented Recruits for getting me this job. your work is awesome!"
                ),
                new Testimonial(
                    "t2",
                    "images/icons/man-user.svg",
                    "Candidate",
                    "Jackson",
                    "Logistics Officer",
                    "Landed this job without much hustle all thanks to Top Talented Recruits.."
                ),
                new Testimonial(
                    "t3",
                    "images/icons/man-user.svg",
                    "Candidate",
                    "Obeja",
                    "Tours Sales Executive",
                    "Couldn't have been a tours manager if it weren't for the work done by TTR. My heartfelt thanks to this amazing platform!!"
                ),
                new Testimonial(
                    "t4",
                    "images/icons/man-user.svg",
                    "Candidate",
                    "Gwamaka",
                    "Sales and Marketing Manager",
                    "Beautiful isn't it? I am always amazed as to how TTR has made all this possible!!!"
                ),
                new Testimonial(
                    "t5",
                    "images/icons/man-user.svg",
                    "Candidate",
                    "Raphia Twalib",
                    "Executive Personal Assistance",
                    "All I can say is thanks and congratulations to all the services provided by TTR!"
                ),
                new Testimonial(
                    "t6",
                    "images/icons/man-user.svg",
                    "Client",
                    "Halima",
                    "HR Manager - Suvacor",
                    "Really helped me get the personnel that were required"
                ),
                new Testimonial(
                    "t7",
                    "images/icons/man-user.svg",
                    "Client",
                    "Elizabeth",
                    "HR Manager - Kamal",
                    "Recruitment made easier!! Much thanks to TTR"
                ),
                new Testimonial(
                    "t8",
                    "images/icons/man-user.svg",
                    "Client",
                    "Farida",
                    "HR & Admin Manager",
                    "A team is built better with people with mismatching yet collaborative skills. TTR makes this possible!"
                ),
                new Testimonial(
                    "t9",
                    "images/icons/man-user.svg",
                    "Client",
                    "Muumba",
                    "HR Manager",
                    "Sometimes it is not only about building inhouse talents, but outsourcing is... TTR steps in most beautifully!!"
                ),
                new Testimonial(
                    "t10",
                    "images/icons/man-user.svg",
                    "Client",
                    "Said",
                    "General Manager - Regency Hotel",
                    "A much helpful tool to manage outsourcing clients and able people"
                ),
                new Testimonial(
                    "t11",
                    "images/icons/man-user.svg",
                    "Client",
                    "Kindo",
                    "HR Manager Banc ABC",
                    "You never know when you need a comprehensive background check for your new recruits. Turn to TTR to rest your mind!!"
                ),
                new Testimonial(
                    "t12",
                    "images/icons/man-user.svg",
                    "Client",
                    "Dorina",
                    "HR Manager Raha",
                    "Very exquisite piece of technology. It has a very high promising value in the economic world!"
                ),
            ];
        }
    }