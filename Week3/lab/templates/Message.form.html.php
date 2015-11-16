<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->


<div class='well'style='margin-right: 50%'>
        <form action="#" method="post" class="form-horizontal">
            <fieldset>
                <legend>Register</legend>
                <div class='form-group'>
                    <label for='username' class='col-lg-2 control-label' style="width: 20%">username:</label>
                    <div class="col-lg-10" style="width: 60%">
                        <input type="text" class="form-control" name='username' placeholder='username' value="<?php echo $username; ?>">
                    </div>
                </div>
                <div class='form-group'>
                    <label for='email' class='col-lg-2 control-label' style="width: 20%">email:</label>
                    <div class="col-lg-10" style="width: 60%">
                        <input type="text" class="form-control" name='email' placeholder='email' value="<?php echo $email; ?>">
                    </div>
                </div>
                <div class='form-group'>
                    <label for='password' class='col-lg-2 control-label' style="width: 20%">password:</label>
                    <div class='col-lg-10' style="width: 60%">
                        <input type="password" class="form-control" name='password' placeholder='password' >
                    </div>
                </div>
                <div class='form-group'>
                    <label for='message' class='col-lg-2 control-label' style="width: 20%">Enter Message:</label>
                    <div class='col-lg-10' style="width: 60%">
                        <input type="text" class="form-control" name='message' placeholder='message'>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-lg-10 col-lg-offset-2">
                        <a href="index.php" class="btn-primary"></a>
                        <input type="submit" name="action" value="Add Message" class="btn-primary">
                        <input type="submit" name="action" value="Remove" class="btn-primary">
                    </div>
                </div>     
            </fieldset>        
        </form> 
</div>
