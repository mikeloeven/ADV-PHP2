<html>
    <head>
        
    </head>
    <body>
        <?php 
        $addr1= filter_input(INPUT_POST, 'addr1');
        $addr2= filter_input(INPUT_POST, 'addr2');
        $city= filter_input(INPUT_POST, 'city');
        $state= filter_input(INPUT_POST, 'state');
        $zip= filter_input(INPUT_POST, 'zip');
        
        
        ?>
        <H1>Add Address</h1>
        
        <form action="#" method="POST">
            
            <label>Address1:</label><input type="text" name="addr1" value="<?php echo $addr1; ?>"><br/>
            <label>Address2:</label><input type="text" name="addr2" value="<?php echo $addr2; ?>"><br/>
            <label>City:</label><input type="text" name="city" value="<?php echo $city; ?>"><br/>
            <label>State:</label><input type="text" name="state" maxlength="2" value="<?php echo $state; ?>"><br/>
            <label>Zip:</label><input type="text" name="zip" maxlength="5" value="<?php echo $zip; ?>"><br/>
        
            <input type="submit" value="Add" >
        </form>
        
        <?php
        require_once './functions/dbconnect.php';
        require_once './functions/until.php';
        if (isPostRequest())
        {
            
        }   
        
        
        
        ?>
    </body>
</html>