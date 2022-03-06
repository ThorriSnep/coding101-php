<?php

class RealPlayer {
    public $wordToGuess;

    public function initGame() {
        $wordToGuess = readline("Pleases input the word to guess: ");
        $this->wordToGuess = $wordToGuess;
        system("clear");
    }

    public function outputHint() {
        $wordToGuess = $this->wordToGuess ;
        $firstLetter = $wordToGuess[0];
        $lastLetter = $wordToGuess[strlen($wordToGuess) - 1];
        $lengthString = strlen($wordToGuess);
        print "first letter: $firstLetter, last letter:  $lastLetter, lenth string: $lengthString\n";   
    }

    public function inputGuess() {
        $guessAmount = 0;

        $running = true;
        while ($running) {
            if ($guessAmount == 3) {
                exit("You reched the max ammount of guesses. Plese try again. It was: ".$this->wordToGuess."\n");
            }
            $userGuess = readline("Input guess: ");
            if ($userGuess == $this->wordToGuess) {
                exit("Congrats you got it!\n");
            } else {
                print "Wrong!\n";
                $guessAmount++;
            }
        }
    }
}