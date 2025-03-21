<?php
function printStringReturnNumber(): int {
    echo "Ты думал, что здесь что-то будет? Ты прав v\n";
    return 31;
}
$my_num = printStringReturnNumber();
echo $my_num;
?>