<?php
//include_once "controllers/helpers.php";
include_once 'controllers/templates.php';

//$helper = new helpers();
render("header");
?> 

<section id="overview">
  <div class="container">
    <div class="row icon-holder text-center">
	<a href="index.php">
      <div class="col-md-4 main_icons">
        <span class="glyphicon glyphicon-home" aria-hidden="true"></span>
        <h3>Dashboard</h3>
      </div>
	</a>
	<a href="newitem.php">
      <div class="col-md-4 main_icons">
        <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
        <h3>Add New Item</h3>
      </div>
	</a>
	<a href="viewitems.php">
      <div class="col-md-4 main_icons">
        <span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span>
        <h3>View All Items</h3>
      </div>
	</a>
    </div>
    <div class="row icon-holder text-center">
	<a href="newbill.php">
      <div class="col-md-4 main_icons">
        <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
        <h3>New Bill</h3>
      </div>
	</a>
	<a href="viewbills.php">
      <div class="col-md-4 main_icons">
        <span class="glyphicon glyphicon-save" aria-hidden="true"></span>
        <h3>View All Bills</h3>
      </div>
	</a>
	<!--<a href="index.php">
      <div class="col-md-4 main_icons">
        <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
        <h3>Edit Items</h3>
      </div>
	</a>-->
    </div>
  </div>
</section>

<?php render("footer") ?>     