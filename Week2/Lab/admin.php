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
        include'./models/autoload.php';
        $util=new util();
        
        if(isset($_SESSION['LoggedIn']))
        {       
                if ($util->isPostRequest())
                {
                    if(filter_input(INPUT_POST, 'action')=="Logout")
                    {
                        $auth=new authentication();
                        $auth->logout();
                    }
                }
            
                ?> <p align="center" class="btn btn-success" style="margin-left: 0%; padding-right: 100%; padding-left: 43%; text-align: center"> You have been successfully authenticated </p> <?php        
            
        }
        
        else 
        {
            ?> <a href="index.php" align="center" class="btn btn-danger" style="margin-left: 0%; padding-right: 100%; padding-left: 43%; text-align: center"> Unauthorized Access <br /> You Will Be Redirected in 5 Seconds </a> <?php
            header("refresh:5;url=index.php");
            die("");
        }
        ?>

            
        <?php require_once './templates/admin.panel.html.php'; ?>    
        
    </body>
</html>
