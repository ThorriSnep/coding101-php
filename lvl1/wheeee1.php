<?php
$max = (int)readline('Enter MAX: ');

for ($y = 1; $y <= $max; $y++) {
    $x = 1;
    while ($x <= $y) {
        echo $y; 
        $x++;
    }
    echo "\n";
} 
