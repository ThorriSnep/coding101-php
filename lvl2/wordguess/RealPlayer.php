<?php

require_once "BasePlayer.php";

class RealPlayer extends BasePlayer {
    
    public function initGame() {
        $wordToGuess = readline("Pleases input the word to guess: ");
        $this->wordToGuess = $wordToGuess;
        system("clear");
    }
}
