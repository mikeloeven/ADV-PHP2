<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->


<div class='well'style='margin-right: 50%'>
        <form action="#" method="post" class="form-horizontal">
            <fieldset>
                <legend>Msg Test</legend>
                <div class='form-group'>
                    <label for='eKey' class='col-lg-2 control-label' style="width: 30%; text-align: right">Error Message Key:</label>
                    <div class="col-lg-10" style="width: 70%">
                        <input type="text" class="form-control" name='eKey' placeholder='Error Message Key' value="">
                    </div>
                </div>
                <div class='form-group'>
                    <label for='eMsg' class='col-lg-2 control-label' style="width: 30%; text-align: right">Error Message:</label>
                    <div class="col-lg-10" style="width: 70%">
                        <textarea class="form-control" name='eMsg' placeholder='Error Message' value=""></textarea>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-lg-10 text-right" style="float: right">
                        <input type="submit" name="action" value="Add eMessage" class="btn-primary" style="padding-right: 10px; margin-right: 10px">
                        <input type="submit" name="action" value="Remove eMessage" class="btn-primary" >
                    </div>
                </div>
                <div class='form-group'>
                    <label for='mKey' class='col-lg-2 control-label' style="width: 30%; text-align: right">Message Key:</label>
                    <div class='col-lg-10' style="width: 70%">
                        <input type="text" class="form-control" name='mKey' placeholder='Message Key' >
                    </div>
                </div>
                <div class='form-group'>
                    <label for='msg' class='col-lg-2 control-label' style="width: 30%; text-align: right">Message:</label>
                    <div class='col-lg-10' style="width: 70%">
                        <textarea class="form-control" name='msg' placeholder='Message'></textarea>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-lg-10 text-right" style="float: right">
                        <input type="submit" name="action" value="Add Message" class="btn-primary" style="padding-right: 10px; margin-right: 10px">
                        <input type="submit" name="action" value="Remove Message" class="btn-primary" >
                    </div>
                </div>
                <div class='form-group'>
                    <label for='fKey' class='col-lg-2 control-label' style="width: 30%; text-align: right">Message Key:</label>
                    <div class='col-lg-10' style="width: 70%">
                        <input type="text" class="form-control" name='fKey' placeholder='Flash Message Key' >
                    </div>
                </div>
                <div class='form-group'>
                    <label for='fMsg' class='col-lg-2 control-label' style="width: 30%; text-align: right">Flash Message:</label>
                    <div class='col-lg-10' style="width: 70%">
                        <textarea class="form-control" name='fMsg' placeholder='Message'></textarea>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-lg-10 text-right" style="float: right">
                        <input type="submit" name="action" value="Add Flash Message" class="btn-primary" style="padding-right: 10px; margin-right: 10px">
                        <input type="submit" name="action" value="Remove Flash Message" class="btn-primary" >
                        <input type="submit" name="action" value="Display Flash Messages" class="btn-primary" >
                        
                    </div>
                </div>
                     
            </fieldset>        
        </form> 
</div>
