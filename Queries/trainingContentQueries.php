<?php


//--------------------------------------------------------------------------
// 1) Connect to mysql database - if connection doesnt exist
//--------------------------------------------------------------------------
if(!(function_exists('db_connect'))){
    // my_function is defined
    include('../database.php');
}

$trainingContent = array();

//--------------------------------------------------------------------------
// 2) Query database for data
//--------------------------------------------------------------------------

$trainingQuery = "SELECT * FROM `TrainingContent` WHERE `lang_sub_tag`='" . $lang . "'";
$trainingResult = db_query($trainingQuery);

if($trainingResult === false) {
    $error = db_error();
    // Handle error - inform administrator, log to file, show error page, etc.
}
else {
    while($row = $trainingResult->fetch_assoc()) {

        array_push($trainingContent, $row);
    }


}

?>