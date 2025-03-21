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
echo ($test == 0) ? '�����' : '', "\n";

$age = 54;
if ($age < 10 || $age > 99) {
    echo "����� < 10 ��� > 99\n";
} else {
    $sum = array_sum(str_split((string)$age));
    if ($sum <= 9) {
        echo "����� ���� ����������\n";
    } else {
        echo "����� ���� ���������\n";
    }
}

$arr = [31, 33, 54];
if (count($arr) == 3) {
    echo "����� ��������� �������: " . array_sum($arr) . "\n";
}
?>