<?php

$no =
$yes = preg_match("/[\x{0600}-\x{06FF}\x]{1,32}/u", '我的');

echo $no;
echo "<br />";
echo $yes;

?>