
<<<<<<< HEAD
<div class="center">
=======
>>>>>>> f94e9b51e171f8a6fd912b843cc08ac26b3dd16f
                    <div class="row2">
         <div class="row2 font_title">
          <h1>THỐNG KÊ SẢN PHẨM THEO LOẠI</h1>
         </div>
<<<<<<< HEAD
         <hr>
=======
>>>>>>> f94e9b51e171f8a6fd912b843cc08ac26b3dd16f
         <div class="row2 form_content ">
         
           <div class="row2 mb10 formds_loai">
           <table>
                        <tr>
                            <th></th>
<<<<<<< HEAD
                            <th>MÃ DANH MỤC</th>                        
=======
                            <th>MÃ DANH MỤC</th>
>>>>>>> f94e9b51e171f8a6fd912b843cc08ac26b3dd16f
                            <th>TÊN DANH MỤC</th>
                            <th>SỐ LƯỢNG</th>
                            <th>GIÁ CAO NHẤT</th>
                            <th>GIÁ THẤP NHẤT</th>
                            <th>GIÁ TRUNG BÌNH</th> 
<<<<<<< HEAD
                         
=======
                           
>>>>>>> f94e9b51e171f8a6fd912b843cc08ac26b3dd16f
                        </tr>
                        <?php
                            foreach ($listthongke as $thongke) {
                                extract($thongke);
                                echo '<tr>
                                <td><input type="checkbox" name="" id=""></td>
                                        <td>'.$madm.'</td>
                                        <td>'.$tendm.'</td>
                                        <td>'.$countsp.'</td>
                                        <td>'.$maxprice.'</td>
                                        <td>'.$minprice.'</td>
                                        <td>'.$avgprice.'</td>
                                    </tr>';
                            }
                        ?>
                        
                    </table>
<<<<<<< HEAD
                    <hr>
=======
>>>>>>> f94e9b51e171f8a6fd912b843cc08ac26b3dd16f
                    </div>
                    <div class="row mb10">

                    <a href="index.php?act=bieudo"><input type="button" value="Xem biểu đồ" name="" id=""></a>
                    </div>
                
            </div>
<<<<<<< HEAD
        </div>
</div>

<style>
    .table-container {
    width: 100%;
    overflow-x: auto;
}

table {
    width: 100%;
    border-collapse: collapse;
}

table th,
table td {
    padding: 8px 12px;
    border: 1px solid #ddd;
    text-align: center;
}

table th {
    background-color: #f2f2f2;
    font-weight: bold;
}

table td input[type="checkbox"] {
    margin-right: 5px;
}

.table-container::-webkit-scrollbar {
    width: 12px;
}

.table-container::-webkit-scrollbar-thumb {
    background-color: rgba(0, 0, 0, 0.2);
    border-radius: 10px;
}

.table-container::-webkit-scrollbar-thumb:hover {
    background-color: rgba(0, 0, 0, 0.4);
}

</style>
=======
        </div>
>>>>>>> f94e9b51e171f8a6fd912b843cc08ac26b3dd16f
