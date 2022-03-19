<?php

class BasePlayer {
    public $numberToGuess;
    
    public function inputGuess() {
        $guessAmount = 0;
        $running = true;
        while ($running) {
            if ($guessAmount == 3) {
                exit("You reched the max ammount of guesses. Plese try again. The number was: ".$this->numberToGuess."\n");
            }
            $userGuess = readline("Input guess: ");
            if ($userGuess == $this->numberToGuess) {
                exit("Congrats you got it!\n");
            } else {
                evaluateGuess($userGuess);
                $guessAmount++;
            }
        }
    }
    
    private function evaluateGuess($guess) {
        if ($guess < $this->numberToGuess) {
            print("to big");
        } elseif ($guess > $this->numberToGuess) {
            print("to smol");
        } else {
            exit("Something went wrong\n");
        }
    }
    
    
}
