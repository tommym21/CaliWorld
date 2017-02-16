<?php

if(!(function_exists('db_connect'))){
    // my_function is defined
    include('database.php');
}




$languageContent = array();


//Gets all the languages that are supported from the database to populate drop down list
$lanuageContentQuery = "SELECT * FROM `Lang_Sub_Tag`";
$langResult = db_query($lanuageContentQuery);

if($langResult === false) {
    $error = db_error();
    // Handle error - inform administrator, log to file, show error page, etc.
}
else {
    while($row = $langResult->fetch_assoc()) {

        array_push($languageContent, $row);
    }


}



$regionContent = array();


//Gets all the languages that are supported from the database to populate drop down list
$regionContentQuery = "SELECT `Reg_Sub_Tag`, `Name` FROM `Region Name` WHERE `Lang`='" . $lang ."'";
$regionResult = db_query($regionContentQuery);

if($regionResult === false) {
    $error = db_error();
    // Handle error - inform administrator, log to file, show error page, etc.
}
else {
    while($row = $regionResult->fetch_assoc()) {

        array_push($regionContent, $row);
    }


}




$layoutContent = array();

//Gets the content in the correct language for the main layout template
$layoutContentQuery = "SELECT `ID`, `content` FROM `LayoutContent` WHERE `lang_sub_tag` = '" . $lang . "'";
$result = db_query($layoutContentQuery);

if($result === false) {
    $error = db_error();
    // Handle error - inform administrator, log to file, show error page, etc.
}
else {
    while($row = $result->fetch_assoc()) {

        array_push($layoutContent, $row);
    }


}




?>