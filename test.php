<?php
 // time complexity O(root(n))
// $n = 10;

// for($k=1, $i = 1; $k < $n; $i++){
//     echo "Ok\n";
//     $k = $k+$i;
// }



// time complexity best case O(1) , worst case O(n)
$m = 10;
$n = 0;
$countm = 0;
$countn = 0;
while($m != $n){
    if($m > $n){
        $m = $m - $n;
        echo "ok m". $countm++. "\n";
    }else {
        $n = $n - $m;
        echo "ok n\n". $countn++ . "\n";
    }
}
// echo "ok m". $countm++. "\n";
//     echo "ok n\n". $countn++ . "\n";
