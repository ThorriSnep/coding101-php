<?php

class CpuPlayer {
    public $dificulty;
    private $wordArray;
    private $gameWords;

    public function setDificulty($dificulty) {
        /*  1) Easy (3-5)
        *   2) Medium (6-10)
        *   3) Hard (11-20)
        *   4) Academic (20-∞) */
        $this->dificulty = $dificulty;
    }

    public function getWords($wordFilePath) {
        $fileContent = file_get_contents("LICENSE");

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
            if (strlen($wordArr[$i]) <= $wordMax || strlen($wordArr[$i]) >= $wordMin) {
                array_push($returnArr, $wordArr[$i]);
            }
        }
        if (sizeof($returnArr) == 0) {
            exit("Something went wrong\n");
        } else {
            $this->$gameWords = $returnArr;
        }
    }
}