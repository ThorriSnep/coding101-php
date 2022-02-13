<?php
$xarr=array();
$arr=array();
$x = (int)readline('Enter x amount: ');
$y = (int)readline('Enter y amount: ');
$r = (int)readline('Enter rand amount: ');
for ($i = 0; $i < $x; $i++) {
    array_push($xarr,"#");
}
for ($i = 0; $i < $y; $i++) {
    array_push($arr,$xarr);
}
$a = 0;
while ($a < $r) {
    $i = rand(0, $y-1);
    $j = rand(0, $x-1);
    if ($arr[$i][$j]!="+"){
        $arr[$i][$j]="+";
        $a++;
    }
}
for ($i = 0; $i < count($arr); $i++) {
    for ($j = 0; $j < count($arr[0]); $j++) {
        echo $arr[$i][$j];
    }
    echo "\n";
}
?>