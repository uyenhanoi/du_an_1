<?php
    function insert_binhluan($noidung,$iduser,$idpro,$ngaybinhluan){
        $sql = "insert into binhluan(noidung,iduser,idpro,ngaybinhluan) values('$noidung','$iduser','$idpro','$ngaybinhluan')";
        pdo_execute($sql);
    }

    function loadall_binhluan($idpro){
        $sql = "select * from binhluan where 1";
        if($idpro>0) $sql.=" AND idpro='".$idpro."'";
        $sql.=" order by id desc";
        $listbl=pdo_query($sql);
        return $listbl;
    }

    function delete_binhluan($id){
        $sql="delete from binhluan where id=".$id;
        pdo_execute($sql);
    }
<<<<<<< HEAD
    function loadall_bl($id) {
        $sql = "SELECT * , tk.user FROM binhluan INNER JOIN taikhoan tk ON binhluan.iduser = tk.id where idpro=".$id;
        $listbl=pdo_query($sql);
        return $listbl;
    }
=======

>>>>>>> f94e9b51e171f8a6fd912b843cc08ac26b3dd16f
    
?>