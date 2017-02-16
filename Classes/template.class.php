<?php

/**
 * Created by PhpStorm.
 * User: Tom
 * Date: 11/12/2016
 * Time: 10:19
 */

class Template {


    //Content Values
    protected $values = array();

    //Content values arranged by id
    protected $output = array();


    // Function to set values in an array
    public function set($key, $value) {
        $this->values[$key] = $value;
    }


    // Function to Construct the output array
    public function output() {
        //Wreturn content values array
        return $this->values;
    }

}

?>