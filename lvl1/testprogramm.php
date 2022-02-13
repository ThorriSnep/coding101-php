<?php
# 1.
echo "Numbers from 1 to 999: \n";
for ($i = 1; $i < 1000; $i++) {
    echo $i.", ";
}
echo "\n";
# 2.
echo "Numbers from 1 to 99 mit number mod 5 = 0 in file: \n";
$file = fopen("divby5.txt", "w");
for ($i = 1; $i < 100; $i++) {
    if ($i % 5 == 0) {
        $s = "$i \n";
        fwrite($file, $s);
    }
    else {
        echo $i. ", ";
    }
}
fclose($file);
# 3.
$a = (int)readline("\n the following program is NSFW please enter your age:");
if ($a < 18) {
    throw new AgeExeption("You aren't 18+!");
}
# 4.
$c = false;
while ($c != true) {
    $usr = readline("\n Username: ");
    $pas = readline("\n Password: ");
    if ($usr == "test" && $pas == "1234pass"){
        $c = true;
    }
    else {
        echo "try again";
    }
}
# 5.
$text = readline("\n Enter your text: ");
$fname = readline("\n Enter file name: ");
$txtf = fopen($fname, "w");
fwrite($txtf, $text);
fclose($txtf);
?>