<?php
include_once "controllers/helpers.php";
include_once 'controllers/templates.php';

$helper = new helpers();
if (isset($_POST["name"]) && isset($_POST["stock"]) && isset($_POST["price"])) {
    $return = $helper->newitem($_POST["name"], $_POST["stock"], $_POST["price"]);
}
render("header");
?> 
<section id="newitem">
    <div class="container">
      <div class="row">
        <div class="col-md-12 main-head">
          <h1 class="text-center">Add New Item</h1>
        </div>
      </div>
      <form class="form" action="#" method="post">
            <div class="form-group">
              <label for="name">Item Name:</label>
              <input type="text" class="form-control" id="name" name="name">
            </div>
            <div class="form-group">
              <label for="stock">Item Stock:</label>
              <input type="text" class="form-control" id="stock" name="stock">
            </div>
            <div class="form-group">
              <label for="stock">Item Price:</label>
              <input type="text" class="form-control" id="price" name="price">
            </div>
            <button type="submit" class="btn btn-default">Submit</button>
      </form>
    </div>
</section>
<?php render("footer") ?>
<?php
    if (isset($return)) {
        if ($return) {
            echo '<script> alert("Item Added Succesfully");</script>';
        } else {
            echo '<script> alert("Cant Add Item");</script>';
        }
    }
?>     