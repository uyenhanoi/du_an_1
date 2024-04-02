<?php

// Hàm này dùng để hiển thị giỏ hàng
function viewcart($del)
{
    // Sử dụng biến global để truy cập biến từ bên ngoài hàm
    global $img_path;
    $tong = 0;
    $i = 0;

    // Xác định nút "Xóa" nếu tham số $del là 1
    if ($del == 1) {
        $xoasp_th = '<th>Thao tác</th>';
        $xoasp_td2 = '<td></td>';
    } else {
        $xoasp_th = '';
        $xoasp_td2 = '';
    }

    // Hiển thị tiêu đề cột
    echo '<tr>
            <th>Hình</th>
            <th>Sản phẩm</th>
            <th>Đơn giá</th>
            <th>Số lượng</th>
            <th>Thành tiền</th>
            ' . $xoasp_th . '
        </tr>';

    // Duyệt qua mảng giỏ hàng
    foreach ($_SESSION['mycart'] as $cart) {
        // Tạo đường dẫn đến hình ảnh sản phẩm
        $hinh = $img_path . $cart[2];
        $ttien = $cart[3] * $cart[4]; // Tính thành tiền của sản phẩm

        // Tính tổng giá trị đơn hàng
        $tong += $ttien;

        // Xác định nút "Xóa" nếu tham số $del là 1
        if ($del == 1) {
            $xoasp_th = '<th>Thao tác</th>';
            $xoasp_td = '<td><a href="index.php?act=delcart&idcart=' . $i . '"><input type="button" value="Xóa"></a></td>';
            $xoasp_td2 = '<td></td>';
        } else {
            $xoasp_th = '';
            $xoasp_td = '';
            $xoasp_td2 = '';
        }

        // Hiển thị thông tin sản phẩm trong giỏ hàng
        echo '
             <tr>
            <td><img src="' . $hinh . '" height="80px" alt=""></td>
            <td>' . $cart[1] . '</td>
            <td>' . $cart[3] . '</td>
            <td>' . $cart[4] . '</td>
            <td>' . $ttien . '</td>
            ' . $xoasp_td . '
        </tr>';
        $i += 1;
    }

    // Hiển thị tổng giá trị đơn hàng
    echo '<tr>
        <td colspan="4">Tổng đơn hàng</td>
        <td>' . $tong . '</td>
        ' . $xoasp_td2 . '
    </tr>';
}

// Hàm này dùng để hiển thị chi tiết đơn hàng
function bill_chi_tiet($listbill)
{
    global $img_path;
    $tong = 0;
    $i = 0;

    // Hiển thị tiêu đề cột
    echo '<tr>
        <th>Hình</th>
        <th>Sản phẩm</th>
        <th>Đơn giá</th>
        <th>Số lượng</th>
        <th>Thành tiền</th>
    </tr>';

    // Duyệt qua danh sách sản phẩm trong đơn hàng
    foreach ($listbill as $cart) {
        // Tạo đường dẫn đến hình ảnh sản phẩm
        $hinh = $img_path . $cart['img'];
        $tong += $cart['thanhtien']; // Tính tổng giá trị đơn hàng

        // Hiển thị thông tin chi tiết sản phẩm
        echo '
        <tr>
            <td><img src="' . $hinh . '" height="80px" alt=""></td>
            <td>' . $cart['name'] . '</td>
            <td>' . $cart['price'] . '</td>
            <td>' . $cart['soluong'] . '</td>
            <td>' . $cart['thanhtien'] . '</td>
        </tr>';
        $i += 1;
    }

    // Hiển thị tổng giá trị đơn hàng
    echo '<tr>
        <td colspan="4">Tổng đơn hàng</td>
        <td>' . $tong . '</td>
    </tr>';
}

// Hàm này dùng để tính tổng giá trị đơn hàng
function tongdonhang()
{
    $tong = 0;

    // Duyệt qua mảng giỏ hàng và tính tổng giá trị
    foreach ($_SESSION['mycart'] as $cart) {
        $ttien = $cart[3] * $cart[4];
        $tong += $ttien;
    }

    return $tong;
}

// Hàm này dùng để thêm đơn hàng mới vào cơ sở dữ liệu
function insert_bill($iduser, $name, $email, $address, $tel, $pttt, $ngaydathang, $tongdonhang)
{
    $sql = "insert into bill(iduser, bill_name, bill_email, bill_address, bill_tel, bill_pttt, ngaydathang, total) values('$iduser', '$name', '$email', '$address', '$tel', '$pttt', '$ngaydathang', '$tongdonhang')";
    return pdo_execute_return_lastInsertId($sql);
}


// Hàm này dùng để thêm chi tiết sản phẩm vào đơn hàng
function insert_cart($iduser, $idpro, $img, $name, $price, $soluong, $thanhtien, $idbill)
{
    $sql = "insert into cart(iduser, idpro, img, name, price, soluong, thanhtien, idbill) values('$iduser', '$idpro', '$img', '$name', '$price', '$soluong', '$thanhtien', '$idbill')";
    return pdo_execute($sql);
}

// Hàm này dùng để tải thông tin của một đơn hàng dựa trên ID
function loadone_bill($id)
{
    $sql = "select * from bill where id=" . $id;
    $bill = pdo_query_one($sql);
    return $bill;
}

// Hàm này dùng để tải tất cả các sản phẩm trong giỏ hàng của một đơn hàng dựa trên ID đơn hàng
function loadall_cart($idbill)
{
    $sql = "select * from cart where idbill=" . $idbill;
    $bill = pdo_query($sql);
    return $bill;
}

// Hàm này dùng để đếm số lượng sản phẩm trong giỏ hàng của một đơn hàng dựa trên ID đơn hàng
function loadall_cart_count($idbill)
{
    $sql = "select * from cart where idbill=" . $idbill;
    $bill = pdo_query($sql);
    return sizeof($bill);
}

// Hàm này dùng để tải tất cả các đơn hàng dựa trên từ khóa tìm kiếm và ID người dùng (nếu có)
function loadall_bill($kyw = "", $iduser = 0)
{
    $sql = "select * from bill where 1";
    if ($iduser > 0) $sql .= " AND iduser=" . $iduser;
    if ($kyw != "") $sql .= " AND id like '%" . $kyw . "%'";
    $sql .= " order by id desc";
    $listbill = pdo_query($sql);
    return $listbill;
}

// Hàm này dùng để xóa một đơn hàng dựa trên ID và cũng xóa các sản phẩm trong giỏ hàng tương ứng
function delete_bill($id)
{
    $sql = "delete from bill where id=" . $id;
    $sql2 = "delete from cart where idbill=" . $id;
    pdo_execute($sql2);
    pdo_execute($sql);
}

// Hàm này dùng để lấy trạng thái đơn hàng dưới dạng văn bản dựa trên mã trạng thái (0, 1, 2, 3)
function get_ttdh($n)
{
    switch ($n) {
        case '0':
            $tt = "Đơn hàng mới";
            break;
        case '1':
            $tt = "Đang xử lý";
            break;
        case '2':
            $tt = "Đang giao hàng";
            break;
        case '3':
            $tt = "Hoàn tất";
            break;
        default:
            $tt = "Đơn hàng mới";
            break;
    }
    return $tt;
}

// Hàm này dùng để chọn một trạng thái trong danh sách select box
function select_tt($n)
{
    if ($n == 0) {
        $o0 = "selected";
    } else {
        $o0 = "";
    }
    return $o0;
}

function select_tt1($n)
{
    if ($n == 1) {
        $o0 = "selected";
    } else {
        $o0 = "";
    }
    return $o0;
}

function select_tt2($n)
{
    if ($n == 2) {
        $o0 = "selected";
    } else {
        $o0 = "";
    }
    return $o0;
}

function select_tt3($n)
{
    if ($n == 3) {
        $o0 = "selected";
    } else {
        $o0 = "";
    }
    return $o0;
}

// Hàm này dùng để tải thông tin thống kê về danh mục sản phẩm
function loadall_thongke()
{
    $sql = "select danhmuc.id as madm, danhmuc.name as tendm, count(sanpham.id) as countsp, min(sanpham.price) as minprice, max(sanpham.price) as maxprice, avg(sanpham.price) as avgprice";
    $sql .= " from sanpham left join danhmuc on danhmuc.id=sanpham.iddm";
    $sql .= " group by danhmuc.id order by danhmuc.id desc";
    $listthongke = pdo_query($sql);
    return $listthongke;
}

// Hàm này dùng để cập nhật trạng thái của một đơn hàng dựa trên ID
function update_bill($id, $tt)
{
    $sql = "update bill set bill_status='" . $tt . "' where id=" . $id;
    pdo_execute($sql);
}
