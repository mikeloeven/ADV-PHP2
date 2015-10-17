<?php

/**
 * A method to check if a Post request has been made.
 *    
 * @return boolean
 */
function isPostRequest() {
    return ( filter_input(INPUT_SERVER, 'REQUEST_METHOD') === 'POST' );
}

function addAddress($addr1, $addr2, $city, $state, $zip ) {
    $db = dbconnect();
    $stmt = $db->prepare("INSERT INTO address SET addr1 = :addr1, addr2 = :addr2, city = :city, state = :state, zip = :zip");
    $binds = array(
        ":addr1" => $addr1,
        ":addr2" => $addr2,
        ":city" => $city,
        ":state" => $state,
        ":zip" => $zip,
    );
    if ($stmt->execute($binds) && $stmt->rowCount() > 0) {
        return true;
    }
    
    return false;
}

function getAllAddress() {
    
    $db = dbconnect();
    $stmt = $db->prepare("SELECT * FROM address");
    
    $results = array();
    if ($stmt->execute() && $stmt->rowCount() > 0) {
       $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    
    return $results;
}

