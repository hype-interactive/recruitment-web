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
                    "images/partners/suvacor.png",
                    "Client",
                    "Halima",
                    "HR Manager - Suvacor",
                    "The necessary personnel were obtained with the assistance that was provided, and it was determined to be effective in achieving that goal."
                ),
                new Testimonial(
                    "t7",
                    "images/partners/kamal.png",
                    "Client",
                    "Elizabeth",
                    "HR Manager - Kamal",
                    "TTR's assistance made the recruitment process easier and efficient. They are appreciated for the support and guidance provided."
                ),
                // new Testimonial(
                //     "t8",
                //     "images/icons/man-user.svg",
                //     "Client",
                //     "Farida",
                //     "HR & Admin Manager",
                //     "TTR enables the building of teams with a diverse set of skills that complement and collaborate effectively. This leads to a stronger and better team."
                // ),
                // new Testimonial(
                //     "t9",
                //     "images/icons/man-user.svg",
                //     "Client",
                //     "Muumba",
                //     "HR Manager",
                //     "TTR expertly balances in-house and outsourced talent, building strong and adaptable teams. Their skills in this area are valuable."
                // ),
                new Testimonial(
                    "t10",
                    "images/partners/regency.png",
                    "Client",
                    "Said",
                    "General Manager - Regency Hotel",
                    "A helpful tool for managing outsourcing clients and identifying qualified individuals exist, making the process more efficient and effective."
                ),
                new Testimonial(
                    "t11",
                    "images/partners/bankabclogo.png",
                    "Client",
                    "Kindo",
                    "HR Manager Banc ABC",
                    "A comprehensive background check for new recruits can be done to ensure that they are reliable and trustworthy, providing peace of mind for employers."
                ),
                new Testimonial(
                    "t12",
                    "images/partners/raha.png",
                    "Client",
                    "Dorina",
                    "HR Manager Raha",
                    "Advanced technology that holds great potential to bring value to the economic world exists, it is an exquisite piece of technology that can bring great benefits."
                ),
            ];
        }
    }