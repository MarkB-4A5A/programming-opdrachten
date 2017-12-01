<?php

interface BallInterface {

    /**
     * Return ball information with intention to display in element
     * @return string
     */
    public function show();

    /**
     * Return string of called object
     * @return string
     */
    public function __toString();
}

class Ball implements BallInterface {
    public $color = '';

    public function show() {
        $string = '<div class="ball '.$this->color.'"></div>';

        return $string;
    }

    public function __toString() {
        return $this->show();
    }
}
