<?php


//--------------------------------------------------------------------------
// 1) Connect to mysql database - if connection doesnt exist
//--------------------------------------------------------------------------
if(!(function_exists('db_connect'))){
    // my_function is defined
    include('../database.php');
}

$historyContent = array();
$historyRegContent = array();

//--------------------------------------------------------------------------
// 2) Query database for data
//--------------------------------------------------------------------------

$historyQuery = "SELECT * FROM `History` WHERE `lang_sub_tag`='" . $lang . "'";
$historyResult = db_query($historyQuery);

if($historyResult === false) {
    $error = db_error();
    // Handle error - inform administrator, log to file, show error page, etc.
}
else {
    while($row = $historyResult->fetch_assoc()) {

        array_push($historyContent, $row);
    }


}

$historyRegQuery = "SELECT * FROM `HistoryContent` WHERE `lang_sub_tag`='" . $lang . "' AND `reg_sub_tag`='" .$region. "' ";
$historyRegResult = db_query($historyRegQuery);

if($historyRegResult === false) {
    $error = db_error();
    // Handle error - inform administrator, log to file, show error page, etc.
}
else {
    while($row = $historyRegResult->fetch_assoc()) {

        array_push($historyRegContent, $row);
    }


}

?>