<?php
include_once "controllers/helpers.php";
include_once 'controllers/templates.php';

$helper = new helpers();
render("header");
?>
<section id="newbill">
  <div class="container">
    <div class="row">
      <div class="col-md-12 main-head">
        <h1 class="text-center">New Bill</h1>
      </div>
    </div>
    <h5>New Bill No : <span id="billno"><?php echo $helper->billno(); ?></span></h5>
    <table class="table table-hover" id="item-table">
     <thead>
       <tr>
         <th>Sl No</th>
         <th>Item Name</th>
         <th>Unit</th>
         <th>Quantity</th>
         <th>Total</th>
       </tr>
     </thead>
       <tr class="item-row">
         <td><span class="id">1</span></td>
         <td><input type="text" class="form-control name" ></td>
         <td><span class="cost">0</span></td>
         <td><input type="text" class="form-control qty" ></td>
         <td><span class="price">0</span></td>
         <td><a class="delete" href="javascript:;" title="Remove row">X</a></td>
       </tr>
     </tbody>
   </table>
   <div class="row">
     <div class="col-md-offset-6 text-center">
       <button id="addrow" type="button" class="btn btn-default" name="button">Add New</button>
       <button id="save" type="button" class="btn btn-default" name="button">Save</button>
     </div>
   </div>
 </div>
 <div class="search">
    <ul id="results">

    </ul>
</div>
</section>
<script src="scripts/jquery-3.1.0.min.js" type="text/javascript"></script>
<script src="scripts/newbill.js" type="text/javascript"></script>
<?php render("footer"   ) ?>  
