<html>
    <head>
        <meta charset="UTF-8">
       <link rel="stylesheet" href="./CSS/bootstrap.css">
       <link rel="stylesheet" href="./CSS/bootstrap.min.css">
        <title></title>
    </head>
    <body>

        
        <H1 style="padding-left: 40%">Address List</H1>

        <div class="container">
            <table class="table" border="1"><tr><th>ID</th><th>Name</th><th>Email</th><th>Address</th><th>city</th><th>state</th><th>zip</th><th>Birthday</th></tr>
            <?php
        
            /* 
             * requirements
             */
            require_once './helpers/dbconnect.php';
            require_once './helpers/until.php';
        
            $db = dbconnect();
            $addrL = getAllAddress();

            /*
            * Generate Table Of Results
            */
            ?>
        
            <?php if (count($addrL) > 0) :?>
            
                <?php foreach ($addrL as $row) : ?>
                    <tr><td>                    
                    <?php echo $row['address_id']; ?>                
                    </td><td>                
                    <?php echo $row['fullname'];?>            
                    </td><td>          
                    <?php echo $row['email'];?>            
                    </td><td>
                    <?php echo $row['addressline1'];?>            
                    </td><td>  
                    <?php echo $row['city'];?>            
                    </td><td>                
                    <?php echo $row['state'];?>            
                    </td><td>                
                    <?php echo $row['zip'];?>            
                    </td><td>
                    <?php echo date('m/d/Y', strtotime($row['birthday']));?>            
                    </td></tr>  
                <?php endforeach; ?>
            </table>
            
            <?php  else : ?>
        
                <h1>No Data</h1>
        
            <?php endif; ?>
        
        </div>
        
        <!-- Navigate to Add Page -->
        <form action="./add.php">
        <input class="btn btn-default" style="margin-left: 45%" type="submit" value="Add Address">
        </form>
    </body>
</html>