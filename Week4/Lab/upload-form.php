<?php namespace Lab4; include './class/autoload.php'?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="./CSS/bootstrap.css">
        <link rel="stylesheet" href="./CSS/bootstrap.min.css">
        <title></title>
    </head>
    <body>
        <!-- The data encoding type, enctype, MUST be specified as below -->
        <?php 
            session_start();
            $message = new FlashMessage();
            $messages = $message->getAllMessages();
            foreach($messages as $msg)
            {
                ?><p align="center" class="btn btn-info" style="margin-left: 0%; padding-right: 48%; padding-left: 48%; text-align: center"> <?php echo $msg ?> </p><?php
            }                 
            
        
        ?>
        
        
        
        <h3 class="h3 well divider" style="text-align: center">Upload Files</h3>
        <div class="well" style="margin-top: 10%">
        <form class="form-group" style="padding-left: 44%" enctype="multipart/form-data" action="./upload.php" method="POST">
            <!-- MAX_FILE_SIZE must precede the file input field -->
            <!-- <input type="hidden" name="MAX_FILE_SIZE" value="30000" /> -->
            <!-- Name of input element determines name in $_FILES array -->
            
            <input class="btn btn-primary " name="upfile" type="file" />
            <input class="btn btn-info" style="padding-left: 5%; padding-right: 5%" type="submit" value="Send File" />
            <a href = './index.php' class='btn btn-default ' style="padding-left: 2.7%; padding-right: 2.7%">Back</a>
        </form>
        </div>
                

        <!-- display imaged
        <img src="uploads/30420d1a9afb2bcb60335812569af4435a59ce17.jpg" /> -->
    </body>
</html>