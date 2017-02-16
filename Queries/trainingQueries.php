<?php


//--------------------------------------------------------------------------
// 1) Connect to mysql database - if connection doesnt exist
//--------------------------------------------------------------------------
if(!(function_exists('db_connect'))){
    // my_function is defined
    include('../database.php');
}

$exerciseContent = array();

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

//$query2 = "SELECT * FROM `Lang_Sub_Tag`";
//$result2 = db_query($query2);
//$array2 = mysqli_fetch_row($result2);

//--------------------------------------------------------------------------
// 3) echo result as json
//--------------------------------------------------------------------------

if(isset($exerciseContent)){
    $return['exercises'] = $exerciseContent;
}

//if(isset($array2)){
//    $return['array2'] = $array2;
//}

echo json_encode($return);

?>