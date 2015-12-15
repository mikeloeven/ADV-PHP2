<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of message
 *
 * @author Mikeloeven
 */
namespace Week3Lab;
class Message implements IMessage
{
    
    protected $messages;
    
    public function __construct() 
    {
        $this->messages = [];
    }    
    public function addMessage($key, $msg) 
    {
        $this->messages[$key] = $msg;
    }
    public function getAllMessages() 
    {
        return $this->messages;
    }
    public function removeMessage($key)
    {
        unset($this->messages[$key]);
    }
    public function removeAllMessages()
    {
        $this->messages = [];
    }
    public function clear()
    {
        $this->messages = array();
    }
}
