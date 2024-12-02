document.addEventListener("DOMContentLoaded", function () {
  const cartItems = document.querySelectorAll(".cart-item");

  cartItems.forEach((item) => {
    const quantityInput = item.querySelector(".quantity-input");
    const decreaseButton = item.querySelector(".decrease-btn");
    const increaseButton = item.querySelector(".increase-btn");
    const productPriceElement = item.querySelector(".product-price");
    const unitPrice = parseFloat(
      productPriceElement.getAttribute("data-price")
    );
    const subtotalElement = document.getElementById("subtotal");
    const totalElement = document.getElementById("total");

    const updatePrice = () => {
      const quantity = parseInt(quantityInput.value) || 1;
      const totalPrice = (unitPrice * quantity).toFixed(2); // Calculate total price
      productPriceElement.textContent = `₱${totalPrice}`; // Update displayed price with ₱

      // Update subtotal and total with ₱
      const subtotal = (unitPrice * quantity).toFixed(2);
      subtotalElement.textContent = `₱${subtotal}`;
      totalElement.textContent = `₱${(parseFloat(subtotal) + 5).toFixed(2)}`; // Add shipping fee with ₱
    };

    // Decrease button functionality
    decreaseButton.addEventListener("click", () => {
      let quantity = parseInt(quantityInput.value) || 1;
      if (quantity > 1) {
        quantityInput.value = quantity - 1; // Decrease by 1
      }
      updatePrice();
    });

    // Increase button functionality
    increaseButton.addEventListener("click", () => {
      let quantity = parseInt(quantityInput.value) || 1;
      quantityInput.value = quantity + 1; // Increase by 1
      updatePrice();
    });

    // Direct input validation and price update
    quantityInput.addEventListener("input", () => {
      let quantity = parseInt(quantityInput.value);
      if (isNaN(quantity) || quantity < 1) {
        quantityInput.value = 1; // If invalid input, reset to 1
      }
      updatePrice();
    });

    // Initialize price on page load
    updatePrice();
  });
});
