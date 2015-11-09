<html>
    <head>
       <meta charset="UTF-8">
       <title></title>
      <link rel="stylesheet" href="./CSS/bootstrap.css">
      <link rel="stylesheet" href="./CSS/bootstrap.min.css">
    </head>
    
    <body>
        <?php 
            include_once './models/autoload.php';
            
            $util = new util();
            $login = new authentication();
            if(filter_input(INPUT_GET, 'Logout')=="true")
            {
                ?>
                    <p align="center" class="btn btn-primary" style="margin-left: 0%; padding-right: 48%; padding-left: 48%; text-align: center"> You Have Been Logged Out </p> 
                <?php   
            }
            
            else
            {
                  
            }
                
            if($util->isPostRequest()){
            
                
                if (filter_input(INPUT_POST,'action')=="Sign In"){
                
                    
                    $error = null;
                    try
                    {

                        if($login->login(filter_input(INPUT_POST, 'username'), filter_input(INPUT_POST, 'password')))
                        {   
                            header("location: ./admin.php");
                            exit();
                        }
                        
                        else 
                        {
                            throw new Exception('Unknown Error Has Occured');
                        }
                    }
                    
                    catch(exception $e)
                    {
                        
                        ?> <p align="center" class="btn btn-danger" style="margin-left: 0%; padding-right: 48%; padding-left: 48%; text-align: center"> <?php echo $e->getmessage(); ?> </p> <?php
                        
                    }
                    
                    
                }
                
              
                   
                    
                elseif (filter_input(INPUT_POST, 'action')== "Register")
                {                    
                        header("Location: register.php");
                }
                
                else
                {
                    ?>
                        <p align="center" class="btn btn-danger" style="margin-left: 0%; padding-right: 48%; padding-left: 48%; text-align: center"> Invalid Action </p> 
                    <?php  
                }
                    
            }        
                    
                
                
                
                    
                
            
            
        ?>
        
        <?php 
       require_once './templates/loginform.html.php'; 
        ?>
        
        
            

        
    </body>
    
    
</html>