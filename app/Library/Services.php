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
                    "Recruitment Services",
                    "We match candidates to job vacancies,working with companies directly to help fill their roles. Their consultants' source new opportunities,edit and optimise CVs,and even provide pointers to help candidates prepare for interviews",
                    "We match candidates to job vacancies,working with companies directly to help fill their roles. Their consultants' source new opportunities,edit and optimise CVs,and even provide pointers to help candidates prepare for interviews. We match candidates to job vacancies,working with companies directly to help fill their roles. Their consultants' source new opportunities,edit and optimise CVs,and even provide pointers to help candidates prepare for interviews."
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
                    "Along with this, if your company requires a specific kind of employee for a specific project, a manpower service provider allow you to find the employees as per your business requirement",
                    "Along with this, if your company requires a specific kind of employee for a specific project, a manpower service provider allow you to find the employees as per your business requirement. Along with this, if your company requires a specific kind of employee for a specific project, a manpower service provider allow you to find the employees as per your business requirement. Along with this, if your company requires a specific kind of employee for a specific project, a manpower service provider allow you to find the employees as per your business requirement"
                ),
                new Service (
                    "sv_5",
                    "images/icons/consult.svg",
                    "Reference and Background Checks Facilities",
                    "We look up criminal, commercial and financial records of a candidate. Whereas, a refresh check looks to find the perfect employee fit, and protect your compnay from a poor performer or bad hire.",
                    "We look up criminal, commercial and financial records of a candidate. Whereas, a refresh check looks to find the perfect employee fit, and protect your compnay from a poor performer or bad hire. We look up criminal, commercial and financial records of a candidate. Whereas, a refresh check looks to find the perfect employee fit, and protect your compnay from a poor performer or bad hire. We look up criminal, commercial and financial records of a candidate. Whereas, a refresh check looks to find the perfect employee fit, and protect your compnay from a poor performer or bad hire."
                ),
                new Service (
                    "sv_6",
                    "images/icons/consult.svg",
                    "Performance Management & Appraisals",
                    "Performance management is the proces of identifying,measuring,managing,and developing the performance of the human resources in an organization.",
                    "Performance management is the proces of identifying,measuring,managing,and developing the performance of the human resources in an organization. Performance management is the proces of identifying,measuring,managing,and developing the performance of the human resources in an organization. Performance management is the proces of identifying,measuring,managing,and developing the performance of the human resources in an organization."
                ),
                new Service (
                    "sv_7",
                    "images/icons/consult.svg",
                    "CV W riting Services",
                    "We help job-seekers to improve the quality of their resumes so they stand out from other candidates.",
                    "We help job-seekers to improve the quality of their resumes so they stand out from other candidates. We help job-seekers to improve the quality of their resumes so they stand out from other candidates. We help job-seekers to improve the quality of their resumes so they stand out from other candidates."
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