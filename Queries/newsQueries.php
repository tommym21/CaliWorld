<?php

//--------------------------------------------------------------------------
// 1) Connect to mysql database - if connection doesnt exist
//--------------------------------------------------------------------------
if(!(function_exists('db_connect'))){
    // my_function is defined
    include('../database.php');
}


$newsContent = array();



//--------------------------------------------------------------------------
// 2) Query database for data
//--------------------------------------------------------------------------
//gets all media items from the database in the required language
$newsContentQuery = "SELECT * FROM `News` WHERE `lang_sub_tag` ='" . $_POST['lang'] . "' AND `reg_sub_tag`='" . $_POST['reg'] . "'";
$newsResult = db_query($newsContentQuery);

if($newsResult === false) {
    $error = db_error();
    // Handle error - inform administrator, log to file, show error page, etc.
}
else {
    while($row = $newsResult->fetch_assoc()) {

        array_push($newsContent, $row);
    }


}


//--------------------------------------------------------------------------
// 3) echo result as json
//--------------------------------------------------------------------------

if(isset($newsContent)){
    $return['news'] = $newsContent;
}

echo json_encode($return);