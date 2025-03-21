<?php
$array = [];
for ($i = 1; $i <= 8; $i++) {
    $array[] = str_repeat('x', $i);
}
print_r($array);

function arrayFill($value, $count): array {
    $array = [];
    for ($i = 0; $i < $count; $i++) {
        $array[] = $value;
    }
    return $array;
}
print_r(arrayFill('?', 5));

$numbers = [[1, 2, 3], [4, 5], [6]];
$sum = array_sum(array_merge(...$numbers));
echo "����� ��������� �������: {$sum}\n";

$array = [];
for ($i = 0; $i < 3; $i++) {
    for ($j = 1; $j <= 3; $j++) {
        $array[$i][] = $i * 3 + $j;
    }
}
print_r($array);

$array = [2, 5, 3, 9];
$result = $array[0] * $array[1] + $array[2] * $array[3];
echo "��������� ������������: {$result}\n";

$user = ['name' => '�������', 'surname' => '��������', 'patronymic' => '��������������'];
echo $user['surname'].' '.$user['name'].' '.$user['patronymic']."\n";


$date = ['year' => date('Y'), 'month' => date('m'), 'day' => date('d')];
echo $date['year'].'-'.$date['month'].'-'.$date['day']."\n";

$arr = ['a', 'b', 'c', 'd', 'e'];
echo "���-�� ��������� �������: ", count($arr)."\n";
echo "��������� ������� �������: ", end($arr)."\n";
echo "������������� ������� �������: ", prev($arr)."\n";
?>