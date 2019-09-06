<?php
function bubbleSort($numbers) {
    $cnt = count($numbers);
    for ($i = 0; $i < $cnt - 1; $i++) {
        for ($j = 0; $j < $cnt - $i - 1; $j++) {
            if ($numbers[$j] > $numbers[$j + 1]) {
                $temp = $numbers[$j];
                $numbers[$j] = $numbers[$j + 1];
                $numbers[$j + 1] = $temp;
            }
        }
    }
 
    return $numbers;
}
 
$num = array(20, 40, 60, 80, 30, 70, 90, 10, 50, 0);
var_dump(bubbleSort($num));