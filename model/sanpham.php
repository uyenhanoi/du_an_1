<?php
//xoá sản phẩm
function delete_prd($id){
    $sql = "DELETE FROM san_pham WHERE id = $id";
    pdo_execute($sql);
}
//Thêm sản phẩm
function add_prd_on_admin($ten_sp,$hinh_anh,$so_luong,$noi_dung_sp,$gia_sp,$giam_gia,$id_danhmuc){
    $sql = "INSERT INTO san_pham 
            VALUES(NULL,'$ten_sp','$hinh_anh',NULL,'$so_luong','$noi_dung_sp','$gia_sp','$giam_gia','$id_danhmuc')";
    pdo_execute($sql);
}
//update sản phẩm
function update_prd($id,$ten_sp,$hinh_anh,$so_luong,$noi_dung_sp,$gia_sp,$giam_gia,$id_danhmuc){
    $sql = "UPDATE san_pham 
            SET ten_sp = '$ten_sp', hinh_anh = '$hinh_anh',
            so_luong = '$so_luong', noi_dung_sp = '$noi_dung_sp', gia_sp = '$gia_sp',
             giam_gia = '$giam_gia', id_danhmuc = '$id_danhmuc'
             WHERE id = '$id'";
    pdo_execute($sql);
}
// hết sp tpo 5 yêu thích cao nhất
function upload_like_prds(){
    $sql = "SELECT *,gia_sp * (100 - giam_gia)/100 as giagiam FROM san_pham 
            order by luot_thich desc limit 0,5";
    $list_prds = pdo_query($sql);
    return $list_prds;
} 
//select toàn sản phẩm
function upload_all_prds(){
    $sql = "SELECT *,gia_sp * (100 - giam_gia)/100 as giagiam FROM san_pham ";
    $list_prds = pdo_query($sql);
    return $list_prds;
} 
// sản phẩm trang chủ
function upload_prds(){
    $sql = "SELECT *,gia_sp * (100 - giam_gia)/100 as giagiam FROM san_pham 
            order by id desc limit 0,6";
    $list_prds = pdo_query($sql);
    return $list_prds;
} 

function upload_prds_hot(){
    $sql = "SELECT *,gia_sp * (100 - giam_gia)/100 as giagiam FROM san_pham 
            order by luot_thich asc";
    $list_prds = pdo_query($sql);
    return $list_prds;
} 
// Trang sản phẩm
    function upload_prds_6(){
        $sql = "SELECT *,gia_sp * (100 - giam_gia)/100 as giagiam FROM san_pham 
                order by id desc limit 0,6";
        $list_prds = pdo_query($sql);
        return $list_prds;
    }       
// Click vào 1 sản phẩm sẽ ra chi tiết sản phẩm
    function upload_prd($id){
        $sql ="SELECT san_pham.*,gia_sp * (100 - giam_gia)/100 as giagiam 
        FROM san_pham
        JOIN danh_muc ON san_pham.id_danhmuc = danh_muc.id
        where san_pham.id= '$id'";
        $prd = pdo_query_one($sql); 
        return $prd;
    }
// Click vào thêm sản phẩm vào giỏ hàng
    function add_prd($id_sp,$id_kh,$so_luong_them){
        $sql = "INSERT INTO gio_hang VALUES (NULL,'$id_sp','$id_kh','$so_luong_them')";
        pdo_execute($sql);
    }
//selcet nhiều sản phẩm trong giỏ hàng
    function upload_prds_on_cart($userName){
        $sql = "SELECT t.*,gio_hang.*,san_pham.*,gia_sp * (100 - giam_gia)/100*so_luong_them as giagiam,SUM(so_luong_them) as tongsoluong,
        (gia_sp * (100 - giam_gia)/100) * (SUM(so_luong_them))as tongtien  FROM gio_hang 
        JOIN san_pham ON gio_hang.id_sp = san_pham.id
        JOIN tai_khoan_kh t ON t.id = gio_hang.id_kh
        WHERE t.ten_kh = '$userName'
        GROUP BY id_sp";
        $prds_on_cart = pdo_query($sql);
        return $prds_on_cart;
    }
//selcet 1 sản phẩm trong giỏ hàng 
function upload_prd_on_cart($userName,$id){
    $sql = "SELECT t.*,gio_hang.*,san_pham.*,gia_sp*so_luong_them (100 - giam_gia)/100 as giagiam, SUM(so_luong_them) as tongsoluong FROM gio_hang 
    JOIN san_pham ON gio_hang.id_sp = san_pham.id
    JOIN tai_khoan_kh t ON t.id = gio_hang.id_kh
    WHERE t.ten_kh = '$userName' and san_pham.id = '$id'
    GROUP BY id_sp";
    $prds_on_cart = pdo_query_one($sql);
    return $prds_on_cart;
}
// tổng tiền trong giỏ hàng
function sumMoney_upload_prds_on_cart(){
    $sql = "SELECT gio_hang.*,san_pham.*,gia_sp* (100 - giam_gia)/100 as giagiam,SUM(gia_sp*so_luong_them * (100 - giam_gia)/100) as tongtien FROM gio_hang 
    JOIN san_pham ON gio_hang.id_sp = san_pham.id";
    $prds_on_cart = pdo_query($sql);
    return $prds_on_cart;
}
// xoá sản phẩm trong giỏ hàng
    function delete_prd_on_cart($id){
        $sql = "DELETE FROM gio_hang WHERE id_sp = '$id'";
        pdo_execute($sql);
    }
// thanh toán
function abate_prds($userName,$id){
    $sql = "SELECT t.*,gio_hang.*,san_pham.*,gia_sp * (100 - giam_gia)/100 as giagiam,SUM(so_luong_them) as tongsoluong FROM gio_hang 
    JOIN san_pham ON gio_hang.id_sp = san_pham.id
    JOIN tai_khoan_kh t ON t.id = gio_hang.id_kh
    WHERE t.ten_kh = '$userName' and san_pham.id = '$id'
    GROUP BY id_sp";
    $prds_on_cart = pdo_query($sql);
    return $prds_on_cart;
}
//tổng thanh toán
function sum_abate(){
    $sql = "SELECT gio_hang.*,san_pham.*,gia_sp * (100 - giam_gia)/100 as giagiam,SUM((gia_sp*so_luong_them) * (100 - giam_gia)/100) + 50000 as tongtien FROM gio_hang 
    JOIN san_pham ON gio_hang.id_sp = san_pham.id";
    $prds_on_cart = pdo_query_one($sql);
    return $prds_on_cart;
}
//thêm vào đơn đặt hàng COD
function abate($id_sp,$id_kh,$so_luong_dat){
    $sql = "INSERT INTO dat_don_hang 
    VALUES(NULL,'$id_sp','$id_kh','$so_luong_dat',1,1, current_timestamp())";
    pdo_execute($sql);
}
//thêm vào đơn đặt hàng momo
function abateMomo($id_sp,$id_kh,$so_luong_dat){
    $sql = "INSERT INTO dat_don_hang 
    VALUES(NULL,'$id_sp','$id_kh','$so_luong_dat',1,2, current_timestamp())";
    pdo_execute($sql);
}
//Xoá khỏi giở hàng
function delete_cart($id_kh){
    $sql = "DELETE FROM gio_hang WHERE id_kh='$id_kh'";
    pdo_execute($sql);
}
?>
