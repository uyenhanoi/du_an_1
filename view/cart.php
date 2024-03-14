

<div class="tong container">
        <div class="cart__content">
        <!-- Tiêu đề giỏ hàng của bạn -->
        <h2 class="cart__header">Giỏ hàng của bạn</h2>

        <!-- Bảng sản phẩm -->
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Ảnh sản phẩm</th>
                    <th scope="col">Tên sản phẩm</th>
                    <th scope="col">Đơn giá</th>
                    <th scope="col">Số lượng</th>
                    <th scope="col">Thành tiền</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <!-- Dòng sản phẩm mẫu -->
                <tr>
                    <td><img src="path_to_image.jpg" alt="Sản phẩm 1" style="width: 50px;"></td>
                    <td>Sản phẩm 1</td>
                    <td style="color: #106F85;">$20.00</td>
                    <td><input type="number" value="1" min="1"></td>
                    <td style="color: #106F85;">$20.00</td>
                    <td><button class="btn btn-danger">Xoá</button></td>
                </tr>
                <!-- Thêm các dòng sản phẩm khác tương tự ở đây -->
            </tbody>
        </table>

        <!-- Button tiếp tục mua hàng -->
        <div class="cart__cost">
            <button class="btn-form">Tiếp tục mua hàng</button>
            <div class="cart__total">
                    <div class="cart__total-money">
                        <h6>Tổng tiền phải thanh toán: </h6>
                    </div>
                    <div class="cart__money">
                        <h6>$100.00</h6>
                    </div>
                </div>
        
        </div>

        <!-- Khung tổng tiền và Button thanh toán -->
        <div class="cart__pay">

            <button class="btn-form">Thanh toán</button>
        </div>
    </div>
</div>
    <!-- footer -->