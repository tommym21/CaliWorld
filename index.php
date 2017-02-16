<?php
/**
 * Created by PhpStorm.
 * User: Tom
 * Date: 12/12/2016
 * Time: 09:25
 */


include('database.php');


$query = "INSERT INTO `Content`(`id`, `lang_sub_tag`, `content`) VALUES ('home', 'cnm', 'Home' ), ('history', 'cnm', 'History' ), ('training', 'cnm', 'Training' ), ('training_map', 'cnm', 'Training Map' ), ('street_workout', 'cnm', 'Street Workout' ), ('news', 'cnm', 'News' )";
$result = db_query($query);
if($result === false) {
    $error = db_error();
    // Handle error - inform administrator, log to file, show error page, etc.
}

else{

    //Allow processing to go on

}

?>