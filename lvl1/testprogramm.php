<?php

# 1.
function exercise1() {
    /*This funktion prints all numbers from 1 to 999*/ 
    print "Numbers from 1 to 999: \n";
    for ($i = 1; $i < 1000; $i++) {
        print $i.", ";
    }
    print "\n";
    return NULL;
}


# 2.
function exercise2() {
    /*This funktion prints all nubers from 1 to 99 and adds all numbers devidable by 5 to the file divby5.txt*/ 
    print "Numbers from 1 to 99 with n mod 5 = 0 in file: \n";
    $file = fopen("divby5.txt", "w");
    for ($i = 1; $i < 100; $i++) {
        if ($i % 5 == 0) {
            $line = "$i \n";
            fwrite($file, $line);
        } else {
            print $i. ", ";
        }
    }
    fclose($file);
    return NULL;
}

# 3.
function exercise3($age) {
    /*This funktion verifies you are 18+*/
    if ($age < 18) {
        throw new AgeExeption("You aren't 18+!");
    }
    return NULL;
}

# 4.
function exercise4($uName, $pass) {
    /*This funktion prompts a user to enter his user name and pasword and chacks it in clear text*/
    $check = false;
    while ($check != true) {
        $uNameIn = readline("\n Username: ");
        $passIn = readline("\n Password: ");
        if ($uNameIn == $uName && $passIn == $pass){
            $check = true;
        } else {
            print "try again";
        }
    }
    return NULL;
}

# 5.
function exercise5($text, $fileName) {
    /*This funktion writes a given string to a give file*/
    $txtf = fopen($fileName, "w");
    fwrite($txtf, $text);
    fclose($txtf);
    return NULL;
}

exercise1();
exercise2();
exercise3((int)readline("\n the following program is NSFW please enter your age:"));
exercise4("test", "l33tH4ck3r");
$text = readline("\n Enter your text: ");
$fileName = readline("\n Enter file name: ");
exercise5($text, $fileName);
