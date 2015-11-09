<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <link rel="stylesheet" href="./CSS/bootstrap.css">
       <link rel="stylesheet" href="./CSS/bootstrap.min.css">
    </head>
    <body>
        
        <h1 class = "h1" style = "text-align: center"> Admin Page </h1><br />
        <?php
        //autoload
        include'./models/autoload.php';
        //class init
        $util=new util();
        //start session
        session_start();
        //check if Logged In
        if(isset($_SESSION['LoggedIn']))
        {       
                if ($util->isPostRequest())
                {
                    //Logout Button
                    if(filter_input(INPUT_POST, 'action')=="Logout")
                    {
                        authentication::logout();
                    }
                }
                else
                {
                    //Successful Login Message
                    ?> <p align="center" class="btn btn-success" style="margin-left: 0%; padding-right: 100%; padding-left: 43%; text-align: center"> You have been successfully authenticated </p> <?php        
                }
        }
        //Display Unauthorized User Message and Redirect to Index
        else 
        {
            ?> <a href="index.php" align="center" class="btn btn-danger" style="margin-left: 0%; padding-right: 100%; padding-left: 43%; text-align: center"> Unauthorized Access <br /> You Will Be Redirected in 5 Seconds </a> <?php
            header("refresh:5;url=./index.php");
            die("");
        }
        ?>

            
        <?php require_once './templates/admin.panel.html.php'; ?>    
        
    </body>
</html>
