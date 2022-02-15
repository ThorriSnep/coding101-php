<?php
$messageArr = [
    "No one is perfect - that’s why pencils have erasers. - Wolfgang Riebe",
    "Have no fear of perfection - you'll never reach it. - Salvador Dali",
    "The tallest mountain started as a stone. - One Punch Man Intro",
    "Make it work. Make it nice. Make it fast. Always obey this order! - kiraa",
    "A good programmer is someone who always looks both ways before crossing a one-way street. – Doug Linder",
    "If debugging is the process of removing software bugs, then programming must be the process of putting them in. - Edsger W. Dijkstra"
];

while (true) {
    $randArr = range(0, count($messageArr)-1);
    shuffle($randArr);
    for ($i = 0; count($randArr) > 0; $i++){
        print "\n";
        print $messageArr[$randArr[$i]];
        unset($randArr[$i]);
        print "\n";
        readline('Enter: ');
    }
}
