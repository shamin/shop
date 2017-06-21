<?php
include_once "controllers/helpers.php";
include_once 'controllers/templates.php';

$helper = new helpers();
render("header");
$datas = $helper->getitems();
?> 

<section id="viewitem">
  <div class="container">
    <div class="row">
      <div class="col-md-12 main-head">
        <h3 class="text-center">Items List</h3>
      </div>
    </div>
    <button type="button" class="btn btn-default" ><a onclick="window.print()">Print Bill</a></button>
    <table class="table table-hover">
     <thead>
       <tr>
         <th>Sl No</th>
         <th>Item Name</th>
         <th>Stock</th>
         <th>Price</th>
       </tr>
     </thead>
     <tbody>
       <tr>
        <?php foreach ($datas as $data): ?>
        <tr>
            <td><?php echo $data['id']?></td>
            <td><?php echo $data["name"]?></td>
            <td><?php echo $data["stock"]?></td>
            <td><?php echo $data["price"]?></td>
            <!--                            <td><a id="myBtn" href="edititem.php?id=<?php echo $data["id"]?>">Edit</a></td>-->
            <td><a data-id="<?php echo $data["id"]?>" class="priceBtn" >Edit Price</a></td>
            <td><a data-id="<?php echo $data["id"]?>" class="stockBtn" >Edit Stock</a></td>
        </tr>
        <?php endforeach; ?>
       </tr>

     </tbody>
   </table>
 </div>

 <div id="priceModal" class="modal" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Enter New Price</h4>
        </div>
        <div class="modal-body">
          <input type="text" class="form-control" name="price" value="" placeholder="Price">
        </div>
        <div class="modal-footer">
          <button id="updatePrice" type="button" class="btn btn-default" data-dismiss="modal">Update</button>
        </div>
      </div>

    </div>
  </div>

    <div id="stockModal" class="modal" role="dialog">
       <div class="modal-dialog">

         <!-- Modal content-->
         <div class="modal-content">
           <div class="modal-header">
             <button type="button" class="close" data-dismiss="modal">&times;</button>
             <h4 class="modal-title">Enter New Stock</h4>
           </div>
           <div class="modal-body">
             <input type="text" class="form-control" name="stock" value="" placeholder="Stock">
           </div>
           <div class="modal-footer">
             <button id="updateStock" type="button" class="btn btn-default" data-dismiss="modal">Update</button>
           </div>
         </div>

       </div>
     </div>
</section>

<script src="scripts/jquery-3.1.0.min.js" type="text/javascript"></script>
<script>
    var priceModal = document.getElementById('priceModal');
    var stockModal = document.getElementById('stockModal');
    var span = document.getElementsByClassName("close")[0];
    span.onclick = function() {
        priceModal.style.display = "none";
        stockModal.style.display = "none";
    }
    window.onclick = function(event) {
        if (event.target === priceModal) {
            priceModal.style.display = "none";
        }
        if (event.target === stockModal) {
            stockModal.style.display = "none";
        }
    }
    
    var id = 0;
    
    $(document.body).on('click', '.priceBtn', function () {
        priceModal.style.display = "block";
        id = $(this).attr('data-id');
    });
    
    $(document.body).on('click', '.stockBtn', function () {
        stockModal.style.display = "block";
        id = $(this).attr('data-id');     
    });
    
    $('#updateStock').click(function () {
        var stock = $("input[name=stock]").val();
        var formvalues = "&id=" + id + "&stock=" + stock;
        $.ajax({
            type: 'POST',
            url: 'updatestock.php',
            data: formvalues,
            beforeSend: function (html) {
            },
            success: function (html) {
                window.location.href='./viewitems.php';
            }
        });
    });
    
    $('#updatePrice').click(function () {
        var price = $("input[name=price]").val();
        var formvalues = "&id=" + id + "&price=" + price;
        $.ajax({
            type: 'POST',
            url: 'updateprice.php',
            data: formvalues,
            beforeSend: function (html) {
            },
            success: function (html) {
                window.location.href='./viewitems.php';
            }
        });
    });
</script>   


<?php render("footer") ?>     