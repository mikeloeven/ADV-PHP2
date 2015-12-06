<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of authenrtication
 *
 * @author Mikeloeven
 */

//Handles All Authentication and Session Management
class authentication {
    
    //Default Constructor
    function __construct()
    {
        
    }
   
    //Checks if Logged In User Exists
    function login($email, $password)
    {
        $db = dbconnect::getdb();
        $stmt = $db->prepare('SELECT userid, password FROM users WHERE email = :email');
        $binds = array(':email'=>$email);
        if ($stmt->execute($binds) && $stmt->rowCount() > 0) 
        {   
            $results = $stmt->fetch(PDO::FETCH_ASSOC);
            //Checks to see if Password Matches
            if (password_verify($password, $results['password']))
            {
              
                //destroy existing session if exists
                if (isset($_SESSION))
                {
                    //destory existing session if exists
                    session_destroy();
                }
                //start session with ID and LoggedIn Flag
                session_start();
                $_SESSION['UID'] = $results['userid'];
                $_SESSION['LoggedIn'] = true;
                
                return true;
            }
            else 
            {
                //Error Message If Passwords Do Not Match
                throw new Exception('invalid username or password');   
            }
        }
        else 
        {
            //Error if User Does Not Exist
            throw new Exception('invalid username or password');    
        }
    }
    
    //destroy session and tell index page to display logout message
    function logout()
    {
       if (isset($_SESSION))
       {
           session_destroy();
       }
       header("Location: index.php?Logout=true");
    }
    
    
    
    
}
