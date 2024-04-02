<div class="center">
     
      

        <div class="form-function-wrapper">
          <h3>Quản lý tài khoản</h3>
          <form  action="index.php?act=dskh" method="POST" class="form-function" enctype="multipart/form-data">
      
         <div  class="input-group">
        
          <div class="function-prds-box-month-prd radius">
          <form action="index.php?act=dskh" method="POST">
            <h3>Bảng khách hàng</h3>
              <table class="table table--directory">
                  <thead>
                    <tr>
                      <th></th>
                      <th scope="col">ID</th>
                      <th scope="col">Tên tài khoản</th>
                      <th scope="col">Mật khẩu</th>
                      <th scope="col">Email</th>
                      <th scope="col">Địa chỉ</th>
                      <th scope="col">Số điện thoại</th>
                      <th>Vai trò</th>
                    </tr>
                  </thead>

          <?php
          foreach ($listtaikhoan as $taikhoan){
            extract($taikhoan);
            $suatk="index.php?act=suatk&id=".$id;
            $xoatk="index.php?act=xoatk&id=".$id;

            echo ' <tr>
            <td><input type="checkbox" name="" id=""></td>
            <td>'.$id.'</td>
            <td>'.$user.'</td>
            <td>'.$pass.'</td>
            <td>'.$email.'</td>
            <td>'.$address.'</td>
            <td>'.$tel.'</td>
            <td>'.$role.'</td>



            <td><a href = "'.$suatk.'"> <input type="button" value="Sửa" class="update_prd btn-action"> 
             </a> <a href = "'.$xoatk.'" > <input type="button" value="Xóa" class="delete_prd btn-action ranger"></td> </a>
        </tr>';
          }
          ?>
    
           </table>
           </div>
      

<a href="index.php?act=addtk" > <input  class="btn-implement btn-action" type="button" value="NHẬP THÊM"></a>
           </div>
          </form>
         </div>
        </div>





      
   