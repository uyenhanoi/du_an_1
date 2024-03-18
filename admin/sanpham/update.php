<?php

  if(is_array($sanpham)){
    extract($sanpham);
  }
  $hinhpath="../upload/".$img;
  if(is_file($hinhpath)){
    $hinh='<img src='.$hinhpath.' alt="" height="80">';
  }else{
    $hinh="no photo";
  }
        
?>

<div class="center">
      <section class="function-prds">
      <form action="index.php?act=updatesp" method="POST" enctype="multipart/form-data">

        <!-- form sản phẩm -->
        <div class="form-function-wrapper">

          <h3>Cập nhật sản phẩm</h3>

          <label> Danh mục </label> <br>
       
       <select name="iddm" id="">

        
        <option value="0" selected>Tất cả</option>
        <?php
          foreach ($listdanhmuc as $key=>$value){
            
            if($iddm==$value['id']){
              echo '<option value="'.$value['id'].'"selected>'.$value['name'].'</option>';
            }else{
              echo '<option value="'.$value['id'].'">'.$value['name'].'</option>';
            }
         }
         ?>
        ?>
           </select>
            <div class="input-group">
               <span class="input__name">Tên sản phẩm:</span>
                <input type="text" name="tensp" placeholder="Nhập tên sản phẩm" class="input__content" value="<?=$name?>" id="">
            </div>
            <span></span>
            <div class="input-group">
              <span class="input__name">Giá cả:</span>
              <input type="text" placeholder="Nhập giá" class="input__content" name="giasp" value="<?=$price?>" >
            </div>
            <span></span>
            <div class="input-group">
              <span class="input__name">Hình ảnh</span>
             
         
              <input  type="file" name="hinh">  <?=$hinh?>
            </div>
   
            <span></span>
          
            <div class="input-group">
              <span class="input__name">Nội dung sản phẩm:</span>
             <textarea name="" id="" cols="30" rows="10"  class="input__content input__content--content" name="mota"><?=$mota?>
             </textarea>
            </div>
   
 
            <input type="hidden" name="id" value="<?=$_GET['id']?>" id="">
              <input class="btn-implement btn-action" name="capnhat" type="submit" value="CẬP NHẬT">
          
            <a href="index.php?act=listsp" ><input class="btn-implement btn-action" type="button" value="DANH SÁCH"></a>
           </div>
           
           <?php
           if(isset($thongbao)&&($thongbao!="")) echo $thongbao;          

           ?>
          
          </form>
        </div>

 
