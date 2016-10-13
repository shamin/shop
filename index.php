<?php
//include_once "controllers/helpers.php";
include_once 'controllers/templates.php';

//$helper = new helpers();
render("header");
render("sidenav");
?> 

<div class="main-body">
    <div class="container">
        <h2 class="dashboard-header">Welcome</h2>
    </div>
</div>

<?php render("footer") ?>     