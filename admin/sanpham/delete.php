<?php
if(isset($_GET['id_sp'])){
    $id_sp = $_GET['id_sp'];
    delete_prd($id_sp);
    header('location: admin.php?adact=sanpham');
}
?>