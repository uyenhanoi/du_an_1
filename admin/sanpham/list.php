
        <div class="center">
        <h3>Bảng sản phẩm</h3>
          <form action="index.php?act=listsp" method="POST">
            
            <div class="table-wrapper">

                  <input type="text" name="kyw">
                  <select name="iddm">
                  <option value="0" selected>Tất cả</option>
                  <?php
                  foreach ($listdanhmuc as $danhmuc){
                      extract($danhmuc);
                      echo "<option value='" . $id . "'>" . $name . "</option>";
            }
            ?>
                  </select>
                  <input type="submit" name="listok" value="GO">
            <table class="table">
        
            <tr>
                <td></td>
                <th>MÃ SẢN PHẨM</th>         
                <th>TÊN SẢN PHẨM</th>
                <th>HÌNH</th>
                <th>GIÁ</th>
                <th>MÔ TẢ</th>
                <th>LƯỢT XEM</th>
                <th></th>

            </tr>

          <?php
          foreach ($listsanpham as $sanpham){
            extract($sanpham);
            $suasp="index.php?act=suasp&id=".$id;
            $xoasp="index.php?act=xoasp&id=".$id;
            $xoamemsp="index.php?act=xoasp&id=".$id;

            $hinhpath="../upload/".$img;
            if(is_file($hinhpath)){
              $hinh="<img src='".$hinhpath."' height='80'>";
            }else{
              $hinh ="no photo";
            }
            echo ' <tr>
            <td><input type="checkbox" name="" id=""></td>
            <td>'.$id.'</td>    
            <td>'.$name.'</td>
            <td>'.$hinh.'</td>
            <td>'.$price.'</td>
            <td>'.$mota.'</td>
            <td>'.$luotxem.'</td>
            
            <td><a href = "'.$suasp.'"> <input type="button" value="Sửa" class="update_prd btn-action"> 
             </a> <a href = "'.$xoasp.'" > <input type="button" value="Xóa" class="delete_prd btn-action ranger" 
             onclick="return confirm(\'Bạn có chắc chắn muốn xóa không\')"></td> 
           </a>
           

        </tr>';
          }
          ?>
    
           </table>
              </div>
              <h5><a href="index.php?act=addsp" class="add_prd btn-action">Thêm sản phẩm</a></h5>
          </div>
    </section>
    </div>
 </main>
