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
class authentication {
    
    function __construct()
    {
        
    }
   
    //Checks if Logged In User Exists
    function login($username, $password)
    {
        $db = dbconnect::getdb();
        $stmt = $db->prepare('SELECT userid, password FROM users WHERE userid = :username OR email = :username' );
        $binds = array(":username"=>$username);
        if ($stmt->execute($binds) && $stmt->rowCount() > 0) 
        {   
            $results = $stmt->fetch(PDO::FETCH_ASSOC);
            if (password_verify($password, $results['password']))
            {
                if (isset($_SESSION))
                {
                    session_destroy();
                }
                
                session_start();
                $_SESSION['UID'] = $results['userid'];
                $_SESSION['LoggedIn'] = true;
                
                return true;
            }
        }
        else 
        {
            throw new Exception('invalid username or password');    
        }
    }
    
    function logout()
    {
       if (isset($_SESSION))
       {
           session_destroy();
       }
       header("Location: index.php");
    }
    
    
    
    
}
