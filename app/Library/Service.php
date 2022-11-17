<?php
    namespace App\Library;

    class Service {
        
        public $id;
        public $icon;
        public $title;
        public $short_description;
        public $description;

        function __construct($id, $icon, $title, $short_description, $description)
        {
            $this->id = $id;
            $this->icon = $icon;
            $this->title = $title;
            $this->short_description = $short_description;
            $this->description = $description;
        }
    }