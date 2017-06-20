<?php
include_once "controllers/helpers.php";
include_once 'controllers/templates.php';

$helper = new helpers();
render("header");
$billno = $_GET["billno"];
$datas = $helper->getbill($billno);
?> 
<section id="viewbill">
  <div class="container">
    <div class="row">
      <div class="col-md-12 main-head">
        <h1 class="text-center">View Bill</h1>
      </div>
    </div>
     <h3><?php echo 'Bill No : '.$billno ; ?></h3>
     <button type="button" class="btn btn-default" ><a href="./bill?billno=<?php echo $billno ; ?>">Download Bill</a></button>
    <table class="table table-hover" id="item-table">
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

<?php render("footer") ?>     