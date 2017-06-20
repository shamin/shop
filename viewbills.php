<?php
include_once "controllers/helpers.php";
include_once 'controllers/templates.php';

$helper = new helpers();
render("header");
$datas = $helper->getbills();
?> 
<section id="viewbill">
  <div class="container">
    <div class="row">
      <div class="col-md-12 main-head">
        <h1 class="text-center">View Bill</h1>
      </div>
    </div>
    <table class="table table-hover">
     <thead>
       <tr>
         <th>Bill No</th>
         <th>Date</th>
       </tr>
     </thead>
     <tbody>
       <tbody>                       
            <?php foreach ($datas as $data): ?>
                <tr>
                    <td><a href="viewbill.php?billno=<?php echo $data['BillNo']?>"><?php echo $data['BillNo']?></a></td>
                    <td><?php $date = strtotime($data['date']); echo date('d-F-Y',$date); ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
     </tbody>
   </table>
 </div>
</section>


<?php render("footer") ?>     