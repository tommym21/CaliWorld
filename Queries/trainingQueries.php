<?php


//--------------------------------------------------------------------------
// 1) Connect to mysql database - if connection doesnt exist
//--------------------------------------------------------------------------
if(!(function_exists('db_connect'))){
    // my_function is defined
    include('../database.php');
}

$exerciseContent = array();
$saveMessageContent = array();

//--------------------------------------------------------------------------
// 2) Query database for data
//--------------------------------------------------------------------------

$exerciseQuery = "SELECT * FROM `Exersize` WHERE `lang_sub_tag`='" . $_POST['lang'] . "'";
$exerciseResult = db_query($exerciseQuery);

if($exerciseResult === false) {
    $error = db_error();
    // Handle error - inform administrator, log to file, show error page, etc.
}
else {
    while($row = $exerciseResult->fetch_assoc()) {

        array_push($exerciseContent, $row);
    }


}


$saveMessageQuery = "SELECT * FROM `TrainingContent` WHERE `lang_sub_tag`='" . $_POST['lang'] . "' AND (`ID`='6' OR `ID`='7')";
$saveMessageResult = db_query($saveMessageQuery);

if($saveMessageResult === false) {
    $error = db_error();
    // Handle error - inform administrator, log to file, show error page, etc.
}
else {
    while($row = $saveMessageResult->fetch_assoc()) {

        array_push($saveMessageContent, $row);
    }


}



//--------------------------------------------------------------------------
// 3) echo result as json
//--------------------------------------------------------------------------

if(isset($exerciseContent)){
    $return['exercises'] = $exerciseContent;
}

if(isset($saveMessageContent)){
    $return['saveMessage'] = $saveMessageContent;
}

//if(isset($array2)){
//    $return['array2'] = $array2;
//}

echo json_encode($return);

?>