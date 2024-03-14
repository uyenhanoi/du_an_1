<?php
if(isset($_POST['update'])){
  $ten_sp = $_POST['ten_sp'];
  $so_luong = $_POST['so_luong'];
  $noidung_sp = $_POST['noidung_sp'];
  $gia_sp = $_POST['gia_sp'];
  $giam_gia = $_POST['giam_gia'];
  $id_danhmuc = $_POST['id_danhmuc'];

  $file = $_FILES['hinh_anh']; 
  $tmp_name = $_FILES['hinh_anh']['tmp_name'];
  if($file['size'] > 0){
    $name_image =$file['name'];
    move_uploaded_file($tmp_name,'../img/prd/'.$name_image);      
  }else{
    $name_image = $prd['hinh_anh'];
    move_uploaded_file($tmp_name,'../img/prd/'.$name_image);
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
        $error['error-quantyti-prd'] = 'Nhập số lượng sản phẩm cho phép!';
      }
  }
  if(empty($noidung_sp)){
      $error['error-content-prd'] = 'Chưa nhập nội dung cho sản phẩm!';
  }
  if(empty($gia_sp)){
      $error['error-price-prd'] = 'Chưa nhập giá cho sản phẩm!';
  }
  if(!$error){
    $id = $_GET['id_sp'];
    update_prd($id,$ten_sp,$name_image,$so_luong,$noidung_sp,$gia_sp,$giam_gia,$id_danhmuc);
    $succes['updateProduct'] = 'Sửa thành công sản phẩm';
    //header('location: admin.php?adact=sanpham');
  }
}
?>
<div class="center">
  
      <section class="function-prds">
        <!-- form sản phẩm -->
        <div class="form-function-wrapper">
          <h3>Chức năng: <?php echo $update_btn;?></h3>
          
          <form action="" class="form-function" method="POST" enctype="multipart/form-data">
            <div class="input-group">
               <span class="input__name">Tên sản phẩm:</span>
                <input type="text" name="ten_sp" value="<?php echo $prd['ten_sp']?>" placeholder="Nhập tên sản phẩm" class="input__content">
            </div>
            <span class="error"><?=isset($error['error-name-prd'])?$error['error-name-prd']:''?></span>

            <div class="input-group">
              <span class="input__name"></span>
              <img src="../img/prd/<?php echo $prd['hinh_anh']?> " alt="" width="200" height="120">
              <input type="file" name="hinh_anh" accept="image/*">
            </div>

            <div class="input-group">
              <span class="input__name">Lượt thích</span>
              <input type="text" name="luot_thich" disabled value="<?php echo $prd['luot_thich']?>" class="input__content input__content--like">
            </div>
            
            <div class="input-group">
              <span class="input__name">Số lượng:</span>
              <input type="text" name="so_luong"  value="<?php echo $prd['so_luong']?>" placeholder="Nhập số lượng" class="input__content input__content--quantyti">
            </div>
            <span class="error"><?=isset($error['error-name-prd'])?$error['error-name-prd']:''?></span>
            <div class="input-group">
              <span class="input__name">Nội dung sản phẩm:</span>
              <textarea class="input__content input__content--content" cols="1000px" rows="10" name='noidung_sp'><?php echo $prd['noi_dung_sp']?></textarea>
            </div>
            <span class="error"><?=isset($error['error-content-prd'])?$error['error-content-prd']:''?></span>

            <div class="input-group">
              <span class="input__name">Giá cả:</span>
              <input type="text" name="gia_sp" placeholder="Nhập giá" value="<?php echo $prd['gia_sp']?>"  class="input__content">
            </div>
            <span class="color-grey-font[12px]">Đơn vị: (VNĐ)</span>
            <span class="error"><?=isset($error['error-price-prd'])?$error['error-price-prd']:''?></span>

            <div class="input-group">
              <span class="input__name">Giảm giá:</span>
              <input type="text" name="giam_gia" placeholder="Nhập giảm giá" value="<?php echo $prd['giam_gia']?>" class="input__content">
            </div>
            <span class="color-grey-font[12px]">Đơn vị: (%)</span>

            <div class="input-group">
              <span class="input__name">Danh muc:</span>
              <select name="id_danhmuc" id="">
                <?php foreach($list_child_diretories as $child_diretory):
                  extract($child_diretory);?>
                <option value="<?= $id ?>" <?= $prd['id_danhmuc'] == $id ?'selected':''?>><?php echo $ten_danhmuc ?></option>
                <?php endforeach;?>
              </select>
            </div>
            <span><?= isset($succes['updateProduct'])? $succes['updateProduct'] :''?></span>
            <button class="btn-implement btn-action" name="update"><?php echo $update_btn?></button>
          </form>
        </div>
        <script src="">
        
        </script>
        