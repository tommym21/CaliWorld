<?php

//--------------------------------------------------------------------------
// Connect to mysql database - if connection doesnt exist
//--------------------------------------------------------------------------
if(!(function_exists('db_connect'))){
    // my_function is defined
    include('database.php');
}


class language
{
    //store the current region in the class
    protected $region;

    //array to store language values and assosiated quality factors
    protected $values = array();

    // Function to set values in an array
    public function set($langHeader, $region)
    {

        $this->region = $region;

        $this->values = array();



        //Check if language override cookie exists
        if(isset($_COOKIE['languageOverride'])) {
            //If region override value exists, set language array to this value with a quality factor of 1
            $langoverride=$_COOKIE['languageOverride'];
            $this->values[$langoverride]=1;

        } else {

            $split = explode(",", $langHeader);

            for ($i = 0; $i < count($split); $i++) {

                if (strpos($split[$i], ';') > 0) {
                    $currentLang = explode(';', $split[$i]);
                    $key = $currentLang[0];
                    $value = $currentLang[1];

                    $this->values[$key] = substr($value, 2);
                } else {
                    $key = $split[$i];
                    $this->values[$key] = 1;
                }

            }

        }


        arsort($this->values);

    }

    public function get()
    {
        //Set pointer of array to first element
        reset($this->values);

        //Get the key value for the first element
        for ($i = 0; $i < count($this->values); $i++) {

            $languageQuery = "SELECT `lang_sub_tag`, `dir` FROM `Legacy_Language_Tags` JOIN `Lang_Sub_Tag` ON `Lang_Sub_Tag`.Subtag = `Legacy_Language_Tags`.lang_sub_tag WHERE `Legacy_Language_Tags`.Legacy='" . strtolower(key($this->values)) . "'";
            $result = db_select($languageQuery);

            if (!($result === false)) {
                if (array_key_exists(0, $result)) {
                    //Return the first supported language (tag)
                    return $result[0];
//                        $result[0]['lang_sub_tag'];
                    //                        $result[0]['dir'];
                }

            }
            //If language not supported, set pointer of array to next element
            next($this->values);

        }

        //If no supported language returned from browser preferences - then default to the language based on the IDN
        $dirname = dirname($_SERVER['PHP_SELF']);
        $result = array();

        switch ($dirname) {
            case "/收音机体操":
                $languageQuery = "SELECT `Subtag` AS 'lang_sub_tag', `dir` FROM `Lang_Sub_Tag` WHERE `Subtag`='cmn'";
                $result = db_select($languageQuery);

                if (!($result === false)) {
                    if (array_key_exists(0, $result)) {
                        //Return the first supported language (tag)
                        return $result[0];
//                        $result[0]['lang_sub_tag'];
                        //                        $result[0]['dir'];
                    }

                }
                break;
            case "/كاليسثينيكسورلد":
                $languageQuery = "SELECT `Subtag` AS 'lang_sub_tag', `dir` FROM `Lang_Sub_Tag` WHERE `Subtag`='ar'";
                $result = db_select($languageQuery);

                if (!($result === false)) {
                    if (array_key_exists(0, $result)) {
                        //Return the first supported language (tag)
                        return $result[0];
//                        $result[0]['lang_sub_tag'];
                        //                        $result[0]['dir'];
                    }

                }
                break;
            case "/CalisthenicsWelt":
                $languageQuery = "SELECT `Subtag` AS 'lang_sub_tag', `dir` FROM `Lang_Sub_Tag` WHERE `Subtag`='de'";
                $result = db_select($languageQuery);

                if (!($result === false)) {
                    if (array_key_exists(0, $result)) {
                        //Return the first supported language (tag)
                        return $result[0];
//                        $result[0]['lang_sub_tag'];
                        //                        $result[0]['dir'];
                    }

                }
                break;
            case "/칼리 스테 네스 월드":
                $languageQuery = "SELECT `Subtag` AS 'lang_sub_tag', `dir` FROM `Lang_Sub_Tag` WHERE `Subtag`='ko'";
                $result = db_select($languageQuery);

                if (!($result === false)) {
                    if (array_key_exists(0, $result)) {
                        //Return the first supported language (tag)
                        return $result[0];
//                        $result[0]['lang_sub_tag'];
                        //                        $result[0]['dir'];
                    }

                }
                break;
            default:
                //If no supported language is returned based on the user browser language preferences, lookup the default language for their region
                $languageFallBackQuery = "SELECT `Subtag` AS 'lang_sub_tag',`dir`  FROM `Region` JOIN `Lang_Sub_Tag` ON `Lang_Sub_Tag`.Subtag = `Region`.`default_lang` WHERE `Region`.Reg_Sub_Tag = '" . strtolower($this->region) . "'";
                $fallbackResult = db_select($languageFallBackQuery);
                if (!($fallbackResult === false)) {
                    if (array_key_exists(0, $fallbackResult)) {
                        return $fallbackResult[0];
//                $fallbackResult[0]['lang_sub_tag'];
                        //                        $result[0]['dir'];
                    }

                }
                break;
        }








    }


}



?>