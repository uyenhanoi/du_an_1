<?php

// Bắt đầu phiên làm việc với session
session_start();

// Kiểm tra xem người dùng đã đăng nhập hay chưa
if (isset($_SESSION['user'])) {
    // Trích xuất thông tin người dùng từ session
    extract($_SESSION['user']);

    // Kiểm tra vai trò của người dùng, ở đây mình sử dụng vai trò 1 cho quản trị viên
    if ($role == 1) {
        // Include các file cần thiết cho các model và giao diện
    
  
 include "../model/pdo.php";
 include "header.php";
 include "../model/danhmuc.php";
 include "../model/sanpham.php";
 include "../model/taikhoan.php";
 include "../model/binhluan.php";
  include "../model/cart.php";


 //controller
 if(isset($_GET['act'])){
  $act=$_GET['act'];
  switch($act){

    case 'adddm':
      //ktra user có click nút add hay ko ✅
      
      if(isset($_POST['themmoi'])&&($_POST['themmoi'])){
        $tenloai=$_POST['tenloai'];
        insert_danhmuc($tenloai);
        $thongbao="Thêm thành công";
      }
      include "danhmuc/add.php";
      break;

    case 'listdm':
      $listdanhmuc=loadall_danhmuc();
      include "danhmuc/list.php";
      break;
     
    case 'xoadm':
      if(isset($_GET['id'])&&($_GET['id']>0)){
        // $sql="delete from danhmuc where id=".$_GET['id'];
      
        // pdo_execute($sql);
        delete_danhmuc($_GET['id']);

      }
      $listdanhmuc=loadall_danhmuc();
      include "danhmuc/list.php";
      break;


    case 'suadm':
      if(isset($_GET['id'])&&($_GET['id']>0)){
       $dm=loadone_danhmuc($_GET['id']);
      }
      $listdanhmuc=loadall_danhmuc();
      include "danhmuc/update.php";
      break;

    case 'updatedm':
      if(isset($_POST['capnhat'])&&($_POST['capnhat'])){
        $tenloai=$_POST['tenloai'];
        $id=$_POST['id'];
        update_danhmuc($id,$tenloai);
        $thongbao="Cập nhật thành công";

      }
      $listdanhmuc=loadall_danhmuc();
      include "danhmuc/list.php";
      break;

      /* sản phẩm*/
      case 'addsp':
        //ktra user có click nút add hay ko ✅
        if(isset($_POST['themmoi'])&&($_POST['themmoi'])){
          $iddm=$_POST['iddm'];
          $tensp=$_POST['tensp'];
          $giasp=$_POST['giasp'];
          $mota=$_POST['mota'];
          $hinh=$_FILES['hinh']['name'];
          $target_dir = "../upload/";
          $target_file = $target_dir . basename($_FILES["hinh"]["name"]);
          if (move_uploaded_file($_FILES["hinh"]["tmp_name"], $target_file)) {
          
          } else {
         
          }

          insert_sanpham($tensp, $giasp, $hinh, $mota, $iddm);
          $thongbao="Thêm thành công";
        }
        $listdanhmuc=loadall_danhmuc();
       
        include "sanpham/add.php";
        break;
  

      case 'listsp':
        $listdanhmuc=loadall_danhmuc();
        $iddm = isset($_GET['iddm']) && !empty($_GET['iddm']) ? $_GET['iddm'] : 0;
        //  $ten_dm = load_ten_dm($id_dm);
         $list_sp_dm= loadall_sanpham_danhmuc($iddm);
         // Xác định kyw
         $kyw = isset($_GET['kyw']) && !empty($_GET['kyw']) ? $_GET['kyw'] : '';
     
         // Xác định trang hiện tại
         $cr_page = isset($_GET['page']) && is_numeric($_GET['page']) ? (int)$_GET['page'] : 1;
     
         // Load dữ liệu sản phẩm cho trang hiện tại
         $limit = 8;
         $offset = ($cr_page - 1) * $limit;
         $dssp = loadall_sanpham_dm($kyw, $iddm, $offset, $limit);
     
         // Tính tổng số trang
         $total = count(loadall_sanpham_dm($kyw, $iddm));
         $num_pages = ceil($total / $limit);

        include "sanpham/list.php";
        break;
  




        case 'xoasp':
          if(isset($_GET['id'])&&($_GET['id']>0)){
            delete_sanpham($_GET['id']);
          }
          $listdanhmuc=loadall_danhmuc();
          $iddm = isset($_GET['iddm']) && !empty($_GET['iddm']) ? $_GET['iddm'] : 0;
          //  $ten_dm = load_ten_dm($id_dm);
           $list_sp_dm= loadall_sanpham_danhmuc($iddm);
           // Xác định kyw
           $kyw = isset($_GET['kyw']) && !empty($_GET['kyw']) ? $_GET['kyw'] : '';
       
           // Xác định trang hiện tại
           $cr_page = isset($_GET['page']) && is_numeric($_GET['page']) ? (int)$_GET['page'] : 1;
       
           // Load dữ liệu sản phẩm cho trang hiện tại
           $limit = 8;
           $offset = ($cr_page - 1) * $limit;
           $dssp = loadall_sanpham_dm($kyw, $iddm, $offset, $limit);
       
           // Tính tổng số trang
           $total = count(loadall_sanpham_dm($kyw, $iddm));
           $num_pages = ceil($total / $limit);
          include "sanpham/list.php";
          break;



      case 'suasp':
        if(isset($_GET['id'])&&($_GET['id']>0)){
         $sanpham=loadone_sanpham($_GET['id']);
        }
        $listdanhmuc=loadall_danhmuc();
        include "sanpham/update.php";
        break;
  
      case 'updatesp':
        if(isset($_POST['capnhat'])&&($_POST['capnhat'])){
          $id=$_POST['id'];
          $iddm=$_POST['iddm'];
          $tensp=$_POST['tensp'];
          $giasp=$_POST['giasp'];
          $mota=$_POST['mota'];
          $hinh=$_FILES['hinh']['name'];
          $target_dir = "../upload/";
          $target_file = $target_dir.basename($_FILES["hinh"]["name"]);
          if (move_uploaded_file($_FILES["hinh"]["tmp_name"], $target_file)) {
          
          } else {
         
          }
          update_sanpham($id,$iddm,$tensp,$giasp,$mota,$hinh);
          $thongbao="Cập nhật thành công";
  
        }
        $listdanhmuc = loadall_danhmuc();
      
        $iddm = isset($_GET['iddm']) && !empty($_GET['iddm']) ? $_GET['iddm'] : 0;
        //  $ten_dm = load_ten_dm($id_dm);
         $list_sp_dm= loadall_sanpham_danhmuc($iddm);
         // Xác định kyw
         $kyw = isset($_GET['kyw']) && !empty($_GET['kyw']) ? $_GET['kyw'] : '';
     
         // Xác định trang hiện tại
         $cr_page = isset($_GET['page']) && is_numeric($_GET['page']) ? (int)$_GET['page'] : 1;
     
         // Load dữ liệu sản phẩm cho trang hiện tại
         $limit = 8;
         $offset = ($cr_page - 1) * $limit;
         $dssp = loadall_sanpham_dm($kyw, $iddm, $offset, $limit);
     
         // Tính tổng số trang
         $total = count(loadall_sanpham_dm($kyw, $iddm));
         $num_pages = ceil($total / $limit);
        include "sanpham/list.php";
        break;



        
        case 'dskh':
        $listtaikhoan=loadall_taikhoan();

         
          include "taikhoan/list.php";
          break;

          case 'addtk':
            // Kiểm tra xem người dùng có click vào nút thêm tài khoản hay không
            if (isset($_POST['themmoi']) && ($_POST['themmoi'])) {
                $email = $_POST['email']; // Lấy địa chỉ email
                $user = $_POST['user']; // Lấy tên đăng nhập
                $pass = $_POST['pass']; // Lấy mật khẩu
                $address = $_POST['address']; // Lấy địa chỉ
                $tel = $_POST['tel']; // Lấy số điện thoại

                // Thêm tài khoản mới vào cơ sở dữ liệu
                insert_taikhoan_admin($email, $user, $pass, $address, $tel);
                $thongbao = "Thêm tài khoản thành công.";
            }

            // Load danh sách tài khoản khách hàng
            $listtaikhoan = loadall_taikhoan();
            // Hiển thị giao diện thêm tài khoản
            include "taikhoan/add.php";
            break;


        case 'suatk':
            // Kiểm tra xem có yêu cầu cập nhật tài khoản không
            if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                $tk = loadone_taikhoan($_GET['id']); // Lấy thông tin tài khoản cần cập nhật
            }

            $listtaikhoan = loadall_taikhoan(); // Load danh sách tài khoản khách hàng
            include "taikhoan/update.php"; // Hiển thị giao diện cập nhật tài khoản
            break;

        case 'updatetk':
            // Kiểm tra xem người dùng có click vào nút cập nhật tài khoản hay không
            if (isset($_POST['capnhat']) && ($_POST['capnhat'])) {
                $id = $_POST['id']; // Lấy ID của tài khoản
                $email = $_POST['email']; // Lấy địa chỉ email
                $user = $_POST['user']; // Lấy tên đăng nhập
                $pass = $_POST['pass']; // Lấy mật khẩu
                $address = $_POST['address']; // Lấy địa chỉ
                $tel = $_POST['tel']; // Lấy số điện thoại

                // Cập nhật thông tin tài khoản trong cơ sở dữ liệu
                update_taikhoan($id, $user, $pass, $email, $address, $tel);
                $thongbao = "Cập nhật tài khoản thành công.";
            }

            $listtaikhoan = loadall_taikhoan(); // Load danh sách tài khoản khách hàng
            include "taikhoan/add.php"; // Hiển thị giao diện danh sách tài khoản
            break;

        case 'xoatk':
            // Kiểm tra xem có yêu cầu xóa tài khoản không
            if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                delete_taikhoan($_GET['id']); // Xóa tài khoản
            }

            $listtaikhoan = loadall_taikhoan(); // Load danh sách tài khoản khách hàng
            include "taikhoan/list.php"; // Hiển thị giao diện danh sách tài khoản
            break;

            
          case 'dsbl':
            $listbinhluan=loadall_binhluan(0);
    
             
              include "binhluan/list.php";
              break;

             case 'xoabl':
                if(isset($_GET['id'])&&($_GET['id']>0)){
                  $sql="delete from binhluan where id=".$_GET['id'];
                
                  pdo_execute($sql);
                }
                $listbinhluan=loadall_binhluan("",0);
                include "binhluan/list.php";
                break;

                case 'thongke':
                  $listthongke = loadall_thongke();
                  include "thongke/list.php";
                  break;

                  case 'bieudo':
                    $listthongke = loadall_thongke(); // Load danh sách thống kê
                    include "thongke/bieudo.php"; // Hiển thị biểu đồ thống kê
                    break;
      default:
      include "home.php";
      break;

  }
 }else{
        
 include "home.php";
 }

 include "footer.php";
}else{
  echo 'Không đủ thẩm quyền'; // Thông báo không đủ quyền

}
}