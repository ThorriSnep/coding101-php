<?php

function loginFunc($uName, $pass) {
    /*This funktion prompts a user to enter his user name and pasword and chacks it in clear text*/
    for ($trys = 1; $trys <= 3; $trys++) {
        $uNameIn = readline("\nUsername: ");
        $passIn = readline("\nPassword: ");
        if ($uNameIn == $uName && $passIn == $pass){
            return 0;         
        } else {
            print "Password or username wrong try $trys/3\n";
        }
    }
    exit ("To many login attempts\n");
}

loginFunc("test", "l33tH4ck3r");

print "Plese select from the folowing list:\n** 1) Kochrezepte\n** 2) Weltherrschaft\n** 3) Uhrzeit\n** q) Beenden\n";
$userInput = readline("\n[1/2/3/q]: ");

switch ($userInput) {
    case "1":
        print "Kochrezepte\n";
        break;
    case "2":
        print "Weltherrschaft\n";
        break;
    case "3":
        print "Uhrzeit\n";
        break;
    case "q":
        exit("Beenden\n");
        break;
    default:
        exit("Invalid input\n");
}
