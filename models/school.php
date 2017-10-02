<?php
    class School {
        public $Name;
        public $City;
        public $State;
        public $Mascot;
        public $Url;

        public function __construct($name, $city, $state, $mascot) {
            $this->Name = $name;
            $this->City = $city;
            $this->State = $state;
            $this->Mascot = $mascot;
        }
    }
?>