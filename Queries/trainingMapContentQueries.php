<?php


if(!(function_exists('db_connect'))){
    // my_function is defined
    include('database.php');
}




$trainingMapContent = array();


//Gets all the languages that are supported from the database to populate drop down list
$trainingMapContentQuery = "SELECT * FROM `TrainingMapContent` WHERE `lang_sub_tag`='" . $lang . "'";
$trainingMapContentResult = db_query($trainingMapContentQuery);

if($trainingMapContentResult === false) {
    $error = db_error();
    // Handle error - inform administrator, log to file, show error page, etc.
}
else {
    while($row = $trainingMapContentResult->fetch_assoc()) {

        array_push($trainingMapContent, $row);
    }


}


?>