<?php

    require_once 'parks_config.php'; //configs for db
    require_once 'db_connect.php'; //db connection

    echo $dbc->getAttribute(PDO::ATTR_CONNECTION_STATUS) . PHP_EOL;

    $truncate = 'TRUNCATE national_parks';

    $dbc->exec($truncate);

    $parks = [
        ['name' => 'Acadia'             ,'location' => 'ME'  ,'date_established' => '1919-02-26' ,'area_in_acres' => 47389.67     ,'description' => 'Features tallest mountain on Atlantic coast of the U.S.'],
        ['name' => 'Arches'             ,'location' => 'UT'  ,'date_established' => '1988-10-31' ,'area_in_acres' => 9000.00      ,'description' => 'Features more than 2,000 natural sandstone arches.'],
        ['name' => 'Badlands'           ,'location' => 'SD'  ,'date_established' => '1978-11-10' ,'area_in_acres' => 242755.94    ,'description' => 'A collection of buttes, pinnacles, spires, and grass praries.'],
        ['name' => 'Big Bend'           ,'location' => 'TX'  ,'date_established' => '1944-06-12' ,'area_in_acres' => 801163.21    ,'description' => 'Named for the prominent bend in the Rio Grande river.'],
        ['name' => 'Carlsbad Caverns'   ,'location' => 'NM'  ,'date_established' => '1930-05-14' ,'area_in_acres' => 46766.45     ,'description' => 'Includes 117 caves, the longest of which is over 120 miles long.'],
        ['name' => 'Crater Lake'        ,'location' => 'OR'  ,'date_established' => '1902-05-22' ,'area_in_acres' => 183224.05    ,'description' => 'The deepest lake in the U.S. lies in the caldera of an ancient volcano.'],
        ['name' => 'Denali'             ,'location' => 'AL'  ,'date_established' => '1917-02-26' ,'area_in_acres' => 4740911.72   ,'description' => 'Centered around Mt. McKinley, the tallest in North America.'],
        ['name' => 'Everglades'         ,'location' => 'FL'  ,'date_established' => '1934-05-30' ,'area_in_acres' => 1508537.90   ,'description' => 'The largest subtropical wilderness in the United States.'],
        ['name' => 'Glacier'            ,'location' => 'MT'  ,'date_established' => '1910-05-11' ,'area_in_acres' => 1013572.41   ,'description' => 'The park hosts 26 glaciers and 130 named lakes.'],
        ['name' => 'Olympic'            ,'location' => 'WA'  ,'date_established' => '1938-06-29' ,'area_in_acres' => 922650.86    ,'description' => 'The Olympic Mountains overlook the Hoh and Quinault rainforests.']
    ];

    $stmt = $dbc->prepare('INSERT INTO national_parks (name, location, date_established, area_in_acres, description) VALUES (:name, :location, :estDate, :area, :descr)');

    foreach ($parks as $park) {
        $stmt->bindValue(':name', $park['name'], PDO::PARAM_STR);
        $stmt->bindValue(':location', $park['location'], PDO::PARAM_STR);
        $stmt->bindValue(':estDate', $park['date_established'], PDO::PARAM_STR);
        $stmt->bindValue(':area', $park['area_in_acres'], PDO::PARAM_STR);
        $stmt->bindValue(':descr', $park['description'], PDO::PARAM_STR);

        $stmt->execute();

        echo "Inserted ID: " . $dbc->lastInsertId() . PHP_EOL;
        
    }