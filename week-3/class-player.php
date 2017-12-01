<?php

class Player {
    public $name = '';

    /**
     * Return player information for the view
     * @param  integer $score    Score of a player
     * @return string            Player information for the view
     */
    public function show($score = 0) {
        $string = '<div class="player">';
        $string .= '<strong>'.$this->name.': '. $score . '</strong>';
        $string .= '</div>';

        return $string;
    }

    /**
     * Return string of object
     * @return string Player properties
     */
    public function __toString() {
        return $this->show();
    }

}
