<?php
//include_once "controllers/helpers.php";
include_once 'controllers/templates.php';

//$helper = new helpers();
render("header");
?> 

<section id="overview">
  <div class="container">
    <div class="row icon-holder text-center">
      <div class="col-md-4 main_icons">
        <span class="glyphicon glyphicon-home" aria-hidden="true"></span>
        <h3>Dashboard</h3>
      </div>
      <div class="col-md-4 main_icons">
        <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
        <h3>Add</h3>
      </div>
      <div class="col-md-4 main_icons">
        <span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span>
        <h3>View</h3>
      </div>
    </div>
    <div class="row icon-holder text-center">
      <div class="col-md-4 main_icons">
        <span class="glyphicon glyphicon-minus" aria-hidden="true"></span>
        <h3>Delete</h3>
      </div>
      <div class="col-md-4 main_icons">
        <span class="glyphicon glyphicon-save" aria-hidden="true"></span>
        <h3>Download</h3>
      </div>
      <div class="col-md-4 main_icons">
        <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
        <h3>Edit</h3>
      </div>
    </div>
  </div>
</section>

<?php render("footer") ?>     