<?php namespace Week3Lab;

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of util
 *
 * @author Mikeloeven
 */

class util {
    
    function isPostRequest() 
    {
        return ( filter_input(INPUT_SERVER, 'REQUEST_METHOD') === 'POST' );
    }
   

}
