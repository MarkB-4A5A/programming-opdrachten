<?php

include 'class-cup.php';
include 'class-ball.php';

class Game {

    public $cups = [];
    private $ball = null;
    public $player = null;

    public function __construct($player) {
        $this->player = $player;
        $this->cups = [
            new Cup('yellow','plastic'),
            new Cup('yellow','plastic'),
            new Cup('yellow','plastic')
        ];

        $this->ball = new Ball();
        $this->ball->color = 'blue';
    }

    public function startGame() {
        if (!isset($_SESSION['cup'])) {
            $random_cup = $this->cups[array_rand($this->cups)];
            $random_cup->ball = $this->ball;
            $save = array_keys($this->cups, $random_cup);
            $_SESSION['cup'] = $save[0];
        } else {
            $this->cups[$_SESSION['cup']]->ball = $this->ball;
        }
    }

    public function checkWin() {
        $this->cups[$_GET['show_cup']]->liftUp();

        if ($_GET['show_cup'] == $_SESSION['cup']) {
            return true;
        } else {
            return false;
        }
    }

    public function restartGame() {
        header('Location: index.php');
        unset($_SESSION['cup']);
    }


}
