<?php

/* Read file and and parse all words into an array */

$fileContent = file_get_contents("LICENSE");

$charsToRm = ["(C)", "\n", "\r", ",", ".", "-", "<", ">", "´", "'", "`", "(", ")", "1", "2", "3", "4", "5", "6", "7", "8", "9", "0", "\""];
$fileContent = str_replace($charsToRm, " ", $fileContent);
$whiteSpaceCount = 1;

while ($whiteSpaceCount > 0) {
    $fileContent = str_replace("  ", " ", $fileContent, $whiteSpaceCount);
}

$fileContent = trim($fileContent);
$wordArr = explode(" ", $fileContent);

/* Generate Tweet with the amount of words given by user or untill 140 chars are reached */

$randArr = range(0, count($wordArr) - 1);
shuffle($randArr);
$wordCount = (int)readline("Word count for your tweet: ");

if ($wordCount == 0) {
    exit("no Tweet generated\n");
}

$finalString = $wordArr[$randArr[0]];

for ($i = 1; $i < $wordCount; $i++) {
    $tmp = $finalString." ".$wordArr[$randArr[$i]];
    if (strlen($tmp) > 140) {
        print "$finalString\n";
        exit("\e[1;33mExited prematurly, because the provided word count will exeed the char limit of a Tweet\e[0m \n");
    }
    $finalString = $finalString." ".$wordArr[$randArr[$i]];
} 

print "$finalString\n";
