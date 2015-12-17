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
            if (NULL === $id)
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
        
        if ( 'PUT' === $verb)
        {
            
            if($resourceData->put($id, $serverData))
            {
                $restServer->setMessage('Corperation ID: '.$id.' Updated');
                $restServer->setStatus(203);
            }
            else
            {
                throw new Exception('Corperation ID: '.$id.' Not Found');
            }
           
            
        }  
        
        if ( 'DELETE' === $verb)
        {
            if (NULL === $id)
            {
                throw new Exception('Corperation ID: '.$id.' Not Found');
            }
            elseif($resourceData->delete($id))
            {
                $restServer->setMessage('Corperation ID: '.$id.' Deleted');
                $restServer->setStatus(204);
            }
        }
    }
    else 
    {
        throw new MissingResourceException($resource . ' Resource Not Found');
    }

} 

catch (InvalidArgumentException $iax) 
{
    $restServer->setStatus(400);
    $restServer->setErrors($iax->getMessage());
} 
catch (Exception $ex) 
{    
    $restServer->setStatus(500);
    $restServer->setErrors($ex->getMessage());   
}
catch (MissingResourceException $mrx)
{
    $restServer->setStatus(404);
    $restServer->setErrors($mrx->getMessage());
}


$restServer->outputReponse();
