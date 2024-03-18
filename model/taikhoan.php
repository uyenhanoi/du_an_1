<?php
function loadall_taikhoan(){
  // câu lệnh sql để lấy danh sách tất cả danh mục.
   $sql = "SELECT * FROM taikhoan ORDER BY id desc";
   $listtaikhoan = pdo_query($sql);
   //có query phải return trả về 
   return $listtaikhoan;
 }

function insert_taikhoan($email,$user,$pass){
  $sql= " INSERT INTO taikhoan (email,user,pass) values ('$email','$user','$pass')";
  pdo_execute($sql);
}


// Hàm dưới đây trả về thông tin chi tiết của một tài khoản dựa trên ID.
function loadone_taikhoan($id){
  $sql = "select * from taikhoan where id=" . $id;
  $tk = pdo_query_one($sql);
  return $tk;
}


// Hàm này thêm một tài khoản quản trị mới vào cơ sở dữ liệu với thông tin email, tên đăng nhập, mật khẩu, địa chỉ và số điện thoại.
function insert_taikhoan_admin($email, $user, $pass, $address, $tel){
  $sql = "insert into taikhoan(user, pass, email, address, tel) values('$user', '$pass', '$email', '$address', '$tel')";
  pdo_execute($sql);
}
function checkuser($user, $pass){
  $sql = "SELECT * FROM taikhoan WHERE user='".$user."' AND pass='".$pass."'";
  $sp=pdo_query_one($sql);
  return $sp;
}

function checkemail($email){
  $sql = "SELECT * FROM taikhoan WHERE email='".$email."'";
  $sp=pdo_query_one($sql);
  return $sp;
}

function update_taikhoan($id, $user, $pass, $email, $address, $tel){
  $sql = "update taikhoan set  user='" .$user ."', pass='".$pass."', email='".$email."', address='".$address."', tel='" . $tel . "' where id=" . $id;
  pdo_execute($sql);
}


// Hàm này xóa một tài khoản dựa trên ID.
function delete_taikhoan($id){
  $sql = "delete from taikhoan where id=" . $id;
  pdo_execute($sql);
}


?>
