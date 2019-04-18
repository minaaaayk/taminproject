<?php
echo $_SERVER['PHP_SELF'];
echo "<br>";
echo $_SERVER['SERVER_NAME'];
echo "<br>";
echo $_SERVER['HTTP_HOST'];
echo "<br>";
echo $_SERVER['HTTP_REFERER'];
echo "<br>";
echo $_SERVER['PHP_SELF'];
echo "<br>";
echo $_SERVER['SCRIPT_NAME'];
echo "<br>";


/*
$p = strpos($line,$words[0]);
echo $p;
echo "<br>";
$k = substr($line, $p);
echo $k;
echo "<br>";*/

echo "<br>";
$key = "ماده54";
preg_match('/[0-9]+/',$key,$matches);
print_r($matches);
echo "<br>";
$p = strpos($key,$matches[0]);
echo $p;
echo "<br>";
$word = preg_replace("/[0-9]/", "", $key);
$p = strpos($key,$word);
echo $p;
echo "<br>";

$test = "تبصره ۲چنانچه  بیمه‌شده ماده87 ";
echo $test ;
echo "<br>";
$p = strpos($test,"ماده");
if($p != false)
{
    echo $p;
}
else
{
    echo "not found";
}
echo "<br>";

$string = "**1vxvd *";
echo "<b>String:</b> $string<br />";
echo "There are 3 matches for " . substr_count($string, '*') . " the letter '*'.";

function foo()
{
    return 0;
}
$t = 10;
echo "t = " . $t ."<br>";
$t = foo();
echo "t = " . $t ."<br>";

$te = array('a', 'b', 'c', 'd');
echo "te[1] = " . $te[1] ."<br>";
?>

