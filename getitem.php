<?php

include_once "controllers/helpers.php";
$helper = new helpers();

$searchTerm = $_POST['term'];
$return = $helper->search($searchTerm);
for ($index = 0; $index < count($return); $index++) {
    echo $return[$index]["name"]."<br>"; 
}