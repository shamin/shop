<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of helpers
 *
 * @author Apple
 */
include_once 'db.php';

class helpers extends Db {

    public function newitem($name, $stock, $price) {
        $id = $this->itemid();
        $sql = "INSERT INTO `item` (`id`, `name`) VALUES (NULL, '$name')";
        if ($this->query($sql)) {
            $this->newstock($id,$stock);
            $this->newprice($id,$price);
            return true;       
        } else {
            return false;
        }
    }
     public function getitems() {
        $sql = "SELECT * FROM `item` ORDER BY `id` ASC";
        $newdatas = array();
        $datas = $this->select($sql);
        foreach ($datas as $data){
            $date = date("Y-m-d"); 
            $data["stock"] = $this->gettotalstock($data["id"],$date);
            $data["price"] = $this->getlatestprice($data["id"],$date);   
            $newdatas[] = $data;
        }
        return $newdatas;
    }

    public function search($data) {
        $sql = "SELECT * FROM `item` WHERE (CONVERT(`name` USING utf8) LIKE '%$data%')";
        return $this->select($sql);
    }
    public function searchid($data) {
        $sql = "SELECT `id`,`name`,price.price FROM `item`,price WHERE `id` = $data AND item.id = price.productid";
        $newdatas = array();
        $datas = $this->select($sql);
        foreach ($datas as $data){
            $date = date("Y-m-d"); 
            $data["stock"] = $this->gettotalstock($data["id"],$date);
            $data["price"] = $this->getlatestprice($data["id"],$date);   
            $newdatas[] = $data;
        }
        return $newdatas;
    }
    public function billno() {
        $sql = "SHOW TABLE STATUS LIKE 'billno'";
        return $this->select($sql)[0]['Auto_increment'];
    }
    public function newbill() {
        $date = date("Y-m-d"); 
        $sql = "INSERT INTO `billno` (`BillNo`, `BillName`, `date`) VALUES (NULL, 'Bill', '$date')";
        return $this->query($sql);
    }
    public function savebillitem($billno,$productid,$qty) {
        $sql = "INSERT INTO `billitems` (`billno`, `productid`, `qty`) VALUES ('$billno', '$productid', '$qty');";
        return $this->query($sql);
    }
    public function getbills() {
        $sql = "SELECT * FROM `billno`";
        return $this->select($sql);
    }
    public function getbill($billno) {
        $sql = "SELECT item.id,item.name, billitems.qty,billno.date FROM billitems, item,billno WHERE item.id = billitems.productid AND billitems.billno = '$billno' AND billno.BillNo = billitems.billno";
        $newdatas = array();
        $datas = $this->select($sql);
        foreach ($datas as $data){
            $data["price"] = $this->getlatestprice($data["id"],$data["date"]);   
            $newdatas[] = $data;
        }
        return $newdatas;
    }
    public function newstock($id,$stock) {
        $date = date("Y-m-d"); 
        $sql = "INSERT INTO `stock`(`productid`, `stock`, `date`) VALUES ('$id', '$stock', '$date')";
        return $this->query($sql);
    }
    public function itemid() {
        $sql = "SHOW TABLE STATUS LIKE 'item'";
        return $this->select($sql)[0]['Auto_increment'];
    }
    public function newprice($id,$price) {
        $date = date("Y-m-d"); 
        $sql = "INSERT INTO `price` (`productid`, `price`, `date`) VALUES ('$id', '$price', '$date')";
        return $this->query($sql);
    }
    public function gettotalstock($id,$date)
    {    
        $sql = "SELECT SUM(`stock`) FROM `stock` WHERE `productid` = $id AND `date` <= '$date' ";
        $stock = $this->select($sql)[0]['SUM(`stock`)'];
        $sql = "SELECT SUM(`qty`) FROM `billitems` WHERE `productid`=$id";
        $sold = $this->select($sql)[0]['SUM(`qty`)'];
        $balance = $stock - $sold;
        return $balance;
    }
    public function getlatestprice($id,$date)
    {    
        $sql = "SELECT `price` FROM `price` WHERE `productid` = $id  AND `date` <= '$date' ORDER BY `date` DESC";
        return $this->select($sql)[0]['price'];
    }
}
