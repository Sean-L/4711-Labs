<?php
$name = "Jim, ";
$what = "geek ";
$level = "10 ";
echo "Hi my name is ";
echo $name;
echo "I am a ";
echo $level;
echo $what;

$hoursworked = 50;
$rate = 12;
if($hoursworked>40){
    $total = $hoursworked* $rate * 1.5;
}else{
$total = $hoursworked * $rate;
}
echo '<br/>';
echo($total > 0) ? 'You owe me '.$total: "You're welcome";
?>