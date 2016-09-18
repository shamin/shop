<?php
include_once "controllers/helpers.php";
include_once 'controllers/templates.php';

$helper = new helpers();
if (isset($_POST["name"]) && isset($_POST["stock"]) && isset($_POST["price"])) {
    $return = $helper->newitem($_POST["name"], $_POST["stock"], $_POST["price"]);
}
render("header");
render("topnav", array('pagetitle' => 'New Bill'));
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
        <div class="col s8">
            <table class="bordered">
                <thead>
                    <tr>
                        <th data-field="id">Sl.No</th>
                        <th data-field="name">Item Name</th>
                        <th data-field="price">Unit Price</th>
                        <th data-field="quantity">Quantity</th>
                        <th data-field="fprice">Total</th>
                        <th></th>
                    </tr>
                </thead>

                <tbody>
                    <tr class="item-row">
                        <td><span class="id">1</span></td>
                        <td><input class="name" type="text" placeholder="Name"></td>
                        <td><span class="cost">5</span></td>
                        <td><input class="qty" type="number" placeholder="0"></td>
                        <td><span class="price">0</span></td>
                        <td><a class="delete" href="javascript:;" title="Remove row">X</a></td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="col s4">
            <ul id="results">
            </ul>
        </div>
    </div>
    <div class="row">
        <a id="addrow" class="btn">Add Item</a>
    </div>
    <div class="row">
        <a id="addrow" class="btn-large">Save</a>
    </div>

</main>
<?php render("footer") ?>      