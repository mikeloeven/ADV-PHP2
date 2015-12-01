<?php

include_once './bootstrap.php';

$restServer = new RestServer();

try {
    
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
    
    
    
    
    if ( 'address' === $resource ) {
        
        $resourceData = new CorpsResource();
        
        if ( 'GET' === $verb ) {
            
            if ( NULL === $id ) {
                
                $restServer->setData($resourceData->getAll());                           
                
            } else {
                
                $restServer->setData($resourceData->get($id));
                
            }            
            
        }
                
        if ( 'POST' === $verb ) {
            

            if ($resourceData->post($serverData)) {
                $restServer->setMessage('Corperation Added');
                $restServer->setStatus(201);
            } else {
                throw new Exception('Corperation Not Added');
            }
        
        }
        
        
        if ( 'PUT' === $verb ) {
            
            if ( NULL === $id   ) {
                throw new InvalidArgumentException('Address ID ' . $id . ' was not found');
            }
            
        }
        
    } 
    
    elseif('corps' === $resource)
    {
        $resourceData = new CorpsResource();
        if ( 'GET' === $verb ) 
        {
            if ( NULL === $id ) {
                
                $restServer->setData($resourceData->getAll());                           
                
            } else {
                
                $restServer->setData($resourceData->get($id));
                
            }   
        }
        
        if ( 'POST' === $verb ) 
        {
            if ($resourceData->post($serverData)) {
                $restServer->setMessage('Corp Added');
                $restServer->setStatus(201);
            } else {
                throw new Exception('Corp Not Added');
            }
        }
        
        if ( 'PUT' === $verb ) 
        {
            if ( NULL === $id ) {
                throw new InvalidArgumentException('Address ID ' . $id . ' was not found');
            }
        }
        
        
    }
    
    else 
    {
        throw new InvalidArgumentException($resource . ' Resource Not Found');
        //$response['errors'] = 'Resource Not Found';
        //$status = 404;
    }
}
    
    
catch (InvalidArgumentException $ex) 
{
    $restServer->setStatus(400);
    $restServer->setErrors($ex->getMessage());
} 
catch (Exception $ex) 
{    
    $restServer->setStatus(500);
    $restServer->setErrors($ex->getMessage());   
}


$restServer->outputReponse();