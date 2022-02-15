<?php
$max = (int)readline('Enter MAX: ');

# Increment pyramide

for ($i = 1; $i <= $max; $i++) {    
    for ($j = 1; $j <= $i; $j++) {
        print $i; 
    }
    print "\n";
}

# Decrement pyramide

for ($i = $max-1; $i >= 1; $i--) {  
    for ($j = 1; $j <= $i; $j++) {
        print $i; 
    }   
    print "\n";
} 
