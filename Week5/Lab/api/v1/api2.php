<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

include_once './bootstrap.php';

$restServer = new RestServer();


try 
{

    $restServer->setStatus(200);
    
    $resource = $restServer->getResource();
    $verb = $restServer->getVerb();
    $id = $restServer->getId();
    $serverData = $restServer->getServerData();
    
    $config = array(
        'DB_DNS' => 'mysql:host=localhost;port=3306;dbname=PHPAdvClassFall2015',
        'DB_USER' => 'root',
        'DB_PASSWORD' => 'testpass1234'
    );
    
    $db = new PDO($config['DB_DNS'], $config['DB_USER'], $config['DB_PASSWORD']);
    $db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
    
    
    if ( 'corps' === $resource )
    {
        $resourceData = new CorpsResource();
        
        if( 'GET' === $verb)
        {
            if (null === $id)
            {
                $restServer->setData($resourceData->getAll());
            }
            else
            {
                $restServer->setData($resourceData->get($id));
            }
        }
        
        if ( 'POST' === $verb)
        {
            if($resourceData->post($serverData))
            {
                $restServer->setMessage('Corperation Added');
                $restServer->setStatus(201);
            }
            else
            {
                throw new Exception('Corperation Not Added');
            }
        }
        
        
    }

} 

catch (Exception $ex) 
{
    
}
