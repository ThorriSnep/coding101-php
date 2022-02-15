<?php

# Declare empty Array

$widthArr = array();
$finalArr = array();

# Get user inputs

$width = (int)readline('Enter x amount: ');
$hight = (int)readline('Enter y amount: ');
$nrOfRand = (int)readline('Enter rand amount: ');

# Create matrix with dimesion specified by user

for ($i = 0; $i < $width; $i++) {
    array_push($widthArr, "#");
}
for ($i = 0; $i < $hight; $i++) {
    array_push($finalArr, $widthArr);
}

# Change $nrOfRand # to + at random positions

$changed = 0;
while ($changed < $nrOfRand) {
    $j = rand(0, $hight-1);
    $i = rand(0, $width-1);
    if ($finalArr[$j][$i] != "+"){
        $finalArr[$j][$i] = "+";
        $changed++;
    }
}

# Print generated matrix

for ($i = 0; $i < $hight; $i++) {
    for ($j = 0; $j < $width; $j++) {
        print $finalArr[$i][$j];
    }
    print "\n";
}
