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
        
        <?php
        //autload
        include_once './models/autoload.php';
        //class init
        $util = new util();
        $validate = new Validate();
        $register = new registration();
        //Form Persistance Vars
        $username = filter_input(INPUT_POST, 'username');
        $email = filter_input(INPUT_POST, 'email');
        
        //dostuff if post
        if ($util->isPostRequest())
        {
            //Register New User
            if(filter_input(INPUT_POST, 'action')=="Register")
            {
                //Validation Block
                if (!$validate->validateString(filter_input(INPUT_POST, 'username')))
                {
                    ?> <p align="center" class="btn btn-danger" style="margin-left: 0%; padding-right: 48%; padding-left: 48%; text-align: center"> Username Invalid </p>  <?php
                }
                elseif (!$validate->validateEmail(filter_input(INPUT_POST, 'email')))
                {
                    ?> <p align="center" class="btn btn-danger" style="margin-left: 0%; padding-right: 48%; padding-left: 48%; text-align: center"> Invalid Email </p>  <?php
                }                
                //Check If Both Password Fields Match
                elseif (filter_input(INPUT_POST, 'password') != filter_input(INPUT_POST, 'password2'))
                {
                    ?> <p align="center" class="btn btn-danger" style="margin-left: 0%; padding-right: 48%; padding-left: 48%; text-align: center"> Passwords Do Not Match </p>  <?php
                }
                //Execute Registration
                else
                {
                    try
                    {
                        //Send Form Data To Registration Class
                        if ($register->register(filter_input(INPUT_POST, 'username'), filter_input(INPUT_POST, 'email'), filter_input(INPUT_POST, 'password')))
                        {
                            //Success Message
                            ?> <p align="center" class="btn btn-success" style="margin-left: 0%; padding-right: 48%; padding-left: 48%; text-align: center"> Registration Successful </p>  <?php
                        }
                    }
                    
                    catch (Exception $e) 
                    {
                        //Failure Message
                        ?> <p align="center" class="btn btn-danger" style="margin-left: 0%; padding-right: 48%; padding-left: 48%; text-align: center"> <?php echo $e->getmessage(); ?> </p>  <?php
                    }
                }
                
            }
            
            //Back To Index
            elseif(filter_input(INPUT_POST, 'action')=="Back")
            {
                
                header('Location: index.php');
                
            }
        }
            
        
        ?>
        
        
        <h1 class = "h1" style = "padding-left: 40%"> Registration </h1><br />
        <?php
        
            
            require_once './templates/registeration.form.html.php';
        
        ?>
        
    </body>
</html>
