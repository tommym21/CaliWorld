<?php


//--------------------------------------------------------------------------
// 1) Connect to mysql database - if connection doesnt exist
//--------------------------------------------------------------------------
if(!(function_exists('db_connect'))){
    // my_function is defined
    include('../database.php');
}

$searchResults = array();

//--------------------------------------------------------------------------
// 2) Query database for data
//--------------------------------------------------------------------------


$searchQuery = "SELECT DISTINCT `id` FROM `Exersize` WHERE lower(`title`) LIKE '%" .$_POST['term']. "%'";
$searchResult = db_query($searchQuery);

if($searchResult === false) {
    $error = db_error();
    // Handle error - inform administrator, log to file, show error page, etc.
}
else {
    while($row = $searchResult->fetch_assoc()) {

        array_push($searchResults, $row);
    }


}



//--------------------------------------------------------------------------
// 3) echo result as json
//--------------------------------------------------------------------------

if(isset($searchResults)){
    $return['searchResults'] = $searchResults;
}

echo json_encode($return);

?>