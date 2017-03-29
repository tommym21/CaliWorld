<?php

//http://php.net/manual/en/function.preg-match.php
$arMatch = preg_match("/[\x{0600}-\x{06FF}\x]{1,32}/u", $_POST['arMatch']);


$return['arMatch'] = $arMatch;
echo json_encode($return);


?>