<?php


//--------------------------------------------------------------------------
// 1) Connect to mysql database - if connection doesnt exist
//--------------------------------------------------------------------------
if(!(function_exists('db_connect'))){
    // my_function is defined
    include('../database.php');
}

$locations = array();
$locationContent = array();


//--------------------------------------------------------------------------
// 2) Query database for data
//--------------------------------------------------------------------------

$locationQuery = "SELECT * FROM `Locations`";
$locationResult = db_query($locationQuery);

if($locationResult === false) {
    $error = db_error();
    // Handle error - inform administrator, log to file, show error page, etc.
}
else {
    while($row = $locationResult->fetch_assoc()) {

        array_push($locations, $row);
    }


}



$locationContentQuery = "SELECT * FROM `LocationContent` WHERE `lang_sub_tag`='" . $_POST['lang'] . "'";
$locationContentResult = db_query($locationContentQuery);

if($locationContentResult === false) {
    $error = db_error();
    // Handle error - inform administrator, log to file, show error page, etc.
}
else {
    while($row = $locationContentResult->fetch_assoc()) {

        array_push($locationContent, $row);
    }


}


//--------------------------------------------------------------------------
// 3) echo result as json
//--------------------------------------------------------------------------

if(isset($locations)){
    $return['locations'] = $locations;
}

if(isset($locationContent)){
    $return['locationContent'] = $locationContent;
}


echo json_encode($return);




?>