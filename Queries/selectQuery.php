<?php

//--------------------------------------------------------------------------
// 1) Connect to mysql database - if connection doesnt exist
//--------------------------------------------------------------------------
if(!(function_exists('db_connect'))){
    // my_function is defined
    include('../database.php');
}

$selectContent = array();

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

//--------------------------------------------------------------------------
// 3) echo result as json
//--------------------------------------------------------------------------

if(isset($selectContent)){
    $return['selectList'] = $selectContent;
}


echo json_encode($return);


?>