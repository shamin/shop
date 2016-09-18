<?php

include_once "controllers/helpers.php";
$helper = new helpers();

$searchTerm = $_POST['term'];
$no = $_POST['no'];
$return = $helper->search($searchTerm);
for ($index = 0; $index < count($return); $index++) {
    echo '<a class="row'.$no.'" data-id='.$return[$index]["id"].'  href="javascript:;">'.$return[$index]["name"].'</a><hr>';
}