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
         * Persistance vars Populate from Form
         */
        $fullName= filter_input(INPUT_POST, 'fullName');
        $email= filter_input(INPUT_POST, 'email');
        $address= filter_input(INPUT_POST, 'address');
        $city= filter_input(INPUT_POST, 'city');
        $state= filter_input(INPUT_POST, 'state');
        $zip= filter_input(INPUT_POST, 'zip');
        $birthday= filter_input(INPUT_POST, 'birthday');
        
        
        ?>
        <div class="container">
        <form action="#" method="POST">
            
            <label>Full Name:</label><input type="text" name="fullName" value="<?php echo $fullName; ?>"><br/>
            <label>Email:</label><input type="text" name="email" value="<?php echo $email; ?>"><br/>
            <label>Address:</label><input type="text" name="address" value="<?php echo $address; ?>"><br/>
            <label>City:</label><input type="text" name="city" value="<?php echo $city; ?>"><br/>
            <label>State:</label><input type="text" name="state" maxlength="2" value="<?php echo $state; ?>"><br/>
            <label>Zip:</label><input type="text" name="zip" maxlength="5" value="<?php echo $zip; ?>"><br/>
            <label>Birthday:</label><input type="text" name="birthday" value="<?php echo $birthday; ?>"><br/>
            <br />
            <br />
            <input type="submit" value="Add" >
        </form>
        
        <!-- Nav Button -->
        <form action ="index.php">
            <input type="submit" value="Back">
        </form>
        </div>
        
       
        
        <?php if (isPostRequest()) :
            
            /*
             * Validation
             */
            $valid = 1; ?>
            <?php if (!$validate->validateString($fullName)) : ?> <br /> Name Invalid <br /> <?php $valid = 0; endif; ?>
            <?php if (!$validate->validateString($email)) : ?> <br /> Email Invalid <br /> <?php $valid = 0; endif; ?>
            <?php if (!$validate->validateString($address)) : ?> <br /> Address Invalid <br /> <?php $valid = 0; endif; ?>
            <?php if (!$validate->validateString($city))  : ?> <br /> City Invalid <br />  <?php $valid = 0; endif; ?>
            <?php if (!$validate->validateState($state))  : ?> <br /> State Invalid <br /> <?php $valid = 0; endif; ?>
            <?php if (!$validate->validateZip($zip))      : ?> <br /> Zip Invalid <br />   <?php $valid = 0; endif; ?>
            <?php if (!$validate->validateString($birthday)) : ?> <br /> Birthday Invalid <br /> <?php $valid = 0; endif; ?>
            
            <?php
            /*
             * Insert Call if Valid
             */
             
            if ($valid == 1) :?>
            
                <?php if(addAddress($fullName, $email, $address, $city, $state, $zip, date("Y-m-d",strtotime($birthday)))): ?> <br/>Address Added<br /> <?php endif; ?>                      
                   
            
            <?php else : ?> <br /> Address Not Added <br /> <?php endif;?>
            
        <?php endif; ?>  
        
        
        
        
    </body>
</html>