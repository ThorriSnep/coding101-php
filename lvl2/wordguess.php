<?php

class CpuPlayer {
    public $dificulty;
    private $wordArray;
    public $wordToGuess;

    public function setDificulty($dificulty) {
        /*  1) Easy (3-5)
        *   2) Medium (6-10)
        *   3) Hard (11-20)
        *   4) Academic (20-∞) */
        $this->dificulty = $dificulty;
    }

    public function getWordsLocal($wordFilePath) {
        $fileContent = file_get_contents($wordFilePath);

        $charsToRm = ["(C)", "\n", "\r", ",", ".", "-", "<", ">", "´", "'", "`", "(", ")", "1", "2", "3", "4", "5", "6", "7", "8", "9", "0", "\"", ";"];
        $fileContent = str_replace($charsToRm, " ", $fileContent);
        $whiteSpaceCount = 1;

        while ($whiteSpaceCount > 0) {
            $fileContent = str_replace("  ", " ", $fileContent, $whiteSpaceCount);
        }

        $fileContent = trim($fileContent);
        $wordArr = explode(" ", $fileContent);

        $this->wordArray = $wordArr;
    }

    public function getWordsWiki($wikiTopic) {
        $fileContentJson = file_get_contents("https://en.wikipedia.org/w/api.php?action=query&format=json&errorformat=none&prop=revisions&titles=$wikiTopic&formatversion=2&rvprop=content&rvslots=*");
        $fileContentRaw = json_decode($fileContentJson, true);
        $fileContent = $fileContentRaw["query"]["pages"][0]["revisions"][0]["slots"]["main"]["content"];
        $charsToRm = ["<br>", "</br>", "</ref>", "<ref>", "(C)", "\n", "\r", ",", ".", "-", "<", ">", "´", "'", "`", "(", ")", "1", "2", "3", "4", "5", "6", "7", "8", "9", "0", "\"", ";", "{", "}", "[", "]", "=", ":", "|", "_", "ref", "/", "\\", "&", "?", "$", "@", "%", "§", "*", "#", "'", "~", "^", "°", "!"];
        $fileContent =  str_replace($charsToRm, " ", $fileContent);
        $whiteSpaceCount = 1;

        while ($whiteSpaceCount > 0) {
            $fileContent = str_replace("  ", " ", $fileContent, $whiteSpaceCount);
        }

        $fileContent = trim($fileContent);
        $wordArr = explode(" ", $fileContent);

        $this->wordArray = $wordArr;
    }

    private function getDificultyWords($wordArr, $dificulty) {
        switch ($dificulty) {
            case 1:
                $wordMin = 3;
                $wordMax = 5;
                break;
            case 2:
                $wordMin = 6;
                $wordMax = 10;
                break;
            case 3:
                $wordMin = 11;
                $wordMax = 20;
                break;
            case 4:
                $wordMin = 21;
                $wordMax = 189819; // logest word in the english language (some protine...)
                break;
            default:
                exit("Something went wrong\n");
        }
        $returnArr = [];
        for ($i = 0; $i < sizeof($wordArr); $i++) {
            if (strlen($wordArr[$i]) <= $wordMax && strlen($wordArr[$i]) >= $wordMin) {
                array_push($returnArr, $wordArr[$i]);
            }
        }
        if (sizeof($returnArr) == 0) {
            exit("Something went wrong (no words with the specified length found)\n");
        } else {
            return $returnArr;
        }
    }

    public function outputHint() {
        $gameWords = $this->getDificultyWords($this->wordArray, $this->dificulty);
        shuffle($gameWords);
        $this->wordToGuess = $gameWords[0];
        $firstLetter = $gameWords[0][0];
        $lastLetter = $gameWords[0][strlen($gameWords[0]) - 1];
        $lengthString = strlen($gameWords[0]);
        print "first letter: $firstLetter, last letter:  $lastLetter, lenth string: $lengthString\n";   
    }

    public function inputGuess() {
        $guessAmount = 0;
        $running = true;
        while($running) {
            if($guessAmount == 3) {
                exit("You reched the max ammount of guesses. Plese try again. It was: ".$this->wordToGuess."\n");
            }
            $userGuess = readline("Input guess: ");
            if($userGuess == $this->wordToGuess) {
                exit("Congrats you got it!\n");
            } else {
                print "Wrong!\n";
                $guessAmount++;
            }
        }
    }
}

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
        while($running) {
            if($guessAmount == 3) {
                exit("You reched the max ammount of guesses. Plese try again. It was: ".$this->wordToGuess."\n");
            }
            $userGuess = readline("Input guess: ");
            if($userGuess == $this->wordToGuess) {
                exit("Congrats you got it!\n");
            } else {
                print "Wrong!\n";
                $guessAmount++;
            }
        }
    }
}


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
