<?php

//--------------------------------------------------------------------------
// 1) Connect to mysql database - if connection doesnt exist
//--------------------------------------------------------------------------
if(!(function_exists('db_connect'))){
    // my_function is defined
    include('../database.php');
}

$featuredFacilities = array();


//--------------------------------------------------------------------------
// 2) Query database for data
//--------------------------------------------------------------------------

$facilitiesQuery = "SELECT * FROM `LocationContent` JOIN `Locations` ON `LocationContent`.`ID` = `Locations`.`ID` WHERE `Locations`.`featured`='true' AND `LocationContent`.`lang_sub_tag`='" . $_POST['lang'] . "'";
$facilitiesResult = db_query($facilitiesQuery);

if($facilitiesResult === false) {
    $error = db_error();
    // Handle error - inform administrator, log to file, show error page, etc.
}
else {
    while($row = $facilitiesResult->fetch_assoc()) {

        array_push($featuredFacilities, $row);
    }


}


//--------------------------------------------------------------------------
// 3) echo result as json
//--------------------------------------------------------------------------


if(isset($featuredFacilities)){
    $return['featuredFacilities'] = $featuredFacilities;
}


echo json_encode($return);