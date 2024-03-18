

<div class="center">
      <section class="function-prds">
      <!-- <form action="index.php?act=addsp" method="POST" enctype="multipart/form-data"> -->

        <!-- form sản phẩm -->
        <div class="form-function-wrapper">

          <h3>Thêm sản phẩm</h3>
        <form action="index.php?act=addsp" method="POST" enctype="multipart/form-data">

          <label> Danh mục </label> <br>
           <select name="iddm" >
            <?php
            foreach ($listdanhmuc as $danhmuc){
              extract($danhmuc);
              echo '<option value="' . $id.'"> '.$name.'"</option>';
            }
            ?>
            
           </select>
            <div class="input-group">
               <span class="input__name">Tên sản phẩm:</span>
                <input type="text" name="tensp" placeholder="Nhập tên sản phẩm" class="input__content">
            </div>
            <span></span>
            <div class="input-group">
              <span class="input__name">Giá cả:</span>
              <input type="text" placeholder="Nhập giá" class="input__content" name="giasp">
            </div>
            <span></span>
            <div class="input-group">
              <span class="input__name">Hình ảnh</span>
              <input  type="file" name="hinh">
            </div>
   
            <span></span>
          
            <div class="input-group">
              <span class="input__name">Nội dung sản phẩm:</span>
             <textarea name="" id="" cols="30" rows="10"  class="input__content input__content--content" name="mota">
             </textarea>
            </div>
   
            <!-- <button  name="themmoi" >Thêm sản phẩm</button> -->
            <input class="btn-implement btn-action" name="themmoi" type="submit" value="THÊM MỚI">
            <a href="index.php?act=listsp" ><input class="btn-implement btn-action" type="button" value="DANH SÁCH"></a>
           </div>
           
           <?php
           if(isset($thongbao)&&($thongbao!="")) echo $thongbao;          

           ?>
          
          </form>
        </div>
