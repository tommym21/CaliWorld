<?php


function db_connect() {

    // Define connection as a static variable, to avoid connecting more than once
    static $connection;

    // Try and connect to the database, if a connection has not been established yet
    if(!isset($connection)) {
        // Load configuration as an array. Use the actual location of the configuration file
//        $config = parse_ini_file('../config.ini');
//        $connection = mysqli_connect('localhost',$config['username'],$config['password'],$config['dbname']);

        $username = 'lstom';
        $password = "sZXjLo8puN";
        $dbname = 'c391InternationlizationProject';

        //Try to conect to the database
        $connection = mysqli_connect('localhost', $username,$password,$dbname);

    }

    // If connection was not successful, handle the error
    if($connection === false) {
        // Handle error - notify administrator, log to a file, show an error screen, etc.
        return mysqli_connect_error();
    }
    return $connection;
}


//Function to query the database - For SELECT, SHOW, DESCRIBE or EXPLAIN queries,
// it will return a mysqli_result object, and for all other queries it will return true
function db_query($query) {
    // Connect to the database
    $connection = db_connect();

    // Query the database
    $result = mysqli_query($connection,$query);

    return $result;
}

//Function to get database error details
function db_error() {
    $connection = db_connect();
    return mysqli_error($connection);
}


//Function to make a SELECT query to database
function db_select($query) {
    $rows = array();
    $result = db_query($query);

    // If query failed, return `false`
    if($result === false) {
        return false;
    }

    // If query was successful, retrieve all the rows into an array
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}

?>
