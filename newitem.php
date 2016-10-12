<?php
include_once "controllers/helpers.php";
include_once 'controllers/templates.php';

$helper = new helpers();
if (isset($_POST["name"]) && isset($_POST["stock"]) && isset($_POST["price"])) {
    $return = $helper->newitem($_POST["name"], $_POST["stock"], $_POST["price"]);
}
render("header");
render("sidenav");
?> 
<div class="main-body">
    <div class="main-body-header">
        <h1>Add new item</h1>
    </div>
    <section id="newitem" class="container">
        <form class="inputform" action="#" method="post">
            <input type="text" name="name" placeholder="Item Name" required><br>
            <input type="number" name="stock" placeholder="Stock" required><br>
            <input type="number" name="price" step="0.01" placeholder="Price" required><br>
            <button class="newbtn" type="submit">Add</button>
        </form>
    </section>
</div>
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