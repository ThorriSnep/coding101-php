<?php
$arr = array(
    "No one is perfect - that’s why pencils have erasers. - Wolfgang Riebe",
    "Have no fear of perfection - you'll never reach it. - Salvador Dali",
    "The tallest mountain started as a stone. - One Punch Man Intro",
    "Make it work. Make it nice. Make it fast. Always obey this order! - kiraa",
    "A good programmer is someone who always looks both ways before crossing a one-way street. – Doug Linder",
    "If debugging is the process of removing software bugs, then programming must be the process of putting them in. - Edsger W. Dijkstra"
);

while (true) {
    $rarr = range(0, 5);
    shuffle($rarr);
    for ($x = 0; count($rarr) > 0; $x++){
        echo "\n";
        echo $arr[$rarr[$x]];
        unset($rarr[$x]);
        echo "\n";
        $a = readline('Enter: ');
    }
}
