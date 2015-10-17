<html>
    <head>
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        
        
        
        <H1>Add Address</h1>
        <br />
        
        <?php
        /*
         * Includes
         */
        require_once './helpers/dbconnect.php';
        require_once './helpers/until.php';
        require_once './helpers/validate.php';
        $validate = new validate();
        
        /*
         * Persistance vars
         */
        $addr1= filter_input(INPUT_POST, 'addr1');
        $addr2= filter_input(INPUT_POST, 'addr2');
        $city= filter_input(INPUT_POST, 'city');
        $state= filter_input(INPUT_POST, 'state');
        $zip= filter_input(INPUT_POST, 'zip');
        
        
        ?>
        <div class="container">
        <form action="#" method="POST">
            
            <label>Address1:</label><input type="text" name="addr1" value="<?php echo $addr1; ?>"><br/>
            <label>Address2:</label><input type="text" name="addr2" value="<?php echo $addr2; ?>"><br/>
            <label>City:</label><input type="text" name="city" value="<?php echo $city; ?>"><br/>
            <label>State:</label><input type="text" name="state" maxlength="2" value="<?php echo $state; ?>"><br/>
            <label>Zip:</label><input type="text" name="zip" maxlength="5" value="<?php echo $zip; ?>"><br/>
            <br />
            <br />
            <input type="submit" value="Add" >
        </form>
        <form action ="index.php">
            <input type="submit" value="Back">
        </form>
        </div>
        
        <?php
        
        if (isPostRequest())
        {
            $valid = 1;
            if (!$validate->validateString($addr1)) {echo " <br /> Addr1 Invalid<br />"; $valid = 0;}
            if (!$validate->validateString($addr2)) {echo " <br /> Addr2 Invalid<br />"; $valid = 0;}
            if (!$validate->validateString($city)) {echo " <br /> City Invalid<br />"; $valid = 0;}
            if (!$validate->validateState($state)) {echo "<br />State Invalid <br />"; $valid=0;}
            if (!$validate->validateZip($zip)) {echo "<br />Zip Invalid <br />"; $valid = 0;}
            
            if ($valid == 1)
            {
                if(addAddress($addr1, $addr2, $city, $state, $zip))
                {
                    echo "<br/>Address Added<br />";
                }                    
               
            
            }
            else echo "<br /> Address Not Added <br />";
            
        }   
        
        
        
        ?>
    </body>
</html>