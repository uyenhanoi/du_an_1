<?php
session_start();
 include '../model/pdo.php';
 include '../model/khachhang.php';
 include '../model/sanpham.php';
 include '../model/danhmuc.php';
 include '../model/admin.php';


    include 'header.php';
    if(isset($_GET['act']) ){
       $act = $_GET['act'];
       switch($act){
           case 'sanpham':
               
               include 'sanpham/index.php';
               break;
           case 'tatcasanpham':
               include 'sanpham/allprd.php';
               break;
           case 'danhmuc':
            $list_directories_main =list_directories_main();
               
               include 'danhmuc/index.php';
               break;
           case 'khachhang':
               
               include 'khachhang/index.php';
               break;  

           case 'thongtinchitiet':
              
               include 'khachhang/thongtinchitiet.php';
               break;  
           case 'thongke':
               include 'thongke.php';
               break;
           case 'thanhvien':
               include 'taikhoan_admin/thanhvien.php';
               break;
           default:
               include 'home.php';
           break;
           }
    }else{
       include 'home.php';
    }
    include 'footer.php';

?>