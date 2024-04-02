
      <div class="center">
      <section class="function-prds">
 
        <div class="form-function-wrapper">
          <h3>Quản lý danh mục</h3>
        
          <form action="index.php?act=adddm" class="form-function"  method="POST">
            <div class="input-group">
            
               <label class="input__name"> ID danh mục </label> <br>
            <input type="text" name="maloai" class="input__content" disabled>
              </div>
            <span></span>
            <div class="input-group">
            <label class="input__name">Tên danh mục: </label> <br>
            <input type="text" name="tenloai" placeholder="Nhập tên sản phẩm" class="input__content">
               
            </div>
            <span></span>
            <input class="btn-implement btn-action" name="themmoi" type="submit" value="Thêm mới">
         <a href="index.php?act=listdm"><input type="button" value="DANH SÁCH" class="btn-implement btn-action"></a>

          </form>
        </div>



