<?php

/**
 * Created by PhpStorm.
 * User: Tom
 * Date: 12/12/2016
 * Time: 12:08
 */


class IP_region
{
    //IP address value
    protected $ip;

    //region subtag value
    protected $region;

    public function set()
    {

        //Check if region override cookie exists
        $cookie_name = 'regionOverride';
        if(isset($_COOKIE[$cookie_name])) {
            //If region override value exists, set region to this value
            $override=$_COOKIE[$cookie_name];
            $this->region=$override;

        } else
        {

            //If region override cookie is not set, extract visitors IP address from HTTP header
            foreach (array('HTTP_CLIENT_IP', 'HTTP_X_FORWARDED_FOR', 'HTTP_X_FORWARDED', 'HTTP_X_CLUSTER_CLIENT_IP', 'HTTP_FORWARDED_FOR', 'HTTP_FORWARDED', 'REMOTE_ADDR') as $key) {
                if (array_key_exists($key, $_SERVER) === true) {
                    foreach (explode(',', $_SERVER[$key]) as $ip) {
                        if (filter_var($ip, FILTER_VALIDATE_IP) !== false) {

                            $this->ip = $ip; //<<-- real IP address
                            //$this->ip = '163.177.112.32';  //<<--- TEST IP ADREESS, region = cn
                            //$this->ip = '54.152.222.43';  //<<--- TEST IP ADREESS, region = usa
                            //$this->ip = '128.199.221.37';  //<<--- TEST IP ADREESS, region = indonesia (unsupported)
                        }
                        else $this->ip = 'Not found';
                    }
                }
            }


            if($this->ip == 'Not found') {
                //if ip is not found, region fallsback to en
                $this->region='uk';

            }
            else {

                //if ip is found, perform a look up on its region
//                $json = file_get_contents('http://getcitydetails.geobytes.com/GetCityDetails?fqcn=' . $this->ip);
//                $data = json_decode($json, true);
//                $geo = strtolower($data['geobytesinternet']);
//
//                //If region lookup is unsuccessful, fallback to en
//                if($geo == '' ) $geo = 'uk';
//
//
//                //If region lookup successful, get the corresponding standardised region tag from the database
//
//                //--------------------------------------------------------------------------
//                // Connect to mysql database - if connection doesnt exist
//                //--------------------------------------------------------------------------
//                if(!(function_exists('db_connect'))){
//                    // my_function is defined
//                    include('../database.php');
//                }
//
//
//                $ipQuery = "SELECT `Reg_Sub_Tag` FROM `Geobytes_Region` WHERE `Geo_Sub_Tag` = '" . $geo . "'";
//                $geoResult = db_select($ipQuery);
//
//                if (!($geoResult === false)) {
//                    if (array_key_exists(0, $geoResult)) {
//                        //Return the standard region tag
//                        $this->region = $geoResult[0]['Reg_Sub_Tag'];
//                    }
//                    else {
//                        $this->region = 'uk';
//                    }
//
//                }



            }

            $this->region = 'uk';

        }

    }


    public function get() {
        $reg = $this->region;
        return $reg;
    }

}

?>