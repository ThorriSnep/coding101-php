<?php

$start = (int)readline('Enter Ladestand in 10%: ');

if ($start <= 100 && $start >= 0 && $start % 10 == 0) {
    for ($stand = $start / 10; $stand <= 10; $stand++) {
        print "[";
        $balkenFortschritt = 1;
        while ($balkenFortschritt <= 10) {
            # Ladestand
            if ($balkenFortschritt <= $stand) {
                print "#"; 
            } else {            
                # Noch nicht geladener Bereich
                print " ";
            }
            $balkenFortschritt++;
        }
        print "]". $stand*10 . "%\n";
    }
} else { 
    print "\n". $start. " ist außerhalb des Bereiches [0,100] und/oder nicht ohne Rest durch 10 teilbar. \n";
}
