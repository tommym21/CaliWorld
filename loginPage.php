<!DOCTYPE html>
<html>

<head>
    <!-- include Grapheme Breaker library and initiate breaker-->
    <script type="text/javascript" src="grapheme-splitter-master/grapheme-splitter.js"></script>
<script>
    var splitter = new GraphemeSplitter();

    function validate() {
        var username = document.getElementById('newusername').value;
        var password = document.getElementById('newpassword').value;

        //split the string to an array of grapheme clusters (one string each)
        var usernameCount = splitter.countGraphemes(username);
        var passwordCount = splitter.countGraphemes(password);

        if(usernameCount < 5) {

            return false;
        }
        if(passwordCount < 5){
            return false
        }

        return true;
    }
</script>
</head>


<body>


<?php

if(!(function_exists('db_connect'))){
    // my_function is defined
    include('database.php');
}


// Login php technique: https://www.tutorialspoint.com/php/php_mysql_login.htm

include('session.php');


if($_SERVER["REQUEST_METHOD"] == "POST") {
    // username and password sent from form

    if (isset($_POST['username'])) {
        $myusername = $_POST['username'];
        $mypassword = $_POST['password'];

        $sql = "SELECT * FROM `User` WHERE `Username` ='" . $myusername . "' AND `Password`='" . $mypassword . "'";

        $loginResult = db_query($sql);
        $count = mysqli_num_rows($loginResult);

        if ($count === 1) {
            //Successful login
            $_SESSION['login_user'] = $myusername;
            header("location: home.php");
        } else {
            //Failed login
            $error = "Your Login Name or Password is invalid";
        }
    }

}

if(!$loggedIn) {


    ?>



    <form id='register' onsubmit="return validate();" action='' method='post' accept-charset='UTF-8'>
        <fieldset>
            <legend>Login</legend>
            <label for='username'>UserName*:</label>
            <input type='text' name='newusername' id='newusername' maxlength="50"/>
            <label for='password'>Password*:</label>
            <input type='password' name='newpassword' id='newpassword' maxlength="50"/>
            <input type='submit' name='Submit' value='Submit'/>
        </fieldset>
    </form>


    <div style="font-size:11px; color:#cc0000; margin-top:10px"><?php echo $error; ?></div>



    <?php
        }else {
            echo '<a href="logout.php" >Log Out</a>';
            echo 'hi ' . $login_session;
        }
?>




</body>

</html>






