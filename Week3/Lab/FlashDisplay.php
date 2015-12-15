<?php namespace Week3Lab; include './models/autoload.php';?>
<html>
    <head>

        <title></title>
        <link rel="stylesheet" href="./CSS/bootstrap.css">
        <link rel="stylesheet" href="./CSS/bootstrap.min.css">
    </head>
    <body>
       <?php 
        session_start();
        $flashmsg = new FlashMessage();
        
        ?><h3 class="h3 well">Flash Messages</h3><?php
        
        foreach ($flashmsg->getAllMessages() as $msg)
        {
            ?><p align="center" class="btn btn-info" style="margin-left: 0%; padding-right: 48%; padding-left: 48%; text-align: center"> <?php echo $msg ?> </p><?php
        }
        
        ?>
            
            
    </body>
</html>
