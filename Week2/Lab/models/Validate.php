<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Validate
 *
 * @author Mikeloeven
 */
class Validate 
{
    //checks if string is empty
    public function validateString($string)
    {       
            
        if (!empty($string)) 
        {
            return true;            
        }
        else
        {
            return false;
        }

    }
    
    //checks for valid email
    public function validateEmail($string)
    {
        if (filter_var($string, FILTER_VALIDATE_EMAIL))
        {
            return true;
        }
        else 
        {
            return false;        
        }
    }
    
    
    
    
}
