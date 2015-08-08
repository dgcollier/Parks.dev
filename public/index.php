<?php 
    require_once "../parks_bootstrap.php";
?>

<html>
<head>
    <title>National Parks</title>
    <link rel="stylesheet" type="text/css" href="/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="/css/national_parks.css">
</head>
<body>
    <div class="body">

        <h1 id="natParks">National Parks</h1>

        <!-- Table to Display National Parks -->
        <table class="table">
            <tr class="active">
                <th>Name</th>
                <th>Location</th>
                <th>Established</th>
                <th>Acres</th>
                <th>Description</th>
            </tr>

            <? foreach ($parks as $park): ?>
            <tr class="success">
                <td><strong><?= $park['name'] ?></strong></td>
                <td><?= $park['location'] ?></td>

                <td><? $date = DateTime::createFromFormat('Y-m-d', $park['date_established']); echo $date->format('M j, Y'); ?></td>

                <td><?= number_format(ceil($park['area_in_acres'])) ?></td>
                <td><?= $park['description'] ?></td>
            </tr>
            <? endforeach; ?>
        </table>

        <!-- Pagination -->
        <div id="paginators">
            <a id="prev" class="pager" href="?page=<?= $pageDown ?>&order=<?= $orderBy ?>">
                <!-- &order=<?= $orderBy ?> -->
                <button class="<?= $prev ?> btn btn-success">Prev.</button>
            </a>
            <a id="next" class="pager" href="?page=<?= $pageUp ?>&order=<?= $orderBy ?>">
                <!-- &order=<?= $orderBy ?> -->
                <button class="<?= $next ?> btn btn-success">Next</button>
            </a>
        </div>

        <!-- Re-order Page by DB Column Names -->
        <div id="orders">
            <h3>Re-order by:</h3>
            <a href="?page=<?= $page ?>&order=name">Name</a>
            <a href="?page=<?= $page ?>&order=location">Location</a>
            <a href="?page=<?= $page ?>&order=date_established">Date Est.</a>
            <a href="?page=<?= $page ?>&order=area_in_acres">Area</a>
        </div>

        <!-- Error Message Printout -->
        <div id="errors">
            <?php foreach ($errors as $error) : ?>
                <h3 id="errorMessages"><?= $error; ?></h3>
            <?php endforeach; ?>
        </div>

        <!-- Form to Add Park to Database -->
        <form id="addPark" class="form-horizontal" method="POST">
            <div id="parkForm" class="form-group">
                <h2>Add a Park:</h2>
                <div><input type="text"   id="nameInput"       class="input"     name="nameInput"     placeholder="Park Name" autofocus></div>
                <div><input type="text"   id="locationInput"   class="input"     name="locationInput" placeholder="Location"></div>
                <div><input type="text"   id="dateInput"       class="input"     name="dateInput"     placeholder="Date ('YYYY-MM-DD')"></div>
                <div><input type="text"   id="areaInput"       class="input"     name="areaInput"     placeholder="Area (in acres)"></div>
                
                <textarea id="descrInput" class="input form-control" name="descrInput" placeholder="Description" rows="3"></textarea>

                <button id="add" type="submit" class="btn btn-md btn-success">Add</button>
            </div>
        </form>

        <!-- <div>
            <h4>Results per page:</h4>
            <form type="POST">
                <select>
                    <option name="show" value="1">1</option>
                    <option name="show" value="2">2</option>
                    <option name="show" value="4">4</option>
                    <option name="show" value="5">5</option>
                    <option name="show" value="10">10</option>
                </select>
                <input type="hidden" value="?page=<?= $page ?>&order=<?= $orderBy ?>">
            </form>
        </div> -->
    </div>
</body>
</html>