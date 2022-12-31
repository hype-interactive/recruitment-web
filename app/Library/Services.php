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
                    "Manpower planning, recruitment and retention are critical business considerations that contribute directly to an organization's ability to build a skilled workforce and achieve its goals",
                    "
                        <h5 class='text-primary'>How can we help you</h5>
                        <br>
                        <p>We can help you to identify your manpower requirements whilst considering the nature of your business, working practices, systems, processes and industry norms.</p>
                        <p>We provide hands on support from developing detailed job descriptions, to designing and implementing robust recruitment and selection tools, up to and including CEO level.</p>
                        <p>top talented has worked extensively with clients to design, develop and implement retention strategies to attract and retain talent. We take a holistic view of the employment relationship and see total reward strategies, the employee proposition and long term incentive programmes as key levers to achieve success.</p>
                        <p>Selecting from the vast pool of recruitment service providers can be a daunting task. At Top Talent Recruits, we believe that our role is that of a strategic recruitment partner working with you, as opposed to simply another recruitment company offering a service to you. We invest time, energy, money and resources in order to understand your core business, values, and corporate culture. This allows us to attract the best possible and most well-matched talent to meet your most exacting job specification, whether it is for a permanent, contract or short-term staffing solution.</p>
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
                        <p>Our non-intrusive, discreet and totally confidential headhunting service can find top performers for your top positions. Our expertise is primarily across all market sectors.</p>
                        <br>
                        <h5 class='text-primary'>Management of Large-Scale Recruitment Projects</h5>
                        <p>We have gained considerable experience in the setup, initialization, staffing and management of call centers for several international companies and are now considered highly proficient in this domain. We can cover everything involved in the setup and monthly management of call centers, from sourcing and equipping the premises to managing the staff on a daily basis and running the payroll. </p>
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
                    "Work Permit and Residential License Services",
                    "Top talented Recruits has the experience and flexibility to ensure that our clients receive the highest caliber of immigration services and labour.",
                    "
                        <p>Top talented Recruits has the experience and flexibility to ensure that our clients receive the highest caliber of immigration services and labour. We provide a full range of immigration and labour solutions to help get people to their desired job in Tanzania - on time and in compliance with local immigration laws and regulations. </p>
                        <p>
                            The team has experienced consultants (attorneys) who provide a broad range of services including
                        </p>
                        <ul>
                            <li>Temporary work and residence permits</li>
                            <li>Counseling on entry and departure procedures; Consultation on how to fill the entry and departure forms</li>
                            <li>Guidance and assistance with permit applications for investors</li>
                            <li>Dependent/family member passes processing, ability to work and/or volunteer, student-related matters and maintenance of status</li>
                            <li>Advisory and technical support to foreigners in occurrence of any conflict with the immigration</li>
                        </ul>
                    "
                ),
                new Service (
                    "sv_3",
                    "images/icons/presentation.svg",
                    "Training & Team Building",
                    "The purpose of team building activities is to motivate your people to work together, to develop their strengths, and to address any weaknesses.",
                    "
                        <p>We provide high end training for staff support in their skill development. Knowledge and attitude change towards work. Prior to rolling out any of the programs end to end our experienced trainers conduct Training Needs Analysis (TNA) which is performed featuring tha learners in order to gather more insight for creation of sustainable transformation in your organization. This Training intervention will be followed b y a Performance Audit to check the skills transferability at the work place.</p>
                        <p>
                            We divide our interventions into five areas which are analyze, design, develop, implement and evaluation which are all conducted at the pace of each stage
                        </p>
                        <p>
                            Top talented with skilled an experienced facilitators use mixed approaches and methodologies in making sure desired objective of the session is achieved, some of the methods include: Brainstorming, simulations, business games, Group activities, Case studies, Role plays, individual presentation, videos work place scenarios, ice breakers and energizers and many more.
                        </p>
                        <p>
                            Virtual learning methods is also among the packages we offer whereby we make sure we deliver and create learning journeys that map the learners' interests, aspirations, and can help them as 'career pathways'. In our virtual sessions we make sure all learners are cached by modern approaches which are engagements for all workers - remote learners and creating of immersive virtual concentration by using multiple learning aids.
                        </p>
                    "
                ),
                new Service (
                    "sv_4",
                    "images/icons/consult.svg",
                    "Manpower outsourcing and management",
                    "We endeavour to ensure that we lessen the day to day activities related with the supervision and management of staff to allow organizations to focus on their core and strategic objectives for maximum ROI.",
                    "
                        <p>Staff management forms an integral part of the H.R. process in efficient delivery of services. We endeavour to ensure that we lessen the day to day activities related with the supervision and management of staff to allow organizations to focus on their core and strategic objectives for maximum ROI, this includes, payroll processing, leave the management as well as performance management amongst others. </p>
                        <p>Top Talented Recruits offers a partial or total outsourcing solution fro small medium and large sized organizations. Be it transactional services like payroll or the complete HR function, Top Talented Recruits has the expertise and resource to support this. How we can help you:</p>
                        <ul>
                            <li>Temporary work and residence permits, entry clearances, entry visas and passports.</li>
                            <li>Document procurement, including acquisition, translation, legalization and attestation.</li>
                            <li>Guidance and assistance with permit applications for investors; Dependent/family member passes processing, ability to work and/or volunteer, student-related matters and maintenance of status.</li>
                        </ul>
                    "
                ),
                new Service (
                    "sv_5",
                    "images/icons/bcheck.svg",
                    "Reference and Background Checks Facilities",
                    "We look up criminal, commercial and financial records of a candidate. Whereas, a refresh check looks to find the perfect employee fit, and protect your company from a poor performer or bad hire.",
                    "
                        <p>Our experienced Human Resource consultants complete Personal Reference checks by interviewing a subject's former or current colleagues. Our researchers will provide a comprehensive overview of a person's characteristics. In case of Background checks - the package includes: Criminal Background Check via police records.</p>
                        <h6 class='text-inherit'>Executive Coaching</h6>
                        <p>Executive coaching can help leaders fine tune what they do and exceed expectations. It can help your senior management through times of change and can help them enhance the quality of their internal and external relations. Do you want someone to challenge your thinking and help you figure out what works well and what does not?</p>
                        <h6 class='text-inherit'>How we can help you</h6>
                        <p>top talented coach will be your thinking partner, someone with whom your team can safely and honestly talk through issues and ideas in a confidential setting. Our coaching sessions last around 2 hours and we recommend attending faithfully.</p>
                    "
                ),
                new Service (
                    "sv_6",
                    "images/icons/performance.svg",
                    "Board Room Facilities",
                    "From business and board meetings to interviews, business presentations, seminars and workshops your room will be configured according to your needs and event.",
                    "
                        <p>From business and board meetings to interviews, business presentations, seminars and workshops your room will be configured according to your needs and event</p>
                        <p>For business meetings, Corporate trainings, Home office users, Training venue and Business travelers. Enjoy superior working conditions, including state-of-the-art equipment and technical support staff who will help you with any specific requirements. We will even answer your phone calls in your business's name</p>
                        <p>Our conference facilities feature the latest audio and video conferencing technologies as well as high-speed Wi-Fi for easy communication between attendees.</p>
                        <p>All our conference facilities include: Video Conferencing, Catering and Refreshments, Premium Coffee & Tea, Interactive Screen/Projector and Office Supplies</p>
                    "
                ),
                new Service (
                    "sv_7",
                    "images/icons/grad.svg",
                    "Graduate Search & Training",
                    "Our specialty. With our ability to leverage off our marketing penetration and our vast network of contacts in Tanzania, we are able to source the best talent for your organization.",
                    "
                        <h6 class='text-inherit'>TGraduate and Internship Recruitment</h6>
                        <p>Our specialty. With our ability to leverage off our marketing penetration and our vast network of contacts in Tanzania, we are able to source the best talent for your organization.</p>
                        <p>Value added services:</p>
                        <ul>
                            <li>Advertisement response handling</li>
                            <li>Neutral Confidential Interview venues, countrywide</li>
                            <li>Job profiling and grading</li>
                            <li>Candidate profiling</li>
                        </ul>
                        <h6 class='text-inherit'>TGraduate and Internship Training</h6>
                        <p>We offer bridging training for your graduates and interns, to get them ready for the workplace.</p>
                        <p>1 day effective training courses that covers work ethic, email etiquette to name but a few, to ensure that the transition from the classroom to the workplace is a seamless one.</p>
                    "
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
                        <li>Multi-touch event marketing plan</li>
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