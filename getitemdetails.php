<?php

include_once "controllers/helpers.php";
$helper = new helpers();

$searchId = $_POST['id'];
$slno = $_POST['slno'];
$return = $helper->searchid($searchId);
$return = $return[0];


//$data = '<td><span data-id='.$return["id"].' class="id">'.$slno.'</span></td><td><input class="name" type="text" placeholder="Name" value="'.$return["name"].'" required></td><td><span class="cost">'.$return["price"].'</span></td><td><input class="qty" type="number" placeholder="0"></td><td><span class="price">0</span></td><td><a class="delete" href="javascript:;" title="Remove row">X</a></td>';
$data = '<td><span data-id='.$return["id"].' class="id">'.$slno.'</span></td><td><input class="form-control name" type="text"  value="'.$return["name"].'" required></td><td><span class="cost">'.$return["price"].'</span></td><td><input class="form-control qty" type="number" required></td><td><span class="price">0</span></td><td><a class="delete" href="javascript:;" title="Remove row">X</a></td>';

echo $data;