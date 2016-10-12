<?php
include_once "controllers/helpers.php";
include_once 'controllers/templates.php';

$helper = new helpers();
render("header");
render("sidenav");
$datas = $helper->getitems();
?> 
<div class="main-body">
    <div class="main-body-header">
        <h1>Items</h1>
    </div>
    <section id="newbill">
        <div class="table">
            <table id="item-table">
                <thead>
                    <tr>
                        <th>Sl.No</th>
                        <th>Item Name</th>
                        <th>Stock</th>
                        <th>Price</th>
                    </tr>
                </thead>
                <tbody>                       
                        <?php foreach ($datas as $data): ?>
                        <tr>
                            <td><?php echo $data['id']?></td>
                            <td><?php echo $data["name"]?></td>
                            <td><?php echo $data["stock"]?></td>
                            <td><?php echo $data["price"]?></td>
<!--                            <td><a id="myBtn" href="edititem.php?id=<?php echo $data["id"]?>">Edit</a></td>-->
                            <td><a data-id="<?php echo $data["id"]?>" class="priceBtn" >Price</a></td>
                            <td><a data-id="<?php echo $data["id"]?>" class="stockBtn" >Stock</a></td>
                        </tr>
                        <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </section>
</div>
<div id="priceModal" class="modal">
  <div class="modal-content">
    <span class="close"></span>
    <h3 style="color:#fff;">Enter the new Price</h3>
    <div class="inputform" style="padding: 0;"> 
        <input type="number" name="price" step="0.01" placeholder="Price" style="width: 90%;" required><br>
        <button id="updatePrice" class="newbtn" style="width: 90%;" type="submit">Update</button>
    </div>
  </div>
</div>
<div id="stockModal" class="modal">
  <div class="modal-content">
    <span class="close"></span>
    <h3 style="color:#fff;">Enter the new Stock</h3>
    <div class="inputform" style="padding: 0;"> 
        <input type="number" name="stock" placeholder="Stock" style="width: 90%;" required><br>
        <button id="updateStock" class="newbtn" style="width: 90%;" type="submit">Update</button>
    </div>
  </div>
</div>
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