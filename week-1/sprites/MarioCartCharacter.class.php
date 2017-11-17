<?php

    class GameCharacterSet {

        public $set = '';

    }

    class MarioCartCharacter extends GameCharacterSet {

        protected $name = '';

        public function __construct() {

        }

        public function getHTML($element) {
            return '<' . $element . ' class="' . $this->set . ' ' . strtolower($this->name) . '"></'.$element.'>';
        }

        public function __toString() {
            return $this->getHTML('div');
        }

        public function walk() {
            print $this->name .' is now walking! <br />';
        }

    }


    class Toad extends MarioCartCharacter {

        public function __construct() {
            $this->name = get_class($this);
        }

        public function swim() {
            print $this->name .' is now swimming! <br />';
        }
    }
