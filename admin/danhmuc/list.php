

        <div class="center">
        <div class="function-prds-box-month-prd radius">
          
            <h3>Bảng danh mục</h3>
            <hr>
            <form action="#" method="POST">
              <table class="table table--directory">
                  <thead>
                    <tr>
                    <th scope="col"></th>
                      <th scope="col">ID</th>
                      <th scope="col">Tên danh mục</th>
                      <th scope="col">Thao tác</th>
                    </tr>
                  </thead>
                  <?php
          foreach ($listdanhmuc as $danhmuc){
            extract($danhmuc);
            $suadm="index.php?act=suadm&id=".$id;
            $xoadm="index.php?act=xoadm&id=".$id;

            echo ' <tr>
            <td><input type="checkbox" name="" id=""></td>
            <td>'.$id.'</td>
            <td>'.$name.'</td>
            <td><a href = "'.$suadm.'"  class="update_prd btn-action"> Sửa</a>
           <a href = "'.$xoadm.'"  class="delete_prd btn-action ranger">Xoá</a>
        </tr>';

          }
          ?>
                
                <h5><a href="index.php?act=adddm" class="add_prd btn-action">Thêm danh mục</a></h5>
          </div>
    </section>
    </div>
 </main>
 <script src="../js/main.js"></script>

   