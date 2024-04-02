<?php
  function insert_sanpham($tensp,$giasp,$hinh,$mota,$iddm){
    $sql= " INSERT INTO sanpham (name,price,img,mota,iddm) values ('$tensp','$giasp','$hinh','$mota','$iddm')";
    pdo_execute($sql);
  }


  function delete_sanpham($id){
    $sql= "DELETE FROM sanpham WHERE id=".$id;
    pdo_execute($sql);
  }

  // load sản phẩm top 10
  function loadall_sanpham_top10() {
    // Tạo câu lệnh SQL để lấy danh sách tất cả sản phẩm và sắp xếp theo thứ tự giảm dần theo ID, giới hạn 9 sản phẩm.
    $sql = "SELECT * FROM sanpham WHERE 1 ORDER BY luotxem DESC LIMIT 0,10";
    // Thực hiện truy vấn SQL và trả về danh sách sản phẩm.
    $listsanpham = pdo_query($sql);
    return $listsanpham;
}

//loadd all sản phẩm cho trang chủ
  function loadall_sanpham_home() {
    // Tạo câu lệnh SQL để lấy danh sách tất cả sản phẩm và sắp xếp theo thứ tự giảm dần theo ID, giới hạn 9 sản phẩm.
    $sql = "SELECT * FROM sanpham WHERE 1 ORDER BY id DESC LIMIT 0,8";
    // Thực hiện truy vấn SQL và trả về danh sách sản phẩm.
    $listsanpham = pdo_query($sql);
    return $listsanpham;
}

  function loadall_sanpham($kyw="",$iddm=0){
    $sql = "SELECT * FROM sanpham where 1";
    if($kyw!=""){
      $sql.=" AND name LIKE '%".$kyw."%'";
    }
    if($iddm>0){
      $sql.=" AND iddm ='".$iddm."'";
    }
    $sql.=" ORDER BY id desc";
    
    $listsanpham = pdo_query($sql);
    //có query phải return trả về
    return $listsanpham;
  }
  function load_ten_dm($iddm){
    if($iddm>0){
    $sql = "SELECT * FROM danhmuc WHERE id=".$iddm;
    $dm=pdo_query_one($sql);
    extract($dm);
    return $name;
  }else{
    return "";
  }
}
  function loadone_sanpham($id){
    $sql = "SELECT * FROM sanpham WHERE id=".$id;
    $sp=pdo_query_one($sql);
    return $sp;
  }

  function load_sanpham_cungloai($id,$iddm){
    $sql = "SELECT * FROM sanpham WHERE iddm=".$iddm." AND id <> ".$id;
    $listsanpham = pdo_query($sql);
    return $listsanpham;
  }

  function update_sanpham($id,$iddm,$tensp,$giasp,$mota,$hinh){
    if($hinh!="")
    // $sql= "UPDATE sanpham SET iddm='".$iddm."',name='".$tensp."', price='".$giasp."',mota='".$mota."',img='".$hinh."'  WHERE id=".$id;
    $sql = "UPDATE sanpham SET iddm = '$iddm', name = '$tensp', price = '$giasp', mota = '$mota', img = '$hinh' WHERE id = $id";
    else
    $sql= "UPDATE sanpham SET iddm='".$iddm."',name='".$tensp."', price='".$giasp."',mota='".$mota."'  WHERE id=".$id;

        pdo_execute($sql);
}
function loadall_sanpham_danhmuc($id){
 $sql ="SELECT sp.id, sp.name ,sp.price ,sp.img ,sp.mota ,sp.luotxem, sp.iddm , dm.name dm_name   
 FROM sanpham sp INNER JOIN danhmuc dm ON sp.iddm=dm.id where dm.id='".$id."' order by sp.id limit 8";
 $listsp_dm = pdo_query($sql);
 return $listsp_dm;
}
function loadspct($id) {
  $sql = "SELECT * FROM sanpham  where id=".$id;
  $spct = pdo_query_one($sql);
  return $spct;
}

function loadall_sanpham_dm($kyw = "", $iddm = 0, $offset = 0, $limit = 16) {
  $sql = "SELECT  * FROM sanpham WHERE 1
  ";
  if ($kyw != "") {
      $sql .= " AND name LIKE '%" . $kyw . "%'";
  }
  if ($iddm > 0) {
      $sql .= " AND iddm ='" .$iddm. "'";
  }
  $sql .= " ORDER BY id DESC LIMIT $offset, $limit";

  $listsanpham = pdo_query($sql);
  return  $listsanpham;
}


?>
