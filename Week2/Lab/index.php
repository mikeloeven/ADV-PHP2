<html>
    <head>
       <meta charset="UTF-8">
       <title></title>
      <link rel="stylesheet" href="./CSS/bootstrap.css">
       <link rel="stylesheet" href="./CSS/bootstrap.min.css">
    </head>
    
    <body>
        <?php 
            include './helpers/util.php';
            $util = new util();
            if ($util->isPostRequest())
            {
                if (filter_input(input, 'action')=='Sign In')
                {
                    session_destroy();
                    session_start();
                    
                }
                
                if (filter_input(INPUT_POST, 'action')=='Register')
                {
                    header("Location: register.php");
                    die();
                }
                
            }
            
        ?>
        <h1 class = "h1" style = "padding-left: 40%"> Authentication </h1><br />
  
        <form action="#" method="post" class="form-horizontal">
            <fieldset>
            <legend>Sign In</legend>
            <input type="text" class="input">
            <input type="password" class="input">
            <input type="submit" name="action" value="Sign In" class="btn-primary" style="padding: .5%; padding-left: 9.8%; padding-right: 9.75%">
            <input type="submit" name="action" value="Register" class="btn-primary" style="padding: .5%; padding-left: 9.8%; padding-right: 9.75%">      
            </fieldset>
        
        </form> 
        
        
            

        
    </body>
    
    
</html>