<?php

session_start();

include 'class-player.php';
include 'class-game.php';


$player = new Player();
$player->name = 'Mark';

$game = new Game($player->name);
$game->startGame();


if (isset($_GET['show_cup'])) {
    $checkWin = $game->checkWin();
    if ($checkWin === true) {
        print 'You win!';
    } else {
        print 'You lose, restart!';
    }
}

if (isset($_POST['restart'])) {
    $game->restartGame();
}


include 'view.php';
