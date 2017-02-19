<?php


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
$existQuery = "SELECT * FROM `Routine` WHERE `routineName`='" . $_POST['name'] . "' AND `userName`='" . $_POST['user'] ."'";
$existResult = db_query($existQuery);
$count;

$saveQuery;

$return;

if($existResult === false) {
    $error = db_error();
    // Handle error - inform administrator, log to file, show error page, etc.
    $return['message'] = 'Error.';
}
else {
    $count = mysqli_num_rows($existResult);

    if ($count === 1) {
        //Routine already exists
        $saveQuery = "UPDATE `Routine` SET `routineJSON`='" . $_POST['routineJSON'] . "' WHERE `routineName`='" . $_POST['name'] . "' AND `userName`='" . $_POST['user'] ."'";
        $return['message'] = 'update';

    } else {
        //Routine does not already exist
        $return['message'] = 'create';
        $saveQuery = "INSERT INTO `Routine`(`routineName`, `userName`, `routineJSON`) VALUES ('" . $_POST['name'] . "','" . $_POST['user'] . "','" . $_POST['routineJSON'] . "')";
    }

    $saveResult = db_query($saveQuery);

    if(!$saveResult) {
        $error = db_error();
           // Handle error - inform administrator, log to file, show error page, etc.
    }
    else {
            //Success

    }

}


echo json_encode($return);
