<?php
$max = (int)readline('Enter MAX: ');

# Increment pyramide

for ($y = 1; $y <= $max; $y++) {
    $x = 1;
    while ($x <= $y) {
        echo $y; 
        $x++;
    }
    echo "\n";
}

# Decrement pyramide

for ($y = $max-1; $y >= 1; $y--) {
    $x = 1;
    while ($x <= $y) {
        echo $y; 
        $x++;
    }
    
    echo "\n";
} 
