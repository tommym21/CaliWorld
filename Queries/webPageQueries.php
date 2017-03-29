<?php


$pageTitles = array();

//Gets the content in the correct language for the main layout template
$pageTitlesQuery = "SELECT `id`, `title` FROM `Web Page` WHERE `lang_sub_tag` = '" . $lang . "'";
$result = db_query($pageTitlesQuery);

if($result === false) {
$error = db_error();
// Handle error - inform administrator, log to file, show error page, etc.
}
else {
while($row = $result->fetch_assoc()) {

array_push($pageTitles, $row);
}


}

?>