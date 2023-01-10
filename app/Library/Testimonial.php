<?php
    namespace App\Library;

    class Testimonial {
        
        public $id;
        public $image;
        public $type;
        public $name;
        public $title;
        public $quote;

        function __construct($id, $image, $type, $name, $title, $quote)
        {
            $this->id = $id;
            $this->image = $image;
            $this->type = $type;
            $this->name = $name;
            $this->title = $title;
            $this->quote = $quote;
        }
    }