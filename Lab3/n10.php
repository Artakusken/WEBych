<?php
function isSumMoreThanTen($a, $b): bool {
    return ($a + $b) > 10;
}
echo isSumMoreThanTen(5, 5), "\n";

function areEqual($a, $b): bool {
    return $a == $b;
}

echo areEqual(31, 31), "\n";

$test = 0;
echo ($test == 0) ? 'верно' : '', "\n";

$age = 54;
if ($age < 10 || $age > 99) {
    echo "число < 10 или > 99\n";
} else {
    $sum = array_sum(str_split((string)$age));
    if ($sum <= 9) {
        echo "Сумма цифр однозначна\n";
    } else {
        echo "Сумма цифр двузначна\n";
    }
}

$arr = [31, 33, 54];
if (count($arr) == 3) {
    echo "Сумма элементов массива: " . array_sum($arr) . "\n";
}
?>