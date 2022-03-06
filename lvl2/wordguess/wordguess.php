<?php

require_once "CpuPlayer.php";
require_once "RealPlayer.php";

print("Game type:\n1) Multiplayer\n2) vs. CPU\n");
$gameType = (int)readline("Input game type: ");

switch ($gameType) {
    case 1:
        $realPlayer1 = new RealPlayer();
        $realPlayer1->initGame();
        $realPlayer1->outputHint();
        $realPlayer1->inputGuess();
        break;
    case 2:
        // $dificultyArr = [1, 2, 3, 4];
        print("Dificulty:\n1) Easy (3-5)\n2) Medium (6-10)\n3) Hard (11-20)\n4) Academic (20-∞)\n");
        $setDificulty = (int)readline("Input dificulty: ");
        /* if(!in_array($setDificulty, $dificultyArr)) {
            exit("invalid input\n");
        } */
        $cpuPlayer1 = new CpuPlayer();
        $cpuPlayer1->getWordsLocal("LICENSE");
        $cpuPlayer1->setDificulty($setDificulty);
        $cpuPlayer1->outputHint();
        $cpuPlayer1->inputGuess();
        break;
    default:
        exit("Something went wrong (invalide input)\n");
}
