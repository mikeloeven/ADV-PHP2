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
                    <label for='password2' class='col-lg-2 control-label' style="width: 20%">confirm password:</label>
                    <div class='col-lg-10' style="width: 60%">
                        <input type="password" class="form-control" name='password2' placeholder='password' >
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-lg-10 col-lg-offset-2">
                        <a href="index.php" class="btn-primary"></a>
                        <input type="submit" name="action" value="Register" class="btn-primary">
                        <input type="submit" name="action" value="Back" class="btn-primary">
                    </div>
                </div>     
            </fieldset>        
        </form> 
</div>
