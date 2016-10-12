<?php
include_once "controllers/helpers.php";
include_once 'controllers/templates.php';

$helper = new helpers();
render("header");
render("sidenav");
$billno = $_GET["billno"];
$datas = $helper->getbill($billno);
?> 
<div class="main-body">
    <div class="main-body-header">
        <h1><?php echo 'Bill No : '.$billno ; ?></h1>
    </div>
    <section id="newbill">     
    <div class="download">
            <button class="newbtn" ><a href="./bill?billno=<?php echo $billno ; ?>">Download Bill</a></button>
    </div>
        <div class="table">
            <table id="item-table">
                <thead>
                    <tr>
                        <th>Item Name</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Total</th>
                    </tr>
                </thead>
                <tbody>                       
                    <?php foreach ($datas as $data): ?>
                        <tr>
                            <td><?php echo $data['name']?></td>
                            <td><?php echo $data["price"]?></td>
                            <td><?php echo $data["qty"]?></td>
                            <td><?php echo $data["qty"]*$data["price"]?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </section>
</div>

<?php render("footer") ?>     