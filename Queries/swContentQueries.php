<?php

//--------------------------------------------------------------------------
// 1) Connect to mysql database - if connection doesnt exist
//--------------------------------------------------------------------------
if(!(function_exists('db_connect'))){
    // my_function is defined
    include('../database.php');
}

$streetWorkoutContent = array();

//--------------------------------------------------------------------------
// 2) Query database for data
//--------------------------------------------------------------------------

$streetWorkoutQuery = "SELECT * FROM `StreetWorkoutContent`  WHERE `lang_sub_tag`='" . $lang . "'";
$streetWorkoutResult = db_query($streetWorkoutQuery);

if($streetWorkoutResult === false) {
    $error = db_error();
    // Handle error - inform administrator, log to file, show error page, etc.
}
else {
    while($row = $streetWorkoutResult->fetch_assoc()) {

        array_push($streetWorkoutContent, $row);
    }


}

?>