<?php

/**
 * A method to check if a Post request has been made.
 *    
 * @return boolean
 */
function isPostRequest() {
    return ( filter_input(INPUT_SERVER, 'REQUEST_METHOD') === 'POST' );
}

/**
 * A method to check if a Get request has been made.
 *    
 * @return boolean
 */
function isGetRequest() {
    return ( filter_input(INPUT_SERVER, 'REQUEST_METHOD') === 'GET' );
}

//function to search table
function searchcorps($searchcolumn, $search) {
    $db = getDatabase();

    $stmt = $db->prepare("SELECT * FROM corps WHERE $searchcolumn LIKE :search");

    $search = '%' . $search . '%';
    $binds = array(
        ":search" => $search
    );
    $results = array();
    if ($stmt->execute($binds) && $stmt->rowCount() > 0) {
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    echo $stmt->rowCount() . " rows found";
    return $results;
}

//function to sort table
function sortcorps($column, $sortvalue){
    $db = getDatabase();
    
    $stmt = $db->prepare("SELECT * FROM corps ORDER BY $column $sortvalue");
    
    $results = array();
    if ($stmt->execute() && $stmt->rowCount() > 0) {
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    return $results;
}