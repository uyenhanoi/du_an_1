<?php
//Hàm này thêm 1 danh mục mới vào cơ sở dữ liệu.
  function insert_danhmuc($tenloai){
    //tạo câu lệnh sql để thêm danh mục mới vào bảng 'danhmuc'.
    $sql= " INSERT INTO danhmuc(name) values ('$tenloai')";
    //Thực hiện câu lệnh SQL.
    pdo_execute($sql);
  }

// hàm này xóa 1 danh mục dựa trên trên ID của danh mục.
  function delete_danhmuc($id){
     // tạo câu lệnh SQL để xóa danh mục dựa trên ID.
    $sql= "DELETE FROM danhmuc WHERE id=".$id;
    pdo_execute($sql);
  }
//Hàm này xóa 1 danh mục dựa trên ID của danh mục.
  function loadall_danhmuc(){
   // câu lệnh sql để lấy danh sách tất cả danh mục.
    $sql = "SELECT * FROM danhmuc ORDER BY name";
    $listdanhmuc = pdo_query($sql);
    //có query phải return trả về 
    return $listdanhmuc;
  }
//Hàm này tải thông tin của một danh mục dựa trên ID của danh mục.
  function loadone_danhmuc($id){
    // tạo câu lệnh sql để lấy thông tin của 1 danh mục dựa trên ID.
    $sql = "SELECT * FROM danhmuc WHERE id=".$id;
    // thực hiện truy vấn SQL và trả về thông tin danh mục.
    $dm = pdo_query_one($sql);
    return $dm;
  }

  //hàm này cập nhật thông tin của danh mục.
  function update_danhmuc($id,$tenloai){
    //tạo câu lệnh SQL để cập nhật danh mục dựa trên ID.
    $sql= "UPDATE danhmuc SET NAME='".$tenloai."' WHERE id=".$id;
    // thực hiện câu lệnh SQL để cập nhật danh mục.
        pdo_execute($sql);
  }
?>


