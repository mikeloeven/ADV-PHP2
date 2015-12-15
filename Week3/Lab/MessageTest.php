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
        $errmsg = new ErrorMessage();
        $flashmsg = new FlashMessage();
        $message = new Message();
        $message->addMessage('msg1','I am a Message' );
        $message->addMessage('deleted', 'I Should Have Been Deleted');
        $message->addMessage('msg2', 'I am a second Message');
        $message->removeMessage('deleted');
        $errmsg->addMessage('err1', 'I am an Error');
        $errmsg->addMessage('deleted', 'Deleted Error Message');
        $errmsg->addMessage('err2', 'I am another Error');
        $errmsg->removeMessage('deleted');
        $flashmsg->addMessage('f1', 'I am a Flash Message');
        $flashmsg->addMessage('deleted', 'Deleted Flash Message');
        $flashmsg->addMessage('f2', 'I am another Flash Message');
        $flashmsg->removeMessage('deleted');
        
        ?><h3 class="h3 well">Display Messages</h3><?php
        
        foreach ($message->getAllMessages() as $msg)
        {
            ?><p align="center" class="btn btn-success" style="margin-left: 0%; padding-right: 48%; padding-left: 48%; text-align: center"> <?php echo $msg ?> </p><?php
        }
        
        ?><h3 class="h3 well">Display Error Messages</h3><?php
        
        foreach ($errmsg->getAllMessages() as $msg)
        {
            ?><p align="center" class="btn btn-danger" style="margin-left: 0%; padding-right: 48%; padding-left: 48%; text-align: center"> <?php echo $msg ?> </p><?php
        }
        
        ?><h3 class="h3 well">Display Flash Messages</h3>
        <div class="divider well">
            <form class="form-group" action="./FlashDisplay.php" method="post"> 
                <input class="btn btn-info" style="width: 25%; margin-left: 38%" type="submit" value="Display Flash Messages">
            </form>
        </div>    
            <?php
        
        
        ?>
    </body>
</html>
