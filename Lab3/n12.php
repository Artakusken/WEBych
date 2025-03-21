<?php
$arr = [15, 16, 14, 11, 20];
$average = array_sum($arr) / count($arr);
echo "Среднее арифметическое: {$average}\n";

$sum = array_sum(range(1, 100));
echo "Сумма чисел от 1 до 100: {$sum}\n";

$arr_num = [1, -2, 17, 64516, 729];
$squareRoots = array_map('sqrt', $arr_num);
print_r($squareRoots);

$letters = range('a', 'z');
$numbers = range(1, 26);
$array = array_combine($letters, $numbers);
print_r($array);

$nums = '1234567890';
$pairs = str_split($nums, 2);
$sumOfPairs = array_sum($pairs);
echo "Сумма пар чисел: {$sumOfPairs}\n";
?>