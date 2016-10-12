<?php

include_once "controllers/helpers.php";
$helper = new helpers();

$id = $_POST['id'];
$price = $_POST['price'];

$helper->newprice($id, $price);