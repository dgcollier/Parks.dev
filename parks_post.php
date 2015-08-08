<?php

$errors = [];

if (!empty($_POST)) {
    $stmt = $dbc->prepare(
        "INSERT INTO national_parks (name, location, date_established, area_in_acres, description)
        VALUES (:name, :location, :dateEst, :area, :descr)"
    );

    try {
        $nameInput = (Input::has('nameInput') ? Input::getString('nameInput') : null);
        $stmt->bindValue(':name', $nameInput, PDO::PARAM_STR);
    } catch (Exception $e) {
        $errors[] = 'Error on name field: ' . $e->getMessage();
    }
    
    try {
        $locationInput = (Input::has('locationInput') ? Input::getString('locationInput') : null);
        $stmt->bindValue(':location', $locationInput, PDO::PARAM_STR);
    } catch (Exception $e) {
        $errors[] = 'Error on location field: ' . $e->getMessage();
    }        

    try {
        $dateInput = (Input::has('dateInput') ? Input::getString('dateInput') : null);
        $stmt->bindValue(':dateEst', $dateInput, PDO::PARAM_STR);
    } catch (Exception $e) {
        $errors[] = 'Error on date field: ' . $e->getMessage();
    }

    try {
        $areaInput = (Input::has('areaInput') ? Input::getNumber('areaInput') : null);
        $stmt->bindValue(':area', $areaInput, PDO::PARAM_STR);
    } catch (Exception $e) {
        $errors[] = 'Error on area field: ' . $e->getMessage();
    } 

    try {
        $descrInput = (Input::has('descrInput') ? Input::getString('descrInput') : null);
        $stmt->bindValue(':descr', $descrInput, PDO::PARAM_STR);
    }  catch (Exception $e) {
        $errors[] = 'Error on description field: ' . $e->getMessage();
    } 

    if(empty($errors)) {
        $stmt->execute();
    }
}