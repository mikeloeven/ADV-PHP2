<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of FlashMessage
 *
 * @author Mikeloeven
 */
class FlashMessage extends Message
{
    public function __construct()
    {
        if (!isset($_SESSION['flashmessages']) )
        {
            $_SESSION['flashmessages'] = array() ;
        }    
                
        foreach($_SESSION['flashmessages'] as $key => $value)
        {
            $this->addMessage($key, $value);
        }    
                
    } 
    
    
    public function addMessage($key, $msg)
    {
        
        parrent::addMessage($key, $msg);
        $_SESSION['flashmessages'][$key] = $msg;           
        
    }   
    
    
    public function removeMessage($key)
    {
        parrent::removeMessage($key);
        $this->setFlashMessages();
    }
    
    private function setFlashMessages()
    {
        
    }
               
            
          
    

}
