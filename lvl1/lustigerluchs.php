<?php

/* Funktion to cleanly print Array */ 
function printArr($inArr) {
    for ($i = 0; $i < count($inArr); $i++) {
        print "$inArr[$i], ";
    }
    print "\n";
    return NULL;
}

$numArr = [5, 7, 3, 2, 1, 0, 8, 9, 4, 6];
printArr($numArr);

/* Get user Inputs */
$sortBool = (bool)readline('Sort the array? no(0), yes(1): ');
if ($sortBool) {
    sort($numArr);
}
printArr($numArr);

$ammount = (int)readline('Enter the amount of nums to add: ');
if (count($numArr) < $ammount) {
    exit("The inputed Value exeedes the length of the array\n");
}
$side = (int)readline('From the right (1) from the left (0): ');

/* Add the nums together */
$result = 0;
switch ($side) {
    case 0:
        for ($i = 0; $i < $ammount; $i++) {
            $result += $numArr[$i];
        }
        break;
    case 1:
        for ($i = count($numArr) - 1; $i >= count($numArr) - $ammount; $i--) {
            $result += $numArr[$i];
        }
        break;
    default:
        exit("Invalide input for side!\n");
}

print "reult: $result\n";
