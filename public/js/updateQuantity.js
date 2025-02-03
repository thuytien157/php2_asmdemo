document.addEventListener('DOMContentLoaded', function () {
    const increaseButtons = document.querySelectorAll('.btn-increase');
    const decreaseButtons = document.querySelectorAll('.btn-decrease');

    increaseButtons.forEach(button => {
        button.addEventListener('click', function () {
            const productId = this.dataset.id;
            window.location.href = `/php2/ASMC/cart/updateQuantity/${productId}/increase`;
        });
    });

    decreaseButtons.forEach(button => {
        button.addEventListener('click', function () {
            const productId = this.dataset.id;
            window.location.href = `/php2/ASMC/cart/updateQuantity/${productId}/decrease`;
        });
    });
});
