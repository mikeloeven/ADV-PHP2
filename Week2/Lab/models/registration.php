<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of registration
 *
 * @author Mikeloeven
 */
class registration {
    function __construct()
    {
        //empty object
    }
    
    
    //save new user
    function register($username, $email, $password)
    {
        $db = dbconnect::getdb();
        $stmt = $db->prepare('SELECT userid FROM users WHERE username=:username OR email=:email');
        $binds = array(":username"=>$username, ":email"=>$email);
        if($stmt->execute($binds) && $stmt->rowCount()>0)
        {
            throw new Exception("User Already Exists");
        }
        else
        {
            $pHash = password_hash($password, PASSWORD_DEFAULT);
            $stmt = $db->prepare('INSERT INTO users (username, email, password) VALUES (:username, :email, :pHash)');
            $binds = array(":username"=>$username, "email"=>$email, ":pHash"=>$pHash);
            if($stmt->execute($binds))
            {
                return true;
            }
            else
            {
                throw new Exception("SQL Error");
            }
            
        }
        
    }
    
}
