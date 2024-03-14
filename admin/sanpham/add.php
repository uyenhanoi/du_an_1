<?php
if(isset($_POST['add'])){
    $ten_sp = $_POST['ten_sp'];
    $so_luong = $_POST['so_luong'];
    $noidung_sp = $_POST['noidung_sp'];
    $gia_sp = $_POST['gia_sp'];
    $giam_gia = $_POST['giam_gia'];
    $id_danhmuc = $_POST['id_danhmuc'];

    $file = $_FILES['hinh_anh']; 
    if(!$file){
        $tmp_name = $_FILES['hinh_anh']['tmp_name'];
        $name_image =$file['name'];
        move_uploaded_file($tmp_image,'../img/prd/'.$name_image);  
    }
     
    //validate
    if(empty($ten_sp)){
        $error['error-name-prd'] = 'Chưa nhập tên cho sản phẩm!';
    }

    if(empty($so_luong)){
        $error['error-quantyti-prd'] = 'Chưa nhập số lượng cho sản phẩm!';
    }
    else{
        if(strlen($so_luong) > 5){
            $error['error-quantyti-prd'] = 'Nhập số lượng sản phẩm cho phép!';
        }
        if(!preg_match("/^[0-9]*$/",$so_luong)){
            return "Chỉ được điền số!";
        }
    }
    if(empty($noidung_sp)){
        $error['error-content-prd'] = 'Chưa nhập nội dung cho sản phẩm!';
    }
    if(empty($gia_sp)){
        $error['error-price-prd'] = 'Chưa nhập giá cho sản phẩm!';
    }
    
    if(!$error){
        add_prd_on_admin($ten_sp,$name_image,$so_luong,$noidung_sp,$gia_sp,$giam_gia,$id_danhmuc);
        $succes['addProduct'] = 'Sửa thành công sản phẩm';
        header('location: admin.php?adact=sanpham');
    }
}
?>
<div class="center">
  
      <section class="function-prds">
        <!-- form sản phẩm -->
        <div class="form-function-wrapper">
          <h3>Chức năng: <?php echo $add_btn;?></h3>
          
          <form action="" class="form-function" method="POST" enctype="multipart/form-data">
            <div class="input-group">
               <span class="input__name">Tên sản phẩm:</span>
                <input type="text" name="ten_sp"  placeholder="Nhập tên sản phẩm" class="input__content">
            </div>
            <span class="error"><?=isset($error['error-name-prd'])?$error['error-name-prd']:''?></span>

            <div class="input-group">
              <span class="input__name"></span>
              <img src="../img/prd/<?php echo $prd['hinh_anh']?> " alt="" width="200" height="120">
              <input type="file" name="hinh_anh" accept="image/*">
            </div>
            <span class="error"><?=isset($error['error-img-prd'])?$error['error-img-prd']:''?></span>

            <div class="input-group">
              <span class="input__name">Lượt thích</span>
              <input type="text" name="luot_thich" disabled value="0"  class="input__content input__content--like">
            </div>

            <div class="input-group">
              <span class="input__name">Số lượng:</span>
              <input type="text" name="so_luong" placeholder="Nhập số lượng" class="input__content input__content--quantyti">
            </div>
             <span class="error"><?=isset($error['error-quantyti-prd'])?$error['error-quantyti-prd']:''?></span>

            <div class="input-group">
                <span class="input__name">Nội dung sản phẩm:</span>
                <textarea class="input__content input__content--content" 
                 cols="1000px" rows="10" name="noidung_sp"></textarea>
            </div>
            <span class="error"><?=isset($error['error-content-prd'])?$error['error-content-prd']:''?></span>

            <div class="input-group">
              <span class="input__name">Giá cả:</span>
              <input type="text" name="gia_sp" placeholder="Nhập giá"  class="input__content">
            </div>
            <span class="color-grey-font[12px]">Đơn vị: (VNĐ)</span>
            <span class="error"><?=isset($error['error-price-prd'])?$error['error-price-prd']:''?></span>

            <div class="input-group">
              <span class="input__name">Giảm giá:</span>
              <input type="text" name="giam_gia" placeholder="Nhập giảm giá" class="input__content">
            </div>
            <span class="color-grey-font[12px]">Đơn vị: (%)</span>
            <div class="input-group">
              <span class="input__name">Danh muc:</span>
              <select name="id_danhmuc" id="">
                <?php foreach($list_child_diretories as $child_diretory):
                  extract($child_diretory);?>
                <option value="<?= $id ?>"><?php echo $ten_danhmuc ?></option>
                <?php endforeach;?>
              </select>
            </div>
            <span><?= isset($succes['addProduct'])? $succes['addProduct'] :''?></span>
            <button class="btn-implement btn-action" name="add"><?php echo $add_btn?></button>
          </form>
        </div>
        <script src="">
         
        </script>
        