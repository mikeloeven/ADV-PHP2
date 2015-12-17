<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class CorpsResource implements IRestModel
{
    
    private $db;
    
    function __construct()
    {
        
        $util = new Util();
        $dbo = new DB($util->getDBConfig());
        $this->setDB($dbo->getDB());
        
    }
    
    private function getDB()
    {
        return $this->db;
    }
    
    private function setDB($db)
    {
        $this->db = $db;
    }
    
    
    
    public function delete($id) 
    {
        $stmt = $this->getDB()->prepare('DELETE FROM corps WHERE id = :id');
        $binds = array(':id' => $id);
        
        if ($stmt->execute($binds) && $stmt->rowCount() > 0)
        {
            return true;
        }
        else
        {
            return false;
        }
        
    }

    public function get($id) 
    {
        $stmt = $this->getDB()->prepare('SELECT * FROM corps WHERE id = :id');
        $binds = array(':id' => $id);
        $results = array();
        
        if ($stmt->execute($binds) && $stmt->rowCount() > 0)
        {
            $results = $stmt->fetch(PDO::FETCH_ASSOC);
        }
        
        return $results;
        
    }

    public function getAll() 
    {
        $stmt = $this->getDB()->prepare('SELECT * FROM corps');
        $results = array();
        
        if ($stmt->execute() && $stmt->rowCount() > 0)
        {
            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
        return $results;
    }

    public function post($serverData) 
    {
        $stmt = $this->getDB()->prepare('INSERT INTO corps SET corp = :corp, incorp_dt = :incorp_dt, email = :email, owner = :owner, phone = :phone, location = :location');
        $binds = array
        (
            ':corp' => $serverData['corp'],
            ':incorp_dt' => $serverData['incorp_dt'],
            ':email' => $serverData['email'],
            ':owner' => $serverData['owner'],
            ':phone' => $serverData['phone'],
            'location' => $serverData['location']
        );
        
        if ($stmt->execute($binds) && $stmt->rowCount() > 0)
        {
            return true;
        }
        else
        {
            return false;
        }
    }

    public function put($id, $serverData)
    {
        print_r($serverData);
        $stmt = $this->getDB()->prepare('UPDATE corps SET corp = :corp, incorp_dt = :incorp_dt, email = :email, owner = :owner, phone = :phone, location = :location WHERE id = :id');
        $binds = array
        (
            ':id' => $id,
            ':corp' => $serverData['corp'],
            ':incorp_dt' => $serverData['incorp_dt'],
            ':email' => $serverData['email'],
            ':owner' => $serverData['owner'],
            ':phone' => $serverData['phone'],
            'location' => $serverData['location']
        );
        
        if ($stmt->execute($binds) && $stmt->rowCount() > 0)
        {
            return true;
        }
        else
        {
            return false;
        }
    }

}