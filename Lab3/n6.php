<?php
$a = 10;
$b = 3;
echo "Остаток ", $a % $b, "\n";

echo "Переменная a: ";
$a = fgets(STDIN);
echo "Переменная b: ";
$b = fgets(STDIN);
if ($a % $b == 0) {
    echo "a делится на b, результат ", $a / $b, "\n";
} else {
    echo "a делится на b с остатком ", $a % $b, "\n";
}

echo "\nРабота со степенью и корнем\n";
$st = pow(2, 10);
$sr = sqrt(245);
echo "2^10 = ", $st, "\n";
echo "245^(1/2) = ", $sr, "\n";

$array = array(4, 2, 5, 19, 13, 0, 10);
$sumSqr = 0;
foreach ($array as $value) {
    $sumSqr += $value**2;
};
echo "Корень из суммы квадратов array: ", sqrt($sumSqr), "\n";

echo "\nРабота с функциями округления\n";
$num1 = sqrt(379);
$sqrt = round($num1);
$sqrt1 = round($num1, 1);
$sqrt2 = round($num1, 2);
echo "Результаты округления корня из числа 379:","\n$sqrt", "\n$sqrt1", "\n$sqrt2";

$num2 = sqrt(587);
$array = ['floor' => floor($num2), 'ceil' => ceil($num2)];


echo "\nРезультат округления корня из числа 587: ";
var_dump($array);


echo "\nРабота с min и max\n";
$arr = [4, -2, 5, 19, -130, 0, 10];
echo "Минимальное значение в массиве: ", min($arr),"\n";
echo "Максимальное значение в массиве: ", max($arr), "\n";


echo "\nРабота с рандомом\n";
echo rand(1, 100), "\n";

$rarr = [];
for ($i = 0; $i < 10; $i++) 
{
    $rarr[$i] = rand(1, 100);
}
var_dump($rarr);

echo "\nРабота с модулем\n";
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
echo "Делители числа {$a}:\n";
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
echo "Чтобы получить 10, надо сложить первые {$count} чисел.";
?>