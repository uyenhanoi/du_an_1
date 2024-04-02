

<?php

  if(is_array($dm)){
    extract($dm);
  }
?>



<div class="center">
      <section class="function-prds">
 
        <div class="form-function-wrapper">
          <h3>Cập nhật danh mục</h3>
          <form action="index.php?act=updatedm" method="POST">
        
            <div class="input-group">
            
               <label class="input__name"> ID danh mục </label> <br>
            <input type="text" name="maloai" class="input__content" disabled>
              </div>
            <span></span>
            <div class="input-group">
            <label class="input__name">Tên danh mục: </label> <br>
            <!-- <input type="text" name="tenloai" placeholder="Nhập tên sản phẩm" class="input__content"> -->
            <input type="text" name="tenloai" class="input__content" value="<?php if(isset($name)&&($name!="")) echo $name; ?>">
            <input type="hidden" name="id" value="<?php if(isset($id)&&($id>0)) echo $id;?>">
               
            </div>
            <span></span>

            <input type="hidden" name="id" value="<?php if(isset($id)&&($id>0)) echo $id;?>">


            <input class="btn-implement btn-action" name="capnhat" type="submit" value="Cập nhật">
         <a href="index.php?act=listdm"><input type="button" value="DANH SÁCH" class="btn-implement btn-action"></a>

          </form>
        </div>
