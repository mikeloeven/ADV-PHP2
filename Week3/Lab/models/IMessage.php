<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
namespace Lab3;
interface IMessage
{
    public function addMessage($key,$msg);
    public function removeMessage($key);
    public function getAllMessages();
}