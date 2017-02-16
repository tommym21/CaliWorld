<?php
$error = '';
$error2 = '';
$logShow = 'false';
$registerShow = 'false';

//========================================
//CONNECTION CHECK
//=============================================
if(!(function_exists('db_connect'))){
    // my_function is defined
    include('database.php');
}



//========================================
//HANDLE USER LOG ON AND SESSION
//=============================================

//Login php technique: https://www.tutorialspoint.com/php/php_mysql_login.htm
//Include session
include('session.php');


if($_SERVER["REQUEST_METHOD"] == "POST") {
    // username and password sent from form

    //Handle LOG IN POST request
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
            $logShow = 'true';
        }
    }
    else {
        //Handle CREATE USER POST request
        $newusername = $_POST['newusername'];
        $newpassword = $_POST['newpassword'];

        //check the requested username does not already exist
        $checkSql = "SELECT * FROM `User` WHERE `Username` ='" . $newusername . "'";

        $checkResult = db_query($checkSql);
        $count = mysqli_num_rows($checkResult);

        if ($count === 1) {
            //Username already exists
            $error2 = 'Sorry, this username is already in use, please chose a new one.';
            $registerShow = 'true';

        } else {
            //Username is available
            $registerSql = "INSERT INTO `User`(`Username`, `Password`) VALUES ('" . $newusername . "', '" . $newpassword ."')";
            $regResult = db_query($registerSql);

            if ($regResult) {
                header("location: success.html");
            } else {
                $error2 = 'There was an error.';
                $registerShow = 'true';
            }
        }

    }

}

//====================================
//====================================

?>



<!DOCTYPE html>
<html>



<head>

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!--[if lte IE 8]><script src="css/ie/html5shiv.js"></script><![endif]-->
    <!--jQuery-->
    <script src="js/jquery.min.js"></script>
    <!--WHAT?? -->
    <script src="js/jquery.dropotron.min.js"></script>
    <script src="js/jquery.scrollgress.min.js"></script>
    <script src="js/jquery.scrolly.min.js"></script>
    <script src="js/jquery.slidertron.min.js"></script>
    <script src="js/skel.min.js"></script>
    <script src="js/skel-layers.min.js"></script>
    <script src="js/init.js"></script>

    <!--Font Awesome-->
    <link rel="stylesheet" type="text/css" href="css/font-awesome.min.css" />

    <!--Cali Styles-->
    <link rel="stylesheet" type="text/css" href="css/style.css" />
    <link rel="stylesheet" type="text/css" href="css/fonts.css" />

    <script>


        //========================================
        //  JS  Locale initiation
        //=============================================

        //If region & LANGUAGE?? cookie not set, get the region based from IP address and relevant language for that region
        //Then present user with language and region override diaog box

        var language = '<?php echo $lang; ?>';
        var region = '<?php echo $region; ?>';

        $(document).ready(function () {

            if(typeof(getCookie('regionOverride')) === "undefined" ){

                //Select the value of the select inputs based on browser derived data
                document.getElementById('langInit').value = language;
                document.getElementById('regionInit').value = region;

                $( "#popInit" ).toggle( "fold" );


            }


            var logShow = <?php echo $logShow; ?>;
            var registerShow = <?php echo $registerShow; ?>;

            if(logShow){
                document.getElementById('login').style.display = 'block';
            }
            if(registerShow){
                document.getElementById('register').style.display = 'block';
            }

        });

        //========================================
        //=============================================



        //  JS Form Validation
        //====================

        function validate() {
            var username = document.getElementById('newusername').value;
            var password = document.getElementById('newpassword').value;

            //split the string to an array of grapheme clusters (one string each)
            var usernameCount = splitter.countGraphemes(username);
            var passwordCount = splitter.countGraphemes(password);

            var plus = false;
            var pass = true;

            if(usernameCount < 5) {
                document.getElementById('errorBar2').innerHTML = "Username must be 5 characters long.";
                plus = true;
                pass=false;
            }

            if(passwordCount < 5){

                if(plus){
                    document.getElementById('errorBar2').innerHTML += "Password must be 5 characters long.";
                }
                else {
                    document.getElementById('errorBar2').innerHTML = "Password must be 5 characters long.";
                }

                pass = false;
            }

            return pass;
        }





    </script>


    <title>[@title]</title>


</head>




<body>

<!--Start Background disabled wrap-->
<div id="popWrap">

    <!--Start Locale initiation wrap-->
    <div id="popInit" style="display:none">

        <h5>
            Welcome to Calisthenics World
        </h5>

        <p>
            Please select a region and language below:
            <br />
            <i style="font-size:12px;">
                You can alter these settings at any time by using the controls to the top right of the window.
            </i>
        </p>

        <br /><br />

        <label>Region:</label>
        <br />


        <select id="regionInit">

            <!-- Start  Region select php-->
            <?php

            foreach($regionContent as $row => $array) {
                echo '<option style="whitepace:nowrap;" value="' .$array['Reg_Sub_Tag']. '"><span style="display:block;" >' . $array['Name'] . '</span></option>';
            }

            ?>
            <!-- End  Region select php-->

        </select>

        <br /><br />

        <label>Language:</label><br />

        <select id="langInit" onchange="selLangChange(this.value)">

            <!-- Start Language select php -->
            <?php

            foreach($languageContent as $row => $array) {
                echo '<option class="' . $array['Subtag'] . '" style="whitepace:nowrap;" value="' .$array['Subtag']. '"><span style="display:block;" >' . $array['Name'] . '</span></option>';


            }
            ?>

            <!-- End Language select php -->

        </select>

        <br /><br />


        <!-- Locale initiation JS SUMBIT-->
        <button class="button" onclick="localeInit(document.getElementById('regionInit').value, document.getElementById('langInit').value);">Continue</button>

        <br /><br />

        <p>By continuing to use the Calisthenics World website, you will be agreeing to the <a href="#">Use Of Cookies</a> while using the website.</p>

        <!--End Locale initiation wrap-->
    </div>
    <!--End Background disabled wrap-->
</div>

<!-- Header start -->
<div id="header">



    <div id="userBar" >
        <h1><a href="home.php"><?php  $mainName = contentSearch($layoutContent, 'ID', 3); echo $mainName[0]['content'] ?></a></h1>

        <!-- If no user logged in, display log in form:  -->
        <?php
        if(!$loggedIn) {
            ?>

            <div id="userTog">
                <button class="button" onclick="logTog()"><?php  $mainName = contentSearch($layoutContent, 'ID', 6); echo $mainName[0]['content'] ?></button>
                <button style="margin-right: 10px;" class="button special" onclick="registerTog()"><?php  $mainName = contentSearch($layoutContent, 'ID', 7); echo $mainName[0]['content'] ?></button>
            </div>


            <form id='login' action='' method='post' accept-charset='UTF-8' style="display: none;">
                <fieldset>
                    <label for='username'><?php  $mainName = contentSearch($layoutContent, 'ID', 8); echo $mainName[0]['content'] ?>:</label>
                    <input type='text' name='username' id='username' maxlength="50"/>
                    <label for='password'><?php  $mainName = contentSearch($layoutContent, 'ID', 9); echo $mainName[0]['content'] ?>:</label>
                    <input type='password' name='password' id='password' maxlength="50"/>
                    <input class="button" type='submit' name='Submit' value='<?php  $mainName = contentSearch($layoutContent, 'ID', 6); echo $mainName[0]['content'] ?>'/>
                </fieldset>
            </form>

            <div id="errorBar" class="errorBar" >
                <?php echo $error; ?>
            </div>

            <form id='register' onsubmit="return validate();" action='' method='post' accept-charset='UTF-8' style="display: none;">
                <fieldset>
                    <label for='newusername'><?php  $mainName = contentSearch($layoutContent, 'ID', 8); echo $mainName[0]['content'] ?>:</label>
                    <input type='text' name='newusername' id='newusername' maxlength="50"/>
                    <label for='newpassword'><?php  $mainName = contentSearch($layoutContent, 'ID', 9); echo $mainName[0]['content'] ?>:</label>
                    <input type='password' name='newpassword' id='newpassword' maxlength="50"/>
                    <input class="button special" type='submit' name='Register' value='<?php  $mainName = contentSearch($layoutContent, 'ID', 7); echo $mainName[0]['content'] ?>'/>
                </fieldset>
            </form>

            <div id="errorBar2" class="errorBar" >
                <?php echo $error2; ?>
            </div>

            <?php
        }else {
            echo '<p id="welcome">Good day ' . $login_session . '&nbsp;&nbsp;| <a id="logout" href="logout.php" >Log Out</a></p>';

        }
        ?>

        <div style="clear: both;"></div>

    </div>

    <div class="localeWrap">



        <nav id="nav" >
            <ul>
                <li class="opener" style="user-select:none;cursor:pointer;white-space: nowrap;opacity: 1;">
                    <a href class="icon fa-angle-down"><?php echo $langName; ?></a>

                    <ul class style="user-select: none;display: none;position: absolute;">

                        <?php

                        foreach($languageContent as $row => $array) {
                            if ($array['Subtag'] !== $lang) {
                                echo '<li class="' . $array['Subtag'] . '" style="whitepace:nowrap;"><span style="display:block;" onclick="setLanguageOverride(\'' . $array['Subtag'] . '\', true)" >' . $array['Name'] . '</span></li>';
                            }

                        }
                        ?>


                    </ul>
                </li>

                <li class="opener" style="user-select:none;cursor:pointer;white-space: nowrap;opacity: 1;">
                    <a href class="icon fa-angle-down"><?php echo $regName . ' <img style="width:33px;border-radius:7px;" src="Images/' .$region . '.png" >' ; ?></a>

                    <ul class style="user-select: none;display: none;position: absolute;">

                        <?php

                        foreach($regionContent as $row => $array) {
                            if ($array['Reg_Sub_Tag'] !== $region) {
                                echo '<li style="whitepace:nowrap;" ><span style="display:block;" onclick="setRegionOverride(\'' . $array['Reg_Sub_Tag'] . '\', true)" >' . $array['Name'] . '</span></li>';
                            }
                        }
                        ?>


                    </ul>



            </ul>
        </nav>

    </div><br />

    <!-- Navigation menu start -->
    <div id="menu" >
        <ul class="menu">

            <?php
            $i=0;
            $menuContent = contentSearch($layoutContent, 'ID', 1);
            foreach($menuContent as $row => $array) {
                $link=array('home', 'history', 'training', 'training_map', 'street_workout', 'news');
                echo '<li><a href="' . $link[$i] . '.php">' .$array['content'] . '</a></li>';
                $i++;

            }
            ?>


        </ul>
    </div>
    <!-- Navigation menu end -->

</div>
<!-- Header end -->




<!-- Content region start - to load in page template -->
<div id="content">


    <?php
    //dynamically load in template file
    include ('Templates/' . $pageTemp . '.php');
    ?>


</div>
<!-- Content region start - end -->



<!-- footer start -->
<div id="footer">
    Footer Area<br />
    Search <a href="#">Calisthenics World</a>
</div>
<!-- footer end -->

</body>

<link rel="stylesheet" type="text/css" href="css/global.css" />
<script type="text/javascript" src="js/global.js"></script>

<!--include slider CSS and JS if street workout page-->
<?php
if($pageTemp == "tempStreetWorkout") {
//        echo '<link rel="stylesheet" type="text/css" href="http://darsa.in/sly/css/ospb.css" />';
    echo '<link rel="stylesheet" type="text/css" href="css/slider-' . $lang . '.css" />';
    echo '<script type="text/javascript" src="js/sly.js"></script>';
}

if($pageTemp == "tempTraining") {
    echo '<link rel="stylesheet" href="nyroModal-master/styles/nyroModal.css" type="text/css" media="screen" /><script type="text/javascript" src="nyroModal-master/js/jquery.nyroModal.js"></script><!--[if IE 6]><script type="text/javascript" src="nyroModal-master/js/jquery.nyroModal-ie6.min.js"></script><![endif]-->';

    echo '<script type="text/javascript">
                $(function() {
                    $(\'.nyroModal\').nyroModal();
                });
              </script>';
}


?>

<!-- include Grapheme Breaker library and initiate breaker-->
<script type="text/javascript" src="grapheme-splitter-master/grapheme-splitter.js"></script>
<script type="text/javascript">
    //Initiate a Grapheme Splitterv
    var splitter = new GraphemeSplitter();
</script>

<!--include LAYOUT AJAX-->
<script src='js/tempLayout.js'></script>

<!--include page AJAX-->
<?php echo "<script src='js/" . $pageTemp . ".js'></script>" ?>





</html>