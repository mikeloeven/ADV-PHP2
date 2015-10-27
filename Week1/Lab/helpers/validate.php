<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of validate
 *
 * @author Mikeloeven
 */
class validate {
    
    
    public function validateString($string)
    {       
            if (!empty($string)) return true;            
            
            return false;

    }
    
   
    
    public function validateState($string)
    {
        $regex = '/[a-zA-Z]{2}/';
        
        if (!empty($string) && preg_match($regex, $string))return true;
        else return false;
    }
    
    public function validateZip($string)
    {
        $regex = '/\d{5}/';
        if (!empty($string) && preg_match($regex, $string)) return true;
        
        else return false;
    }

    
}
