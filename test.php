<?php 

declare(strict_types=1);

define('FULL_NAME', 'Jhon Doe');

echo __LINE__ . '<br>';

$text = "This is line one.\nThis is line two.";

echo nl2br($text);

function fetchData() : void
{
  echo '<br>' . 'Function ' . __FUNCTION__ . ' is called';
}

fetchData();

$variable1 = 'name';

$$variable1 = "Thanks God!";

echo '<br>' . $name;

$price = 2.332423;

echo '<br> This is Floor: ' . floor($price);
echo '<br> This is Ceil: ' . ceil($price);

$a = $b = $c = true;
$d = $e = $f = false;

$number = 1;
$number1 = '1';

// if($number == $number1){
//   $number2 = &$number1;
//   $number2 = 35;
//   echo "good number: {$number1}";
// }

// if($a <> $f){
//   echo 'good';
// }

var_dump(fdiv(5.7, 1.3));
echo '<br>';
var_dump(fdiv(3,2));

$person = [
  'name' => 'Jhon',
  'last_name' => 'Doe',
  'age' => '40',
  'fav_colors' => [
    'blue', 'red', 'white'
  ],
  'blood_type' => false
];

$test = array_key_exists('blood_type', $person) ? 'good' : 'bad';

$test1 = empty($person['blood_type']) ? 'good' : 'bad';

echo '<br>' . "Thi is {$test}, and this is {$test1}";

$variable = 'World!';

$text = <<<EOD

Hello, $variable!
This is a Heredoc string.
<br>
<br>
EOD;

$text1 = <<<'EOD'
Hello, $variable!
This is a Nowdoc string.

EOD;

echo $text;
echo $text1;

echo nl2br("\nI keep learning \n");

$testing13 = [
  'name' => 'good',
];
$testing23 = false;
unset($testing23);

echo '<pre>';
print_r($testing13);
echo '</pre>';



