<?php
  session_start();
include "./model/pdo.php";
include "./model/danhmuc.php";
include "./model/sanpham.php";
include "./model/taikhoan.php";
include "./model/binhluan.php";
$danhmuc = loadall_danhmuc();
include "view/header.php";

// var_dump($danhmuc);
if (isset($_GET['act']) && ($_GET['act'] != "")){
  $act =$_GET['act'];
  switch($act){
    case "gioithieu":
      include "view/gioithieu.php";
      break;

    case "blog":
      include "view/blog.php";





      case "listsp1":

        $iddm = isset($_GET['id']) && !empty($_GET['id']) ? $_GET['id'] : 0;
        //  $ten_dm = load_ten_dm($id_dm);
      //  $list_sp_dm= loadall_sanpham_danhmuc($iddm);
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
      
    include "view/listsp1.php";





    
    break;
    // case 'sptk':
     
    //   break;
      case "spct":
        if(isset($_GET['id'])&& ($_GET['id']>0) ){
          $id= $_GET['id'];
        $spct = loadspct($id);
        $dsbl = loadall_bl($id);
        
        // var_dump($spct);
      }
      
        include "view/chitietsanpham1.php";
        break;
      
    
    // case "account":
    //   include "view/account.php";
    //   break;

    case "dangky":
      if(isset($_POST['dangky'])&&($_POST['dangky'])){
        $email=$_POST['email'];
        $user=$_POST['user'];
        $pass=$_POST['pass'];
        $address=$_POST['address'];
        $tel = $_POST['tel'];
        insert_taikhoan($email, $user, $pass, $address, $tel);
        $thongbao="đã đăng ký thành công, vui lòng đăng nhập!";
      }
    include "view/dangky.php";
    break;
    

    case 'dangnhap':
      if(isset($_POST['dangnhap'])&&($_POST['dangnhap'])){
        
         $user=$_POST['user'];
          $pass=$_POST['pass'];
          $checkuser=checkuser($user, $pass);
          if(is_array($checkuser)){
            $_SESSION['user']=$checkuser;
            $thongbao="bạn đã đăng nhập thành công";
            // header('Location:index.php');
          
      }else{
          $thongbao="tài khoản ko tồn tại vui lòng ktra or đăng ký!";
        }
      }     
       include "view/dangnhap.php";
        break;

        case 'edit_taikhoan':

          if(isset($_POST['capnhat'])&&($_POST['capnhat'])){
            
             $user=$_POST['user'];
              $pass=$_POST['pass'];
              $email=$_POST['email'];
              $address=$_POST['address'];
              $tel=$_POST['tel'];
              $id=$_POST['id'];

              update_taikhoan($id,$user,$pass,$email,$address,$tel);                       
                $_SESSION['user'] = checkuser($user, $pass);
                $thongbao = "Cập nhật tài khoản thành công";
                // header('Location:index.php?act=edit_taikhoan');
             
          }
          include "view/edit_taikhoan.php";

            break;

            case 'quenmk':

              if(isset($_POST['guiemail'])&&($_POST['guiemail'])){
                  $email=$_POST['email'];

                 $checkemail=checkemail($email);
                 if(is_array($checkemail)){
                  $thongbao="Mật khẩu của bạn là:".$checkemail['pass'];
                 }else{
                  $thongbao="Email này không tồn tại";
                 }         
                   
                 
              }
              include "view/quenmk.php";

                break;

                case 'thoat':
                  session_unset();
                  // header("Location:index.php");
            
                  break;



                  

    case "cart":
      include "view/cart.php";
      break;
}
}else{
    
    $listsp = loadall_sanpham_home();

    include "view/home.php";
  

}
include "view/footer.php";


?>
		
	
	