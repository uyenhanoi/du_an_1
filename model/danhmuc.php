<?php
    function upload_child_directories($name){
        $sql = "SELECT dc.*,d.* FROM damhmuc_chinh dc
        JOIN danh_muc d ON d.id_dmc = dc.id_dmc
        WHERE dc.ten_dmc = '$name'
        GROUP BY ten_danhmuc";
        $list_directory = pdo_query($sql);
        return $list_directory;
    }
    // in ra all danh mục nhỏ
    function upload_all_chiild_diretories(){
        $sql = "SELECT * FROM danh_muc";
        $list_child_diretories = pdo_query($sql);
        return $list_child_diretories;
    }
    // in ra danh mục con trong danh mục chính "Sản phẩm nổi bật" có id = 1
    function list_directories(){
        $sql = "SELECT dc.*,d.ten_danhmuc FROM damhmuc_chinh dc
        JOIN danh_muc d ON d.id_dmc = dc.id_dmc
        HAVING dc.id_dmc = 1";
        $list_directory = pdo_query($sql);
        return $list_directory;
    }
    // In ra danh mục chính 
    function list_directories_main(){
        $sql = "SELECT * FROM damhmuc_chinh";
        $list_directory_main = pdo_query($sql);
        return $list_directory_main;
    }
    // in ra hết danh mục chính và trong đó có các danh mục nhỏ 
    function directorie($name){
        $sql = "SELECT dc.*,d.* FROM damhmuc_chinh dc
        JOIN danh_muc d ON d.id_dmc = dc.id_dmc
        WHERE dc.ten_dmc = '$name'";
        $list_directory = pdo_query($sql);
        return $list_directory;
    }

?>