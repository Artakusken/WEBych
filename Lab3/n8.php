<?php
function increaseEnthusiasm(string $str): string {
    return $str."!";
}
echo increaseEnthusiasm("À")."\n";

function repeatThreeTimes(string $str): string {
   return $str.$str.$str;
}
echo repeatThreeTimes("6")."\n";

echo increaseEnthusiasm(repeatThreeTimes("Ëß"))."\n";
function cut(string $str, int $symbolsLim = 10): string {
  return substr($str, 0, $symbolsLim);
}
echo cut("Secret is that there's no secret")."\n";

function printArrayRecursively($array, $index = 0): void {
    if ($index >= count($array)) {
        return;
    }
    echo $array[$index]."\n";
    printArrayRecursively($array, $index + 1);
}
$nums = [31, 34, 37, 41, 43, 47, 51, 221];
printArrayRecursively($nums);

function sumDigitsToOneDigit(int $number): int {
    while ($number > 9) {
        $number = array_sum(str_split((string) $number));
    }
    return $number;
}
echo sumDigitsToOneDigit(163264128)."\n";
?>