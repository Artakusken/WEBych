<?php
$str1 = 'ahb bacb aeb aeeb abdcb axeb';
$regexp1 = '/b..b/iu';
$super_regexp1 = '/(?=(b..b))/iu';
$matches1 = [];
$super_matches1 = [];

$count = preg_match_all($regexp1, $str1, $matches1);
echo "number of substrings $count: \n";
var_dump($matches1);
$count = preg_match_all($super_regexp1, $str1, $super_matches1);
echo "number of all substrings $count: \n";
var_dump($super_matches1[1]);
?>
