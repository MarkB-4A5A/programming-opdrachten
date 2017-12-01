<?php

require 'class-ball.php';

    class MagicBall extends Ball {

        private $size = 0;
        protected $type = '';

        public function show() {
            return 'Class: ' . get_class($this) . ' Size: ' . $this->size;
        }

        public function __set() {
          
        }

    }

    $magicBall = new MagicBall();
