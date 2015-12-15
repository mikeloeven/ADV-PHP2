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
    
    //default constructor
    function __construct()
    {
        //empty object
    }
    
    //Register User
    function register($email, $password)
    {
        $db = dbconnect::getdb();
        $stmt = $db->prepare('SELECT userid FROM users WHERE email=:email');
        $binds = array(":email"=>$email);
        //Check if User Exists
        if($stmt->execute($binds) && $stmt->rowCount()>0)
        {
            throw new Exception("User Already Exists");
        }
        //Save New User
        else
        {
            //hash password before storing
            $pHash = password_hash($password, PASSWORD_DEFAULT);
            $stmt = $db->prepare('INSERT INTO users (email, password, created) VALUES (:email, :pHash, now())');
            $binds = array("email"=>$email, ":pHash"=>$pHash);
            if($stmt->execute($binds))
            {
                //Successfull Registration
                return true;
            }
            else
            {
                //Unknown Failure
                throw new Exception("SQL Error");
            }
            
        }
        
    }
    
}
