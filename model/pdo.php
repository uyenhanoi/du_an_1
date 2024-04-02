<?php

// ✅Hàm kết nối cơ sở dữ liệu sử dụng PDO
function pdo_get_connection(){
    $servername = "localhost";
    $username = "root";
    $password = "";
    try {
<<<<<<< HEAD
        $conn = new PDO("mysql:host=$servername;dbname=du_an_1", $username, $password);
=======
        $conn = new PDO("mysql:host=$servername;dbname=duan_1", $username, $password);
>>>>>>> f94e9b51e171f8a6fd912b843cc08ac26b3dd16f
        //❗ dbname là tên cơ sở dữ liệu
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $conn;
    } catch(PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }
}

// ✅Thực thi câu lệnh SQL thao tác dữ liệu như (INSSERT, UPDATE, DELETE) sửa thêm xóa..
function pdo_execute($sql){
    $sql_args=array_slice(func_get_args(),1);
    try{
        $conn=pdo_get_connection();
        $stmt=$conn->prepare($sql);
        $stmt->execute($sql_args);

    }
    catch(PDOException $e){
        throw $e;
    }
    finally{
        unset($conn);
    }
}
// truy vấn nhiều dữ liệu
//✅ Thực thi câu lệnh sql truy vấn (SELECT * FROM tên bảng) ---> về nhiều bản ghi
function pdo_query($sql){
    $sql_args=array_slice(func_get_args(),1);

    try{
        $conn=pdo_get_connection();
        $stmt=$conn->prepare($sql);
        $stmt->execute($sql_args);
        $rows=$stmt->fetchAll();
        return $rows;
    }
    catch(PDOException $e){
        throw $e;
    }
    finally{
        unset($conn);
    }
}

// ✅ Thực thi câu lệnh SQL truy vấn dữ liệu (SELECT * FROM tên bảng WHERE id/name/..) --> trả về 1 bản ghi

function pdo_query_one($sql){
    $sql_args=array_slice(func_get_args(),1);
    try{
        $conn=pdo_get_connection();
        $stmt=$conn->prepare($sql);
        $stmt->execute($sql_args);
        $row=$stmt->fetch(PDO::FETCH_ASSOC);
        // đọc và hiển thị giá trị trong danh sách trả về
        return $row;
    }
    catch(PDOException $e){
        throw $e;
    }
    finally{
        unset($conn);
    }
}
pdo_get_connection();
?>