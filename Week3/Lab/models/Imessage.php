<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Imessage
 *
 * @author Mikeloeven
 */
namespace Week3Lab;
interface IMessage
{
    public function addMessage($key,$msg);
    public function removeMessage($key);
    public function getAllMessages();
} 