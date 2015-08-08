<?php

session_start();
$sessionId = session_id();

require_once "Input.php";
require_once "parks_config.php";
require_once "db_connect.php";
require_once "parks_controller.php";
require_once "parks_post.php";
require_once "parks_order.php";