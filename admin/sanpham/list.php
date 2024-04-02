<div class="center">
  <h3 class=" text-center">Bảng sản phẩm</h3>
  <form action="index.php" method="GET">
  <input type="hidden" name="act" value="listsp">

    <div class="table-wrapper my-3">
      <div class="row">
        <div class="col-4">

          <input type="text" name="kyw" class="form-control">
        </div>
        <div class="col-3">
          <select name="iddm" class="form-select">
            <option value="0" selected>Tất cả</option>
            <?php
            foreach ($listdanhmuc as $danhmuc) {
              extract($danhmuc);
              echo "<option value='" . $id . "'>" . $name . "</option>";
            }
            ?>
          </select>
        </div>
        <div class="col-2">
          <input type="submit" name="listok" value="GO" class="btn btn-primary">
        </div>
        <div class="col-3">
          <h5><a href="index.php?act=addsp" class="add_prd btn-action btn btn-primary">Thêm sản phẩm</a></h5>
        </div>
      </div>

          </form>



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
        foreach ($dssp as $sanpham) {
          extract($sanpham);
          $suasp = "index.php?act=suasp&id=" . $id;
          $xoasp = "index.php?act=xoasp&id=" . $id;
          $xoamemsp = "index.php?act=xoasp&id=" . $id;

          $hinhpath = "../upload/" . $img;
          if (is_file($hinhpath)) {
            $hinh = "<img src='" . $hinhpath . "' height='80'>";
          } else {
            $hinh = "no photo";
          }
          echo ' <tr>
            <td><input type="checkbox" name="" id=""></td>
            <td>' . $id . '</td>    
            <td>' . $name . '</td>
            <td>' . $hinh . '</td>
            <td>' . $price . '</td>
            <td>' . $mota . '</td>
            
            <td>' . $luotxem . '</td>
            
            <td><a href = "' . $suasp . '"> <input type="button" value="Sửa" class="update_prd btn-action"> 
             </a> <a href = "' . $xoasp . '" > <input type="button" value="Xóa" class="delete_prd btn-action ranger" 
             onclick="return confirm(\'Bạn có chắc chắn muốn xóa không\')"></td> 
           </a>
           

        </tr>';
        }
        ?>

      </table>
    </div>


    <div class="pagination__wrapper" style="margin-top: 40px;">
      <ul class="pagination toolbox-item">
        <?php
        $prev_page = $cr_page - 1;
        $next_page = $cr_page + 1;
        ?>
        <li class="page-item <?php echo ($prev_page <= 0) ? 'disabled' : ''; ?>">
          <a class="page-link page-link-btn" href="index.php?act=listsp&page=<?php echo $prev_page; ?>"><i class="fas fa-chevron-left"></i> </a>
        </li>
        <?php
        for ($i = max(1, $cr_page - 2); $i <= min($cr_page + 2, $num_pages); $i++) {
        ?>
          <li class="page-item <?php echo ($i == $cr_page) ? 'active' : ''; ?>">
            <a class="page-link" href="index.php?act=listsp&page=<?php echo $i; ?>"><?php echo $i; ?><span class="sr-only">(current)</span></a>
          </li>
        <?php
        }
        ?>
        <li class="page-item <?php echo ($next_page > $num_pages) ? 'disabled' : ''; ?>">
          <a class="page-link page-link-btn" href="index.php?act=listsp&page=<?php echo $next_page; ?>"><i class="fas fa-chevron-right"></i></a>
        </li>
      </ul>
    </div>

</div>

</section>
</div>
</main>