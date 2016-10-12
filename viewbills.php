<?php
include_once "controllers/helpers.php";
include_once 'controllers/templates.php';

$helper = new helpers();
render("header");
render("sidenav");
$datas = $helper->getbills();
?> 
<div class="main-body">
    <div class="main-body-header">
        <h1>View Bills</h1>
    </div>
    <section id="newbill">
        <div class="table">
            <table id="item-table">
                <thead>
                    <tr>
                        <th>Bill No</th>
                        <th>Bill Date</th>
                    </tr>
                </thead>
                <tbody>                       
                    <?php foreach ($datas as $data): ?>
                        <tr>
                            <td><a href="viewbill.php?billno=<?php echo $data['BillNo']?>"><?php echo $data['BillNo']?></a></span></td>
                            <td><?php $date = strtotime($data['date']); echo date('d-F-Y',$date); ?></span></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </section>
</div>
<?php render("footer") ?>     