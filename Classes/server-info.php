<?php
/**
 * Created by PhpStorm.
 * User: Tom
 * Date: 08/01/2017
 * Time: 12:02
 */

$accept = $_SERVER['HTTP_ACCEPT_LANGUAGE'];

echo $accept ."<br /><br />";

$dirname = dirname($_SERVER['PHP_SELF']);
$start = stripos($dirname, '/') + 1;
$length = strrpos($dirname, '/')-1;
$direc = substr($dirname, $start, $length);

echo $dirname;
echo '<br />';
echo $start;
echo '<br />';
echo $length;
echo '<br />';
echo $direc;
echo '<br />';


switch ($direc) {
    case "收音机体操":
        echo '1';
        break;
    case "كاليسثينيكسورلد":
        echo '2';
        break;
    case "CalisthenicsWelt":
        echo '3';
        break;
    case "칼리 스테 네스 월드":
        echo '4';
        break;
}

phpinfo();

?>