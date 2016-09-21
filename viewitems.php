<?php
include_once "controllers/helpers.php";
include_once 'controllers/templates.php';

$helper = new helpers();
render("header");
render("topnav", array('pagetitle' => 'View Items'));
render("sidenav");
$datas = $helper->getitems();
?> 
<main>
    <div class="row">
        <div class="col s10">
            <table class="bordered">
                <thead>
                    <tr>
                        <th data-field="id">Sl.No</th>
                        <th data-field="name">Name</th>
                        <th data-field="price">Stock</th>
                        <th data-field="quantity">Price</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($datas as $data): ?>
                        <tr class="item-row">
                            <td><span class="id"><?php echo $data['id']?></span></td>
                            <td><span class="name"><?php echo $data["name"]?></span></td>
                            <td><span class="stock"><?php echo $data["fstock"]?></span></td>
                            <td><span class="price"><?php echo $data["price"]?></span></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</main>
<?php render("footer") ?>      