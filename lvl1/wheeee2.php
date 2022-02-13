<?php
$a = (int)readline('Enter MAX: ');
for ($x = 1; $x <= $a; $x++) {
    $i = 1;
    while ($i <= $x) {
        echo $x; 
        $i++;
        }
        echo "\n";
    }

for ($x = $a-1; $x >= 1; $x--) {
    $i = 1;
    while ($i <= $x) {
        echo $x; 
        $i++;
        }
    
echo "\n";
} 
?> 