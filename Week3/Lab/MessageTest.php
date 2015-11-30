<?php namespace Lab3; include'./models/autoload.php';?>
<!DOCTYPE html>

<html>
    
    <head>
       
        <meta charset="UTF-8">
        <title></title>
        <link rel="stylesheet" href="./CSS/bootstrap.css">
        <link rel="stylesheet" href="./CSS/bootstrap.min.css">
    
    </head>
        
    <body>
                
        <?php

            
            $util = new util();
            $msg;
            $errorMsg;
            $FMsg;
            
            if ($util->isPostRequest())
            {
       
                
                
                $action = filter_input(INPUT_POST, 'action');
                var_dump($action);
                switch($action)
                {
                    case "Add eMessage":
                        $msg->addMessage(filter_input(INPUT_POST, 'eKey'), filter_input(INPUT_POST, 'eMsg'));
                        foreach ($msg->getAllMessages() as $keyLine=>$msgLine)
                        {
                            ?> <p align="center" class="btn btn-success" style="margin-left: 0%; padding-right: 100%; padding-left: 43%; text-align: center">Key:<?php echo $keyLine;?> Message: <?php echo $msgLine;?>  </p> <?php
                        }
                        
                        break;
                    
                    case "Remove eMessage":
                        ?> <p align="center" class="btn btn-success" style="margin-left: 0%; padding-right: 100%; padding-left: 43%; text-align: center"> Message Removed </p> <?php
                        break;
                    
                    default:
                        ?> <p align="center" class="btn btn-success" style="margin-left: 0%; padding-right: 100%; padding-left: 43%; text-align: center"> Invalid Case </p> <?php
                        break;
                }
                
                
            }
            
        
        
        ?>
        
        <?php require_once './templates/message.form.html.php';?>    
    </body>

</html>
