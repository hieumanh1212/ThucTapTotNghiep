function formatCurrency(amount) {
    // Chuyển đổi số thành chuỗi và loại bỏ dấu phẩy và dấu chấm phẩy (nếu có)
    const numberString = String(amount);

    // Sử dụng hàm toLocaleString để định dạng chuỗi số tiền
    return Number(numberString).toLocaleString('vi-VN', {
        style: 'currency',
        currency: 'VND'
    });
}
function sweetAlert(message,icon="success",showConfirmButton=false,timer=1500) {
    swal({
        title: message,
        icon: icon,
        showConfirmButton: showConfirmButton,
        timer: timer
    });
}

