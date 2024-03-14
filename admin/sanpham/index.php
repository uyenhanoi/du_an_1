<!-- chức năng quản lý sản phẩm -->
<?php 
  if(isset($_GET['fct'])){
    $fct = $_GET['fct'];
    switch($fct){
      case 'update_sp':
       if(isset($_GET['id_sp'])){
          $id_sp = $_GET['id_sp'];
          $prd = upload_prd($id_sp);
          $update_btn = "Sửa sản phẩm";
          $list_child_diretories = upload_all_chiild_diretories();
          include 'update.php';
       } 
      break;
      case 'delete_sp':
        if(isset($_GET['id_sp'])){
          include 'delete.php';
        }
      break;
      case 'add_sp':
        $add_btn = "Thêm mới sản phẩm";
        $list_child_diretories = upload_all_chiild_diretories();
        include 'add.php';
      break;
      default:
      include 'function.php';
      break;
    }
  }else{
    include 'function.php';
  }
?>

  <!-- chức năng sản phẩm -->
  <div class="function-prds-box-month-prd radius">
      <h3>Bảng sản phẩm</h3>
      <h5><a href="admin.php?adact=sanpham&fct=add_sp" class="add_prd btn-action">Thêm sản phẩm</a></h5>
      <div class="table-wrapper">
        <table class="table">
          <thead>
            <tr>
              <th scope="col">ID</th>
              <th scope="col">Tên sản phẩm</th>
              <th scope="col">Hình ảnh</th>
              <th scope="col">Giá</th>
              <th scope="col">Số lượng</th>
              <th scope="col">Thao tác</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach($list_prds as $prd):
              extract($prd);?>
            <tr>
              <th scope="row"><?php echo $id?></th>
              <td><?php echo $ten_sp ?></td>
              <td><img src="../img/prd/<?php echo $hinh_anh ?>" alt="" width="70" height="50"></td>
              <td><?php echo number_format($gia_sp) ?>đ</td>
              <td><?php echo $so_luong ?></td>
              <td><a href="admin.php?adact=sanpham&id_sp=<?php echo $id ?>&fct=update_sp" 
                  class="update_prd btn-action">Sửa</a>
                  <a href="admin.php?adact=sanpham&id_sp=<?php echo $id ?>&fct=delete_sp"
                     class="delete_prd btn-action ranger"
                     onclick="return confirm('Bạn muốn xoá không?');">Xoá</a>
              </td>
            </tr>
            <?php endforeach;?>
          </tbody>
        </table>
        <h5><a href="admin.php?adact=tatcasanpham" class="add_prd btn-action">Tất cả sản phẩm</a></h5>
      </div>
    </div>
</section>
</div>