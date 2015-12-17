<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 *
 * @author Mikeloeven
 */
interface IRestModel {
    //put your code here
    function getAll();
    function get($id); 
    function post($serverData);
    function put($serverData);
    function delete($id);
}

