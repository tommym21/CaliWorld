<?php

//--------------------------------------------------------------------------
// 1) Connect to mysql database - if connection doesnt exist
//--------------------------------------------------------------------------
if(!(function_exists('db_connect'))){
    // my_function is defined
    include('../database.php');
}

$selectContent = array();
$localeMessages = array();

//--------------------------------------------------------------------------
// 2) Query database for data
//--------------------------------------------------------------------------

$selectQuery = "SELECT * FROM `Region Name`";
$selectResult = db_query($selectQuery);

if($selectResult === false) {
    $error = db_error();
    // Handle error - inform administrator, log to file, show error page, etc.
}
else {
    while($row = $selectResult->fetch_assoc()) {

        array_push($selectContent, $row);
    }


}




$localeQuery = "SELECT * FROM `LocaleMesages` WHERE `lang_sub_tag`='" .$_POST['lang']. "' AND `time`='" .$_POST['time']. "'";
$localeResult = db_query($localeQuery);

if($localeResult === false) {
    $error = db_error();
    // Handle error - inform administrator, log to file, show error page, etc.
}
else {
    while($row = $localeResult->fetch_assoc()) {

        array_push($localeMessages, $row);
    }


}

//--------------------------------------------------------------------------
// 3) echo result as json
//--------------------------------------------------------------------------

if(isset($selectContent)){
    $return['selectList'] = $selectContent;
}

if(isset($localeMessages)){
    $return['localeMessages'] = $localeMessages;
}


echo json_encode($return);


?>