<?php

include_once "controllers/helpers.php";
$helper = new helpers();

return $helper->savebillitem($_POST["billno"], $_POST["productid"], $_POST["qty"]);
