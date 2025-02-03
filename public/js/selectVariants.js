document.querySelectorAll('.size-btn, .color-btn').forEach(btn => {
    btn.addEventListener('click', () => {
        // Xóa trạng thái active của tất cả nút trong nhóm
        let group = btn.classList.contains('size-btn') ? '.size-btn' : '.color-btn';
        document.querySelectorAll(group).forEach(button => {
            button.classList.remove('active');
        });

        btn.classList.add('active');

        // Lấy SKU từ data attribute
        let newSKU = btn.dataset.sku;
        
        // Lấy newID từ giá trị của input ẩn (hidden input)
        let newID = document.getElementById('id_pro').value;

        if (newSKU && newID) {
            selectedSKU = newSKU;
            updateVariant(newID, selectedSKU); // Cập nhật sản phẩm
        }
    });
});

function updateVariant(newID, selectedSKU) {
    if (selectedSKU && newID) {
        // Chỉnh sửa URL đúng để tránh lỗi
        fetch(`/php2/ASM/product/detail/${newID}/${selectedSKU}`)
            .then(response => {
                return response.text(); // Trả về text để kiểm tra nội dung
            })
            .then(data => {
                console.log(data); // Log data để xem nội dung phản hồi từ server

                // Nếu phản hồi là JSON hợp lệ, xử lý tiếp
                try {
                    let jsonData = JSON.parse(data); // Cố gắng chuyển đổi thành JSON
                    document.getElementById("variant-price").textContent = `Giá: ${jsonData.price} VNĐ`;
                    document.getElementById("variant-image").innerHTML = `<img src="${jsonData.image}" alt="Product Image" class="img-fluid">`;
                } catch (e) {
                    console.error('Lỗi khi phân tích dữ liệu JSON:', e);
                    console.error(data); // In ra dữ liệu không hợp lệ
                }
            })
            .catch(error => console.error('Lỗi khi lấy dữ liệu:', error));
    }
}

