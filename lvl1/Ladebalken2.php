<?php
$a = (int)readline('Enter Ladestand in 10%: ');
if ($a <= 100 && $a >= 0 && gettype($a / 10) == "integer"){
for ($x = $a / 10; $x <= 10; $x++) {
    echo "[";
    $i = 1;
    while ($i <= 10) {
        if ($i <= $x) {
        echo "#"; 
        }
        else {
            echo " ";
        }
        $i++;
        }
    
        echo "]". $x*10 . "%\n";
    }
 
}
else {
    echo "\n". $a. " ist außerhalb des Bereiches [0,100] und/oder nicht ohne Rest durch 10 teilbar. \n";
}
?> 