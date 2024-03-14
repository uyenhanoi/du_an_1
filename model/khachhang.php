<?php
// in ra đơn hàng 
function upload_order($id){
    $sql = "SELECT dat_don_hang.*,san_pham.*,gia_sp * (100 - giam_gia)/100 as giagiam FROM dat_don_hang 
            JOIN san_pham ON san_pham.id = dat_don_hang.id_sp
            JOIN phuong_thuc_thanh_toan ON phuong_thuc_thanh_toan.id = dat_don_hang.id_phuong_thuc_thanh_toan
            WHERE dat_don_hang.id_kh = $id
            ";
    $orders = pdo_query($sql);
    return $orders;
}
// in thông tin của khách hàng qua id
    function upload_one_user($id){
        $sql = "SELECT * FROM tai_khoan_kh WHERE id = $id";
        $user = pdo_query_one($sql);
        return $user;
    }

// TH1: Khi khách ấn vào đăng nhập
    function upload_user(){
        $sql = "SELECT * FROM tai_khoan_kh";
        $user = pdo_query($sql);
        return $user;
    }
//TH2:Kiểm tra xem khách hàng đã đăng nhập chưa 
//chức năng này xảy ra khi: khách chọn thêm sản phẩm lúc đó hệ thống sẽ check xem khách đã có tài khoản chưa
//nếu có thì hiện ra trang chủ hoặc trang khách đang ở 
//nếu k có thì chuyển khách đến trang đăng nhập 
    function check_user($user_name){
        $sql = "SELECT * FROM tai_khoan_kh WHERE email = '$user_name' or sdt = '$user_name'";
        $user_then_check = pdo_query_one($sql);
        return $user_then_check;
    }
// update tài khoản
    function update_user($sdt,$dia_chi,$email,$id){
        $sql = "UPDATE tai_khoan_kh SET sdt='$sdt',dia_chi='$dia_chi',email='$email' WHERE id=$id";
        pdo_execute($sql);
    }
// in ra tài khoản 
    function uploads_users(){
        $sql="SELECT * FROM tai_khoan_kh";
        $list_users = pdo_query($sql);
        return $list_users;
    }
    function upload_user_id($id){
        $sql="SELECT * FROM tai_khoan_kh WHERE id = $id";
        $user = pdo_query_one($sql);
        return $user;
    }
    function update_user_on_admin($sdt,$dia_chi,$email,$id,$hinh_anh,$mat_khau,$ten_kh){
        $sql = "UPDATE tai_khoan_kh SET sdt='$sdt',dia_chi='$dia_chi',email='$email',
                hinh_anh='$hinh_anh',mat_khau='$mat_khau',ten_kh='$ten_kh' WHERE id=$id";
        pdo_execute($sql);
    }
    function add_user_on_admin($ten_kh,$mat_khau,$hinh_anh,$sdt,$dia_chi,$email){
        $sql = "INSERT INTO tai_khoan_kh VALUES 
                (NULL,'$ten_kh','$mat_khau','$hinh_anh','$sdt','$dia_chi','$email')";
        pdo_execute($sql);
    }function delete_user_on_admin($id){
        $sql = "DELETE FROM tai_khoan_kh WHERE id = '$id'";
        pdo_execute($sql);
    }
?>