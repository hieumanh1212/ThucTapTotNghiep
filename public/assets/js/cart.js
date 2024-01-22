$(function () {
    sizeOfCart();
})
function getProductsInCart() {
    console.log('2222')
    let strProducts = '';
    let unitPrice = 0;
    let total = 0;
    $.ajax({
        url: 'http://127.0.0.1:8000/api/productsInCart',
        method: 'GET',
        contentType: 'application/json',
        dataType: 'json',
        error: function (response) {
            console.log(response)
        },
        success: function (data) {
            $.each(data, function (key, value) {
                unitPrice = parseInt(value.don_gia_ban)-parseInt(value.giam_gia);
                total+=parseInt(value.thanh_tien);
                // value.price = value.price;
                strProducts += `<tr>
                                    <!-- img -->
                                    <td class="tp-cart-img"><a href="http://127.0.0.1:8000/product-detail/${value.ma_san_pham}"> <img src="http://127.0.0.1:8000/IMG_SanPham/${value.anh_dai_dien}" alt=""></a></td>
                                    <!-- title -->
                                    <td class="tp-cart-title">
                                        <a href="product-details.html">${value.ten_san_pham}</a><br>
                                        <a style="color: gray; font-size: 12px;">Size: ${value.size} Màu: ${value.mau}</a>
                                    </td>
                                    <!-- price -->
                                    <td class="tp-cart-price"><span>${formatCurrency(unitPrice)}</span></td>
                                    <!-- quantity -->
                                    <td class="tp-cart-quantity">
                                        <div class="tp-product-quantity">
                                            <input class="tp-cart-input" type="number" value="${value.so_luong_ban}" onchange="changeQuantity('${value.ma_san_pham}','${value.ma_size}','${value.ma_mau}',${unitPrice},this.value)" min="1">
                                        </div>
                                    </td>
                                    <td class="tp-cart-price"><span>${formatCurrency(value.thanh_tien)}</span></td>
                                    <!-- action -->
                                    <td class="tp-cart-action">
                                        <button class="tp-cart-action-btn" onclick="deleteItemInCart('${value.ma_san_pham}','${value.ma_size}','${value.ma_mau}')">
                                            <svg width="10" height="10" viewBox="0 0 10 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd" clip-rule="evenodd" d="M9.53033 1.53033C9.82322 1.23744 9.82322 0.762563 9.53033 0.46967C9.23744 0.176777 8.76256 0.176777 8.46967 0.46967L5 3.93934L1.53033 0.46967C1.23744 0.176777 0.762563 0.176777 0.46967 0.46967C0.176777 0.762563 0.176777 1.23744 0.46967 1.53033L3.93934 5L0.46967 8.46967C0.176777 8.76256 0.176777 9.23744 0.46967 9.53033C0.762563 9.82322 1.23744 9.82322 1.53033 9.53033L5 6.06066L8.46967 9.53033C8.76256 9.82322 9.23744 9.82322 9.53033 9.53033C9.82322 9.23744 9.82322 8.76256 9.53033 8.46967L6.06066 5L9.53033 1.53033Z" fill="currentColor"></path>
                                            </svg>
                                            <span>Xoá</span>
                                        </button>
                                    </td>
                                </tr>`;
            });
            $('#subTotal').html(formatCurrency(total));
            // console.log(strProducts);
            $('#productsInCart').html(strProducts);
        }
    })
}
function addToCart(productId, sizes, colors,unitPrice) {
    // console.log(productId);
    // console.log(colors);
    // console.log(sizes);
    // console.log(quantity);
    let realProductId = productId;
    let realSize = '';
    let realColor = '';
    let quantity = parseInt($('#quantity').val());
    for (let i = 0; i < sizes.length; i++) {
        if ($('#size' + sizes[i].size).hasClass('active')) {
            realSize = sizes[i].ma_size;
            break;
        }
    }
    console.log('real size: ' + realSize);
    for (let i = 0; i < colors.length; i++) {
        if ($('#color' + colors[i].ma_mau).hasClass('active')) {
            realColor = colors[i].ma_mau;
            break;
        }
    }
    console.log('real color' + realColor);
    if(realColor===""||realSize===""){
        sweetAlert('Hãy chọn màu và size','error');
        return;
    }

    const data = {
        productId: realProductId,
        sizeId: realSize,
        colorId: realColor,
        quantity: quantity,
        unitPrice: unitPrice
    };
    $.ajax({
        url: 'http://127.0.0.1:8000/api/addToCart',
        type: 'POST',
        data: data,
        dataType: 'json',
        // contentType: 'application/json',
        success: function(data) {
            sweetAlert("Thêm giỏ hàng thành công");
            sizeOfCart();
            console.log(data);
        },
        error: function(error) {
            // Xử lý lỗi khi request thất bại
           sweetAlert(error.responseText,"error");
        }
    });
}
function deleteItemInCart(productId, sizeId, colorId) {

    const data = {
        productId: productId,
        sizeId: sizeId,
        colorId: colorId,
    };
    $.ajax({
        url: 'http://127.0.0.1:8000/api/deleteCartItem',
        type: 'DELETE',
        data: data,
        // contentType: 'application/json',
        success: function(data) {
            sweetAlert("Xóa sản phẩm thành công")
            sizeOfCart();
            getProductsInCart();
            console.log(data);
        },
        error: function(error) {
            // Xử lý lỗi khi request thất bại
           sweetAlert(error.responseText);
        }
    });
}
function sizeOfCart() {
    $.ajax({
        url: "http://127.0.0.1:8000/api/sizeOfCart",
        method: "GET",
        success: function(response) {
            console.log("API response" + response);
            $('#cartSize').html(response);
        },
        error: function(error) {
            console.log(error)
            // Xử lý lỗi nếu có
        }
    });
}
function changeQuantity(productId,sizeId,colorId,unitPrice,quantity) {
    const data = {
        productId: productId,
        sizeId: sizeId,
        colorId: colorId,
        quantity: quantity,
        unitPrice: unitPrice
    };
    $.ajax({
        url: 'http://127.0.0.1:8000/api/updateQuantity',
        type: 'POST',
        data: data,
        dataType: 'json',
        // contentType: 'application/json',
        success: function(data) {
            getProductsInCart();
            console.log(data);
        },
        error: function(error) {
            // Xử lý lỗi khi request thất bại
           sweetAlert(error.responseText,"error");
        }
    });
}
