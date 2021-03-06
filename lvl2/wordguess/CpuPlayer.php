<?php

require_once "BasePlayer.php";

class CpuPlayer extends BasePlayer {
    public $dificulty;
    private $wordArray;

    /**  
     * 1) Easy (3-5)
     * 2) Medium (6-10)
     * 3) Hard (11-20)
     * 4) Academic (20-∞) 
     */
    public function setDificulty($dificulty) {
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

    public function getDificultyWords() {
        $wordArr = $this->wordArray;
        switch ($this->dificulty) {
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
                $wordMax = 189819; // longest word in the english language (some protine...)
                break;
            default:
                exit("Something went wrong\n");
        }

        $returnArr = [];
        for ($i = 0; $i < count($wordArr); $i++) {
            if (strlen($wordArr[$i]) <= $wordMax && strlen($wordArr[$i]) >= $wordMin) {
                array_push($returnArr, $wordArr[$i]);
                // $returnArr[] = $wordArr[i];
            }
        }

        if (count($returnArr) == 0) {
            exit("Something went wrong (no words with the specified length found)\n");
        }
        shuffle($returnArr);
        $this->wordToGuess = $returnArr[0];
    }

}