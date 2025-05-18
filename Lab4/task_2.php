$str = 'a1b2c30';
$regexp = '/[0-9]+/iu';
$matches = [];

$result = preg_replace_callback(
        $regexp,
        function ($matches) {
          return (int)$matches[0]**2;
        },
        $str);

echo "sponge-bob squared string: \n";
var_dump($result);