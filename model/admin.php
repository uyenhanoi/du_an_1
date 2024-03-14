<?php
    function uploads_admins(){
        $sql = "SELECT * FROM tai_khoan_admin ";
        $admins = pdo_query($sql);
        return $admins;
    }
    function upload_one_admin($username){
        $sql = "SELECT * FROM tai_khoan_admin WHERE ten_taikhoan = '$username'";
        $admin = pdo_query_one($sql);
        return $admin;
    }
    function one_role($id){
        $sql = "SELECT * FROM vai_tro WHERE id = '$id'";
        $role = pdo_query_one($sql);
        return $role;
    }
    function check_admin($username,$pass){
        $sql = "SELECT * FROM tai_khoan_admin WHERE ten_taikhoan = '$username' AND mat_khau = '$pass'";
        $admin = pdo_query_one($sql);
        return $admin;
    }
?>