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
$direc = substr($dirname, $start);

echo $dirname;
echo '<br />';
echo $start;
echo '<br />';
echo $direc;
echo '<br />';

phpinfo();

?>