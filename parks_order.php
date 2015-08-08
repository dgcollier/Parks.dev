<?php

require_once "parks_bootstrap.php";

// Prepare DB query
$order = (Input::has('order') ? Input::get('order') : '');
$orderBy = ($order == 'name' || 
            $order == 'location' || 
            $order == 'date_established' || 
            $order == 'area_in_acres'  
                ? Input::get('order') 
                : 'id'
);

$stmt = $dbc->prepare(
    'SELECT name, location, date_established, area_in_acres, description 
    FROM national_parks
    ORDER BY ' . $orderBy .
    ' LIMIT :myLimit OFFSET :myOffset'
);

// -- Limit & Offset (Order)
$stmt->bindValue(':myOffset', ($page - 1) * $parksPerPage, PDO::PARAM_INT);
$stmt->bindValue(':myLimit', $parksPerPage, PDO::PARAM_INT);
// $stmt->bindValue(':myOrder', $orderBy, PDO::PARAM_STR);


// Execute DB query, store array in $parks
$stmt->execute();
$parks = $stmt->fetchAll(PDO::FETCH_ASSOC);
// var_dump($parks);