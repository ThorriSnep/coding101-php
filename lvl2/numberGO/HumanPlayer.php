<?php

include_once "BasePlayer.php";

class HumanPlayer extends BasePlayer {
    
    public function initGame() {
        $input = (int)readline("Pleases input the number int in [1,10] to guess: ");
        $this->numberToGuess = $input;
        system("clear");
    }
    
}
