<div class="center">
        <div class="function-prds-box-month-prd radius">
          <h1>DANH SÁCH BÌNH LUẬN</h1>
       
         <div class="row2 form_content ">
          <form action="#" method="POST">
           <table class="table table--directory">
                  <thead>
                    <tr>
                    <th scope="col"></th>
                      <th scope="col">ID</th>
                      <th scope="col">Nội dung</th>
                      <th scope="col">User</th>
                      <th scope="col">Id pro</th>
                      <th scope="col">Ngày bình luận</th>
                    <th scope="col"></th>
                    </tr>
                  </thead>
         
                        <?php
                            foreach ($listbinhluan as $binhluan) {
                                extract($binhluan);
                                $suabl="index.php?act=suabl&id=".$id;
                                $xoabl="index.php?act=xoabl&id=".$id;
                                echo '<tr>
                                <td><input type="checkbox" name="" id=""></td>
                                <td>'.$id.'</td>
                                <td>'.$noidung.'</td>
                                <td>'.$iduser.'</td>
                                <td>'.$idpro.'</td>
                                <td>'.$ngaybinhluan.'</td>
                                <td>
                        
                                <a href="'.$xoabl.'"><input type="button"  class="delete_prd btn-action ranger" value="Xóa"></a></td>
                            </tr>';
                            }
                        ?>
                    </table>
                    </div>
                    
                </form>
            </div>
        </div>
















        
