<?php

interface CupInterface {

    public function __construct($color, $type);

    /**
     * Lift up a cup
     * @return void
     */
    public function liftUp();

    /**
     * Put down a cup
     * @return void
     */
    public function putDown();

    /**
     * Put down a cup
     * @return string
     */
    public function show();

}

class Cup {
    private $color = '';
    private $type = '';
    private $positionUp = false;
    public $ball = null;


    public function __construct($color, $type) {
        $this->color = $color;
        $this->type = $type;
    }



    public function liftUp() {
        $this->positionUp = true;
    }

    public function putDown() {
        $this->positionUp = false;
    }

    public function show() {
        $pos = '';

        if ($this->positionUp) {
            $pos = 'liftup';
        } else {
            $pos = 'putdown';
        }

        $string = '<div class="cup '.$this->color.' '. $pos . '">';

        if ($this->ball != null) {
            $string .= $this->ball;
        }

        $string .= '</div>';

        return $string;
    }

    public function __toString() {
        return $this->show();
    }
}
