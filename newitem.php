<?php
include_once "controllers/helpers.php";
include_once 'controllers/templates.php';

$helper = new helpers();
if (isset($_POST["name"]) && isset($_POST["stock"]) && isset($_POST["price"])) {
    $return = $helper->newitem($_POST["name"], $_POST["stock"], $_POST["price"]);
}
render("header");
render("topnav", array('pagetitle' => 'Add New Item'));
render("sidenav");
?> 
<main>
    <?php
    if (isset($return)) {
        if ($return) {
            echo "Item Added Successfully";
        } else {
            echo "Cant add item";
        }
    }
    ?>
    <div class="row">
        <form class="col s12" action="#" method="post">
            <div class="row">
                <div class="input-field col s6">
                    <input id="name" type="text" class="validate" name="name">
                    <label for="last_name">Item Name</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s6">
                    <input id="stock" type="number" class="validate" name="stock">
                    <label for="stock">Stock</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s6">
                    <input id="price" type="number" step="0.01" class="validate" name="price">
                    <label for="price">Price</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s6">
                    <button class="btn waves-effect waves-light" type="submit">Save</button>
                </div>
            </div>
        </form>
    </div>

</main>
<?php render("footer") ?>      