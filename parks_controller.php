<?php

require_once "parks_bootstrap.php";

// Pagination control & calculation
$parksPerPage = 5; // fix this ???
$stmt = $dbc->prepare('SELECT COUNT(*) FROM national_parks');
$stmt->execute();
$totalParks = $stmt->fetchColumn();
$lastPage = ceil($totalParks / $parksPerPage);


// Default page value
if (Input::has('page')) {
    $page = Input::get('page');
} else {
    $page = 1;
}

// Page # control
$page = intval($page);

if ($page > $lastPage) {
    $page = $lastPage;
}

if ($page < 1) {
    $page = 1;
}

// Change $_GET with button click
$pageUp = $page + 1;
$pageDown = $page - 1;


// Add & remove classes from buttons based on page location
$prev = 'btn btn-lg';
$next = 'btn btn-lg';

if (!Input::has('page') || $page == 1) {
    $prev = 'disabled invisible';
}

if ($page == $lastPage) {
    $next = 'disabled invisible';
}