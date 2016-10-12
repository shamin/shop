<?php

include_once "controllers/helpers.php";
$helper = new helpers();

$id = $_POST['id'];
$stock = $_POST['stock'];

$helper->newstock($id, $stock);