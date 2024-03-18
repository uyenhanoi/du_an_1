
    

    <div class="center">
      <section class="function-prds">
        <!-- form sản phẩm -->
        <form action="index.php?act=updatetk" method="post">
                    <?php
                        extract($tk);
                    ?>
        <div class="form-function-wrapper">
          <h3>Cập nhật tài khoản</h3>
          <form action="index.php?act=addtk" method="post" class="form-function" enctype="multipart/form-data">
     
            <div class="input-group">
               <span class="input__name"> Mã tài khoản: </span>
               <input type="text" name="matk" id="" disabled class="input__content">

            </div>
            <div class="input-group">
                    Tên đăng nhập<br>
                    <input type="text" value="<?=$user?>" name="user" id="" class="input__content">
            </div>
                    <div class="input-group">
                    Mật khẩu <br>
                    <input type="text"  value="<?=$pass?>" name="pass" id="" class="input__content">
                    </div>
                    <div class="input-group">
                    Email <br>
                    <input  value="<?=$email?>" style="width: 100%;border: 1px #CCC solid;padding: 10px;border-radius: 5px;" type="email" name="email" id="">
                    </div>
                    <div class="input-group">
                    Địa chỉ <br>
                    <input type="text" value="<?=$address?>"  name="address" id="" class="input__content">
                    </div>
                    <div class="input-group">
                    Điện thoại <br>
                    <input type="text"  value="<?=$tel?>" name="tel" id="" class="input__content">
                    </div>
                    <input type="hidden" name="id" value="<?=$id?>"  id="">
                  
    
            <a href="index.php?act=dskh"> <input type="submit" value="Cập nhật" name="capnhat" id="" class="btn-implement btn-action" ></a>

            <!-- <button class="btn-implement btn-action" name="">Thực hiện chức năng</button> -->
            <a href="index.php?act=dskh"><input type="button" value="DANH SÁCH" name="" id="" class="btn-implement btn-action"></a>
          
            <h2 class="thongbao">
                        <?php
                            if(isset($thongbao)&&($thongbao!="")) echo $thongbao;
                        ?>
                    </h2>
        </form>
        </div>

        </div>
    </div>