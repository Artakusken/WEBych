$str = 'ahb acb aeb aeeb adcb axeb';
$regexp = '/b...b/iu';
$matches = [];

$count = preg_match_all($regexp, $str, $matches);
echo "number of substrings $count: \n";
var_dump($matches);