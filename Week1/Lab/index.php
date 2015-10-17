<html>
    <head>
        <meta charset="UTF-8">
       <link rel="stylesheet" href="style.css">
        <title></title>
    </head>
    <body>

        
        <H1>Address List</H1>

        <div class="container">
        <table border=\"1\"><tr><th>ID</th><th>Address</th><th>city</th><th>state</th><th>zip</th></tr>
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
            <?php echo $row['addressID']; ?>                
            </td><td>                
            <?php echo $row['addr1'];?>            
            <br/>            
            <?php echo $row['addr2'];?>            
            </td><td>            
            <?php echo $row['city'];?>            
            </td><td>                
            <?php echo $row['state'];?>            
            </td><td>                
            <?php echo $row['zip'];?>            
            </td></tr>            
            <?php endforeach; ?>
            </table>
            
        <?php  else : ?>
        
            <h1>No Data</h1>
        
        <?php endif; ?>
        
        </div>
        
        <!-- Navigate to Add Page -->
    <form action="./add.php">
    <input type="submit" value="Add Address">
    </form>
    </body>
</html>