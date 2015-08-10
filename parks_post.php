<?php

$errors = [];

if (!empty($_POST)) {
    $stmt = $dbc->prepare(
        "INSERT INTO national_parks (name, location, date_established, area_in_acres, description)
        VALUES (:name, :location, :dateEst, :area, :descr)"
    );

    try {
        $nameInput = (Input::has('nameInput') ? Input::getString('nameInput', 4, 30) : null);
        $stmt->bindValue(':name', $nameInput, PDO::PARAM_STR);
    } catch (OutOfRangeException $e) {
        $errors[] = 'Error on name field: ' . $e->getMessage();
    } catch (InvalidArgumentException $e) {
        $errors[] = 'Error on name field: ' . $e->getMessage();
    } catch (DomainException $e) {
        $errors[] = 'Error on name field: ' . $e->getMessage();
    } catch (LengthException $e) {
        $errors[] = 'Error on name field: ' . $e->getMessage();
    } catch (Exception $e) {
        $errors[] = 'Error occurred: ' . $e->getMessage();
    } 
    
    try {
        $locationInput = (Input::has('locationInput') ? Input::getString('locationInput', 2, 2) : null);
        $stmt->bindValue(':location', $locationInput, PDO::PARAM_STR);
    } catch (OutOfRangeException $e) {
        $errors[] = 'Error on location field: ' . $e->getMessage();
    } catch (InvalidArgumentException $e) {
        $errors[] = 'Error on location field: ' . $e->getMessage();
    } catch (DomainException $e) {
        $errors[] = 'Error on location field: ' . $e->getMessage();
    } catch (LengthException $e) {
        $errors[] = 'Error on location field: ' . $e->getMessage();
    } catch (Exception $e) {
        $errors[] = 'Error occurred: ' . $e->getMessage();
    }       

    try {
        $dateInput = (Input::has('dateInput') ? Input::getString('dateInput', 10, 10) : null);
        $stmt->bindValue(':dateEst', $dateInput, PDO::PARAM_STR);
    } catch (OutOfRangeException $e) {
        $errors[] = 'Error on date field: ' . $e->getMessage();
    } catch (InvalidArgumentException $e) {
        $errors[] = 'Error on date field: ' . $e->getMessage();
    } catch (DomainException $e) {
        $errors[] = 'Error on date field: ' . $e->getMessage();
    } catch (LengthException $e) {
        $errors[] = 'Error on date field: ' . $e->getMessage();
    } catch (Exception $e) {
        $errors[] = 'Error occurred: ' . $e->getMessage();
    } 

    try {
        $areaInput = (Input::has('areaInput') ? Input::getNumber('areaInput', 9000, 9000000) : null);
        $stmt->bindValue(':area', $areaInput, PDO::PARAM_STR);
    } catch (OutOfRangeException $e) {
        $errors[] = 'Error on area field: ' . $e->getMessage();
    } catch (InvalidArgumentException $e) {
        $errors[] = 'Error on area field: ' . $e->getMessage();
    } catch (DomainException $e) {
        $errors[] = 'Error on area field: ' . $e->getMessage();
    } catch (RangeException $e) {
        $errors[] = 'Error on area field: ' . $e->getMessage();
    } catch (Exception $e) {
        $errors[] = 'Error occurred: ' . $e->getMessage();
    } 

    try {
        $descrInput = (Input::has('descrInput') ? Input::getString('descrInput', 20, 500) : null);
        $stmt->bindValue(':descr', $descrInput, PDO::PARAM_STR);
    } catch (OutOfRangeException $e) {
        $errors[] = 'Error on description field: ' . $e->getMessage();
    } catch (InvalidArgumentException $e) {
        $errors[] = 'Error on description field: ' . $e->getMessage();
    } catch (DomainException $e) {
        $errors[] = 'Error on description field: ' . $e->getMessage();
    } catch (LengthException $e) {
        $errors[] = 'Error on description field: ' . $e->getMessage();
    } catch (Exception $e) {
        $errors[] = 'Error occurred: ' . $e->getMessage();
    } 

    if(empty($errors)) {
        $stmt->execute();
    }
}