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

    public function newitem($name, $quantity, $price) {
        $sql = "INSERT INTO `item` (`id`, `name`, `istock`, `fstock`, `price`, `time`) VALUES (NULL, '$name', '$quantity', '$quantity', '$price', CURRENT_TIMESTAMP);";
        if ($this->query($sql)) {
            return true;
        } else {
            return false;
        }
    }

    public function search($data) {
        $sql = "SELECT * FROM `item` WHERE (CONVERT(`name` USING utf8) LIKE '%$data%')";
        return $this->select($sql);
    }

}
