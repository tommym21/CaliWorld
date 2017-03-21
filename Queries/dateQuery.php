<?php

$dateFormat = array();


//--------------------------------------------------------------------------
// 1) Connect to mysql database - if connection doesnt exist
//--------------------------------------------------------------------------
if(!(function_exists('db_connect'))){
// my_function is defined
include('../database.php');
}


//--------------------------------------------------------------------------
// 2) Query database for data
//--------------------------------------------------------------------------

$dateQuery = "SELECT `date_short` FROM `Region` WHERE `Reg_Sub_Tag`='" . $_POST['region'] . "'";
$dateResult = db_query($dateQuery);

if($dateResult === false) {
    $error = db_error();
    // Handle error - inform administrator, log to file, show error page, etc.
}
else {
    while($row = $dateResult->fetch_assoc()) {

        array_push($dateFormat, $row);
    }


}


$return['dateFormat'] = $dateFormat;
echo json_encode($return);

?>