<?php
$a = 10;
$b = 3;
echo "������� ", $a % $b, "\n";

echo "���������� a: ";
$a = fgets(STDIN);
echo "���������� b: ";
$b = fgets(STDIN);
if ($a % $b == 0) {
    echo "a ������� �� b, ��������� ", $a / $b, "\n";
} else {
    echo "a ������� �� b � �������� ", $a % $b, "\n";
}

echo "\n������ �� �������� � ������\n";
$st = pow(2, 10);
$sr = sqrt(245);
echo "2^10 = ", $st, "\n";
echo "245^(1/2) = ", $sr, "\n";

$array = array(4, 2, 5, 19, 13, 0, 10);
$sumSqr = 0;
foreach ($array as $value) {
    $sumSqr += $value**2;
};
echo "������ �� ����� ��������� array: ", sqrt($sumSqr), "\n";

echo "\n������ � ��������� ����������\n";
$num1 = sqrt(379);
$sqrt = round($num1);
$sqrt1 = round($num1, 1);
$sqrt2 = round($num1, 2);
echo "���������� ���������� ����� �� ����� 379:","\n$sqrt", "\n$sqrt1", "\n$sqrt2";

$num2 = sqrt(587);
$array = ['floor' => floor($num2), 'ceil' => ceil($num2)];


echo "\n��������� ���������� ����� �� ����� 587: ";
var_dump($array);


echo "\n������ � min � max\n";
$arr = [4, -2, 5, 19, -130, 0, 10];
echo "����������� �������� � �������: ", min($arr),"\n";
echo "������������ �������� � �������: ", max($arr), "\n";


echo "\n������ � ��������\n";
echo rand(1, 100), "\n";

$rarr = [];
for ($i = 0; $i < 10; $i++) 
{
    $rarr[$i] = rand(1, 100);
}
var_dump($rarr);

echo "\n������ � �������\n";
$a = 31;
$b = 33;
echo '|a - b| = ', abs($a - $b), "\n";
echo "|b - a| = ", abs($b - $a), "\n";

$arr = [1, 2, -1, -2, 3, -3];
$absArray = array_map('abs', $arr);
var_dump($absArray);

$a = 30;
$arrayDivisor = [];
for ($d = 1; $d <= $a/2; $d++) 
{
    if ($a % $d == 0) 
    {
        $arrayDivisor[] = $d;
    }
}

$arrayDivisor[] = intval($a);
echo "�������� ����� {$a}:\n";
var_dump($arrayDivisor);

$arr = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10];
$sum = 0;
$count = 0;
foreach ($arr as $value) 
{
    if ($sum <= 10) 
    {
        $sum += $value; $count++;
    }
}
echo "����� �������� 10, ���� ������� ������ {$count} �����.";
?>