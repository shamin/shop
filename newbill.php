<?php
include_once "controllers/helpers.php";
include_once 'controllers/templates.php';

$helper = new helpers();
render("header");
render("sidenav");
?>
<div class="main-body">
    <div class="main-body-header">
        <h1>New Bill Bill No : <span id="billno"><?php echo $helper->billno(); ?></span></h1>
    </div>
    <section id="newbill">
        <div class="button">
            <button id="addrow" class ="newbtn" type="button"><a>+ Add New</a></button>
            <button id="save" class ="savebtn" type="button"><a href="#">Save</a></button>
        </div>
        <div class="table">
            <table id="item-table">
                <thead>
                    <tr>
                        <th>Sl.No</th>
                        <th>Item Name</th>
                        <th>Unit Price</th>
                        <th>Quantity</th>
                        <th>Total</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="item-row">
                        <td><span class="id">1</span></td>
                        <td><input class="name" type="text" placeholder="Name" required></td>
                        <td><span class="cost">0</span></td>
                        <td><input class="qty" type="number" placeholder="0" required></td>
                        <td><span class="price">1</span></td>
                        <td><a class="delete" href="javascript:;" title="Remove row">X</a></td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="search">
            <ul id="results">
               <!-- <li><a href="#">Hello</a></li>
                <li><a href="#">Hello</a></li>
                <li><a href="#">Hello</a></li>
                <li><a href="#">Hello</a></li> -->
            </ul>
        </div>
    </section>
</div>
<script src="scripts/jquery-3.1.0.min.js" type="text/javascript"></script>
<script src="scripts/newbill.js" type="text/javascript"></script>
<?php render("footer") ?>  
