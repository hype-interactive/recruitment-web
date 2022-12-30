<?php namespace App\Library;

    use stdClass;
    use App\Library\Service;

    class Services
    {
        public $service;

        function __construct()
        {
            $this->service = new stdClass();
        }

        public function items() :array
        {
            return [
                new Service (
                    "sv_1",
                    "images/icons/recruitment.svg",
                    "Staff Recruitment Services",
                    "Manpower planning, recruitment and retention are critical business condiderations that contribute directly to an organization's ability to build a skilled workforce and achieve its goals",
                    "
                        <h5 class='text-primary'>How can we help you</h5>
                        <br>
                        <p>We can help you to identify your manpower requirements whilst considering the nature of your business, working practices, systems, processes and industry norms.</p>
                        <p>We provide hands on support from developing detailed job descriptions, to designing and implementing robust recruitment and selection tools, up to and including CEO level.</p>
                        <p>top talented has worked extensively with clients to design, develop and implement retention strategies to attract and retain talent. We take a holistic view of the employment relationship and see total reward strategies, the employee proposition and long term incentive programmes as key levers to achieve success.</p>
                        <p>Selecting from the vast pool of recruitment service providers can be a daunting task. At Top Talent Recruits, we beleive that our role is that of a strategic recruitment partner weoking with you, as opposed to simply another recruitment pcompany offering a service to you. We invest time, energy, money and resources in order to understand your core business, values, and corporate culture. This allows us to attract the best possible and most well-matched talent to meet your most exacting job specification, whether it is for a permanent, contract or shor-term staffing solution.</p>
                        <br>
                        <h5 class='text-primary'>Tailored / Conventional / Optimized</h5>
                        <ul>
                            <li>Recruitment and selection of permanent staff, from advertising the position to finalizing terms and conditions of employment</li>
                            <li>Provision of short term staff for holiday cover, seasonal support, or ad-hoc projects</li>
                            <li>Provision of medium or long-term contract staff, thus relieving you of all statutory reporting, administrative, performance management and industrial relationship procedures.</li>
                            <li>Analysis of human capital requirements and creation of appropriate and cost-effective recruitment solutions, ranging from handling advertisement response to the provision of dedicated in-house talent scouts.</li>
                        </ul>
                        <h5 class='text-black'>Extended Services</h5>
                        <h5 class='text-primary'>Executive Search Projects</h5>
                        <p>Our non-intrusive, discreet and totally confidential headhunting service can find top performers for your top positons. Our expertise is primarily across all market sectors.</p>
                        <br>
                        <h5 class='text-primary'>Management of Large-Scale Recruitment Projects</h5>
                        <p>We have gained considerable experience inthe stup, initialization, staffing and management of call centers for several international companies and are now considered highly proficient in this domain. We can cover everything involved in the setup and monthly management of call centers, from sourcing and equipping the premises to managing the staff on a daily basis and running the payroll. </p>
                        <h6 class='text-inherit'>Value Added Services</h6>
                        <ul>
                            <li>Advertisement response handling</li>
                            <li>Neutral confidential interview venues, countrywide</li>
                            <li>Job profiling and grading</li>
                            <li>Candidate profiling</li>
                        </ul>
                    "
                ),
                new Service (
                    "sv_2",
                    "images/icons/passport.svg",
                    "Work Permit and Residential Licence Services",
                    "We help you in getting official documents giving a foreigner permision to take a job and live in a country.",
                    "We help you in getting official documents giving a foreigner permision to take a job and live in a country. We help you in getting official documents giving a foreigner permision to take a job and live in a country. We help you in getting official documents giving a foreigner permision to take a job and live in a country."
                ),
                new Service (
                    "sv_3",
                    "images/icons/presentation.svg",
                    "Training & Team Building",
                    "The purpose of team building activities is to motivate your people to work together,to develop their strengths,and to address any weakneses.",
                    "The purpose of team building activities is to motivate your people to work together,to develop their strengths,and to address any weakneses. The purpose of team building activities is to motivate your people to work together,to develop their strengths,and to address any weakneses. The purpose of team building activities is to motivate your people to work together,to develop their strengths,and to address any weakneses."
                ),
                new Service (
                    "sv_4",
                    "images/icons/consult.svg",
                    "Manpower outsourcing and management",
                    "Top talented Recruits has the experience and flexibility to ensure that our clients receive the highest caliber of immigration services and labour.",
                    "
                        <p>Top talented Recruits has the experience and flexibility to ensure that our clients receive the highest caliber of immigration services and labour. We provide a full range of immigration and labour solutions to help get people to their desired job in Tanzania - on time and in compliance with local immigration laws and regulations. </p>
                    "
                ),
                new Service (
                    "sv_5",
                    "images/icons/bcheck.svg",
                    "Reference and Background Checks Facilities",
                    "We look up criminal, commercial and financial records of a candidate. Whereas, a refresh check looks to find the perfect employee fit, and protect your compnay from a poor performer or bad hire.",
                    "We look up criminal, commercial and financial records of a candidate. Whereas, a refresh check looks to find the perfect employee fit, and protect your compnay from a poor performer or bad hire. We look up criminal, commercial and financial records of a candidate. Whereas, a refresh check looks to find the perfect employee fit, and protect your compnay from a poor performer or bad hire. We look up criminal, commercial and financial records of a candidate. Whereas, a refresh check looks to find the perfect employee fit, and protect your compnay from a poor performer or bad hire."
                ),
                new Service (
                    "sv_6",
                    "images/icons/performance.svg",
                    "Performance Management & Appraisals",
                    "Performance management is the proces of identifying,measuring,managing,and developing the performance of the human resources in an organization.",
                    "Performance management is the proces of identifying,measuring,managing,and developing the performance of the human resources in an organization. Performance management is the proces of identifying,measuring,managing,and developing the performance of the human resources in an organization. Performance management is the proces of identifying,measuring,managing,and developing the performance of the human resources in an organization."
                ),
                new Service (
                    "sv_7",
                    "images/icons/cv.svg",
                    "CV W riting Services",
                    "We help job-seekers to improve the quality of their resumes so they stand out from other candidates.",
                    "We help job-seekers to improve the quality of their resumes so they stand out from other candidates. We help job-seekers to improve the quality of their resumes so they stand out from other candidates. We help job-seekers to improve the quality of their resumes so they stand out from other candidates."
                ),
                new Service (
                    "sv_8",
                    "images/icons/cv.svg",
                    "Products and Services Activations",
                    "Top Talented always deploys high end skills in carrying out tasked assignment. With this product we make sure branding and visibility is at 100% standard.",
                    "
                    <p>Top Talented always deploys high end skills in carrying out tasked assignment. With this product we make sure branding and visibility is at 100% standard. </p>
                    <p> We apply, </p>
                    <ul>
                        <li>Multitouch event marketing plan</li>
                        <li>Interactive popup experience</li>
                        <li>Experiential show casing</li>
                        <li>Road shows and demonstration</li>
                        <li>Administering billboards and handbills at a glance</li>
                    </ul>
                    "
                ),
            ];
        }

        public function getService(string $id) :Service
        {
            $services = $this->items();
            foreach ($services as $service) {
                if ($service->id == $id) {
                    return $service;
                }
            }
        }
    }