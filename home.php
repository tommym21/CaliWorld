<?php
$pageID = '1';

//include global functions
include("global.php");


//include template class
include("Classes/template.class.php");
//include region class
include("Classes/IP_region.php");
//include language class
include("Classes/language.php");


//Initiate the region
$reqReg = new IP_region();
$reqReg->set();
$region = $reqReg->get();

//Initiate the language
$reqLang = new Language();
$reqLang->set($_SERVER['HTTP_ACCEPT_LANGUAGE'], $region);
$lang=$reqLang->get()['lang_sub_tag'];

header("Content-Type: text/html; charset=utf-8");
header("Vary: Accept-Language");
header("Accept-Language: " .$lang. ";q=1");
$_SERVER['HTTP_ACCEPT_LANGUAGE'] = $lang;




//Initiate base direction
$dir=$reqLang->get()['dir'];

$langName;
$regName;

//include layout queries queries
include("Queries/layoutTemplate_queries.php");

//include page title queries
include("Queries/webPageQueries.php");


//initiiate language NAME
foreach($languageContent as $row => $array) {
    if ($array['Subtag'] == $lang) {
        $langName = $array['Name'];
    }
}

//Initiate region NAME
foreach($regionContent as $row => $array) {
    if ($array['Reg_Sub_Tag'] == $region) {
        $regName = $array['Name'];
    }
}

//Include page queries
include("Queries/homeContentQueries.php");


//Set the page template value for use by the top level layout template
$pageTemp = 'tempHome';





// Initiate the LAYOUT template view  - this will include the PAGE layout view
include ('Templates/layout.php');



?>