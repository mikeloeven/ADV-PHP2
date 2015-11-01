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
        if(!isset($_SESSION['LoggedIn']))
        {
            ?><h3 class = "h3" style = "text-align: center"> You have been successfully authenticated </h3><br /><?php
        }
        else 
        {
            ?><h1 class = "h1" style = "text-align: center"> Access Denied </h1><br />
                <h3 class = "h3" style = "text-align: center"> You will be redirected in 5 seconds </h3><br />
                    <?php
            header("refresh:5;url=index.php");
            die("");
        }
        ?>
    </body>
</html>
