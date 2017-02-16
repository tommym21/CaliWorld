<?php


$mediaContent = array();
$calendarContent = array();



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
//gets all media items from the database in the required language
$mediaContentQuery = "SELECT * FROM `Media` WHERE `lang_sub_tag` ='" . $_POST['lang'] . "'";
$mediaResult = db_query($mediaContentQuery);

if($mediaResult === false) {
    $error = db_error();
    // Handle error - inform administrator, log to file, show error page, etc.
}
else {
    while($row = $mediaResult->fetch_assoc()) {

        array_push($mediaContent, $row);
    }


}


//gets all calendar items from the database in the required language
$calendarContentQuery = "SELECT * FROM `Calendar` WHERE `lang_sub_tag` ='" . $_POST['lang'] . "'";
$calendarResult = db_query($calendarContentQuery);

if($calendarResult === false) {
    $error = db_error();
    // Handle error - inform administrator, log to file, show error page, etc.
}
else {
    while($row = $calendarResult->fetch_assoc()) {

        array_push($calendarContent, $row);
    }


}





//--------------------------------------------------------------------------
// 3) echo result as json
//--------------------------------------------------------------------------
$return['media'] = $mediaContent;
$return['calendar'] = $calendarContent;
echo json_encode($return);

?>