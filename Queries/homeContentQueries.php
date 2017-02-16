<?php

$homeContent = array();

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
//gets all other HOME CONTENT items from the database in the required language
$homeContentQuery = "SELECT * FROM `HomeContent` WHERE `lang_sub_tag` ='" . $lang . "'";
$homeResult = db_query($homeContentQuery);

if($homeResult === false) {
    $error = db_error();
    // Handle error - inform administrator, log to file, show error page, etc.
}
else {
    while($row = $homeResult->fetch_assoc()) {

        array_push($homeContent, $row);
    }


}

?>