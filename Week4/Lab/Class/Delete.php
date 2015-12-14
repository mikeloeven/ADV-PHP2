<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Lab4;

/**
 * Description of Delete
 *
 * @author Mikeloeven
 */
class Delete {
    
    static function delfile($filename)
    {
        if(unlink($filename))
        {
            return true;
        }
        else
        {
            return false;
        }
    }
    
}
