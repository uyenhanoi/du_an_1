<?php
include "view/header.php";
if (isset($_GET['act']) && ($_GET['act'] != "")){
  $act =$_GET['act'];
  switch($act){
    case "home":
      include "home.php";
      break;

    case "gioithieu":
      include "view/gioithieu.php";
      break;

    case "blog":
      include "view/blog.php";

    case "listsp1":
    include "view/listsp1.php";
    break;

    case "sanphamct":
      include "view/chitietsanpham1.php";
      break;
    
    case "account":
      include "view/account.php";
      break;
    case "cart":
      include "view/cart.php";
      break;
}
}else{
include "view/home.php";

}
include "view/footer.php";
?>
		
	
	