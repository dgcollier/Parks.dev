<?php

    require_once 'parks_config.php';
    require_once 'db_connect.php';

    echo $dbc->getAttribute(PDO::ATTR_CONNECTION_STATUS) . PHP_EOL;

    $dropIf = "DROP TABLE IF EXISTS national_parks";

    $dbc->exec($dropIf);

    $addTable = 'CREATE TABLE national_parks (
        id INT UNSIGNED NOT NULL AUTO_INCREMENT,
        name VARCHAR(20) NOT NULL,
        location VARCHAR(30) NOT NULL,
        date_established DATE NOT NULL,
        area_in_acres DOUBLE(10,2) NOT NULL,
        description TEXT,
        PRIMARY KEY (id),
        UNIQUE KEY "park_state_unq" ("name","location"))';

    $dbc->exec($addTable);